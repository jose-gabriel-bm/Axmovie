<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Reserva;
use DateTime;

class ReservasController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => ['Reservas.data_inicio_locacao' => 'Desc']
        ];
        $search =  $this->request->query('search');
        $reservas = null;

        if ($search == null) {

            $reservas = $this->Reservas->find('all', [
                'contain' => ['Clientes', 'Filmes']
            ]);
        } else {
            $reservas = $this->Reservas->find('all', [
                'contain' => ['Clientes', 'Filmes']
            ])
                ->where([
                    'OR' => [
                        ['nome LIKE' => "%$search%"],
                        ['titulo LIKE' => "%$search%"],
                        ['data_inicio_locacao LIKE' => "%$search%"],
                        ['data_limite_devolucao LIKE' => "%$search%"],
                        ['data_devolucao  LIKE' => "%$search%"],
                    ]
                ]);
        }


        $reservas = $this->paginate($reservas);


        $this->set(compact('reservas'));
    }

    public function view($id = null)
    {
        $reserva = $this->Reservas->get($id);
        $this->set(['reserva' => $reserva]);

        $reserva = $this->Reservas->get($id, [
            'contain' => ['Filmes', 'Clientes']
        ]);
        $this->set(compact('reserva'));
    }

    public function adicionar()
    {

        $this->loadModel('Clientes');

        $cliente = $this->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])
            ->where(['status' => true])
            ->toArray();

        $this->loadModel('Filmes');
        $filme = $this->Filmes->find('list', [
            'keyField' => 'id',
            'valueField' => 'titulo'
        ])
            ->where(['status' => true])
            ->toArray();

        if ($this->request->is(['post', 'put'])) {
            $reserva = $this->request->data;

            $entityReserva = $this->Reservas->newEntity([

                'id_usuario' =>  $this->Auth->user('id'),
                'id_cliente' => $reserva['id_cliente'],
                'id_filme' => $reserva['id_filme'],
                'data_inicio_locacao' => $reserva['data_inicio_locacao'],
                'data_limite_devolucao' => $reserva['data_limite_devolucao'],
                'status' => '1'
            ]);

            if ($this->Reservas->save($entityReserva)) {
                $this->Flash->success(__('Reserva Cadastrada com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro: Reserva não foi Cadastrada, tentar novamente '));
            }
        }
        $this->set(compact('cliente', 'filme'));
    }

    public function edit($id = null)
    {

        $reserva = $this->Reservas->get($id);

        $this->loadModel('Filmes');
        $filme = $this->Filmes->find('list', [
            'keyField' => 'id',
            'valueField' => 'titulo'
        ])
            ->where(['status' => true])
            ->toArray();

        $this->loadModel('Clientes');
        $cliente = $this->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])
            ->where(['status' => true])
            ->toArray();

        if ($this->request->is(['post', 'put'])) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->data);

            if ($this->Reservas->save($reserva)) {
                $this->Flash->success('Reserva editada com sucesso');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Reserva não foi editada, por gentileza tentar novamente');
            }
        }

        $this->set(compact('reserva', 'cliente', 'filme'));
    }

    public function relatorio($id = null)
    {
        $this->loadModel('Clientes');

        $cliente = $this->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])
            ->where(['status' => true])
            ->toArray();

        $this->loadModel('Filmes');
        $filme = $this->Filmes->find('list', [
            'keyField' => 'id',
            'valueField' => 'titulo'
        ])
            ->where(['status' => true])
            ->toArray();
        $this->set(compact('cliente', 'filme'));



        if ($this->request->is(['post', 'put'])) {

            $requisicaoRelatorio = $this->request->data;

            //concatena as posicao do array
            $de_data_devolucao = $requisicaoRelatorio['de_data_devolucao']['year']
                . '-' . $requisicaoRelatorio['de_data_devolucao']['month']
                . '-' . $requisicaoRelatorio['de_data_devolucao']['day']
               ;
            //concatena as posicao do array               
            $ate_data_devolucao = $requisicaoRelatorio['ate_data_devolucao']['year']
                . '-' . $requisicaoRelatorio['ate_data_devolucao']['month']
                . '-' . $requisicaoRelatorio['ate_data_devolucao']['day']
             ;

            if ($requisicaoRelatorio['selecaoRelatorio'] == 'FATURAMENTO') {
                
                $this->loadModel('Reservas');
                $faturamento = $this->Reservas->find()
                    ->where([
                        'AND' => [
                        ['data_devolucao >=' => $de_data_devolucao],
                        ['data_devolucao <=' => $ate_data_devolucao]
                    ]
                    ])->toArray();
                                      
                    // Nome do arquivo que será exportado
                    $arquivo = 'RelatorioFaturamento.xls';
                    
                    // Tabela HTML com o formato da planilha
                    $html = '';
                    $html .= '<table border="2">';
                    $html .= '<tr>';
                    $html .= '<td colspan="5">Relatorio de Faturamento </tr>';
                    $html .= '</tr>';

                    // Cabeçalho planilha
                    $html .= '<tr>';
                    $html .= '<td><b>Codigo Reserva</b></td>';
                    $html .= '<td><b>Data de Entrada do Valor</b></td>';
                    $html .= '<td><b>Valor Total Pago</b></td>';
                    $html .= '<td><b>Cliente</b></td>';
                    $html .= '<td><b>Filme</b></td>';
                    $html .= '</tr>';
                    
                    //Corpo planilha
                    
                    foreach ($faturamento as $fatura){
                    $html .= '<tr>';
                    $html .= '<td>'.$fatura["id"].'</td>';
                    $html .= '<td>'.$fatura["data_devolucao"].'</td>';
                    $html .= '<td>'.$fatura["valor_total_pagar"].'</td>';
                    $html .= '<td>'.$fatura["id_cliente"].'</td>';
                    $html .= '<td>'.$fatura["id_usuario"].'</td>';
                    $html .= '</tr>';
                    }
                    $html .= '</table>';
                    
                    // Configurações header para forçar o download
                    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
                    header ("Cache-Control: no-cache, must-revalidate");
                    header ("Pragma: no-cache");
                    header ("Content-type: application/x-msexcel");
                    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
                    header ("Content-Description: PHP Generated Data" );
                    
                    // Envia o conteúdo do arquivo
                    echo $html;
                    exit;
                }
            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == 'ARRECADAÇÃO DE MULTA') {
            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == '50 CLIENTES QUE MAIS ATRASAM') {
            }
        }
    
    public function fechamento($id = null)
    {
        $idLogado = $this->Auth->user('id');
        $this->set(compact('idLogado'));

        $reserva = $this->Reservas->get($id);

        $this->calculoReserva($reserva);

        $this->set(['reserva' => $reserva]);

        $this->loadModel('Filmes');
        $filme = $this->Filmes->find('list', [
            'keyField' => 'id',
            'valueField' => 'titulo'
        ])->toArray();

        $this->loadModel('Clientes');
        $cliente = $this->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();

        $idCliente = $reserva->id_cliente;
        $idFilme = $reserva->id_filme;

        if ($this->request->is(['post', 'put'])) {

            $hoje = new  DateTime('now');
            $reserva->data_devolucao = $hoje;

            $reserva = $this->Reservas->patchEntity($reserva, $this->request->data);

            $reserva->valor_locacao = $this->request->data['valor_locacao'];
            $reserva->observacoes = $this->request->data['observacoes'];
            $reserva->valor_total_pagar = $reserva->valor_multa_atraso + $reserva->valor_locacao;

            if ($this->Reservas->save($reserva)) {
                $this->Flash->success('Reserva fechada com sucesso');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Reserva não foi fechada, por gentileza tentar novamente');
            }
        }

        $this->set(compact('reserva', 'filme', 'cliente', 'idCliente', 'idFilme'));
    }

    private function calculoReserva(Reserva $reserva)
    {

        $hoje = new  DateTime('now');
        $reserva->data_devolucao = $hoje;

        $horasLocacao = 0;
        $horasAtraso = 0;

        if ($reserva->data_limite_devolucao < $reserva->data_devolucao) {

            $diferencaAtraso = $reserva->data_limite_devolucao->diff($reserva->data_devolucao);
            $horasAtraso = $diferencaAtraso->h + ($diferencaAtraso->days * 24);

            $diferencaLocacao = $reserva->data_inicio_locacao->diff($reserva->data_limite_devolucao);
            $horasLocacao = $diferencaLocacao->h + ($diferencaLocacao->days * 24);
        } else {

            $diferencaLocacao = $reserva->data_inicio_locacao->diff($reserva->data_devolucao);
            $horasLocacao = $diferencaLocacao->h + ($diferencaLocacao->days * 24);
        }

        $valorLocacao = $horasLocacao * 0.15;
        $valorAtraso = $horasAtraso * 00.05;

        $reserva->valor_multa_atraso = ($horasAtraso * 00.15) + $valorAtraso;

        $reserva->valor_locacao = $valorLocacao;

        return $reserva;
    }
}
