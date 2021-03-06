<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Reserva;
use DateTime;

use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RelatoriosController extends AppController
{
    public function index()
    {
        $this->loadModel('Clientes');

        $cliente = $this->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])
        ->where(['status' => true]);

        $this->loadModel('Filmes');
        $filme = $this->Filmes->find('list', [
            'keyField' => 'id',
            'valueField' => 'titulo'
        ])
        ->where(['status' => true])
        ->toArray();      
        $this->set(compact('cliente', 'filme'));
        
        if ($this->request->is(['post', 'put'])) {

            echo "nao deu certo";

        // $requisicaoRelatorio = $this->request->data;
        // //conversao das datas
        // $de_data_devolucao = $requisicaoRelatorio['de_data_devolucao']['year']
        // . '-' . $requisicaoRelatorio['de_data_devolucao']['month']
        // . '-' . $requisicaoRelatorio['de_data_devolucao']['day'];

        // $ate_data_devolucao = $requisicaoRelatorio['ate_data_devolucao']['year']
        // . '-' . $requisicaoRelatorio['ate_data_devolucao']['month']
        // . '-' . $requisicaoRelatorio['ate_data_devolucao']['day'];

        // $this->relatorioPersonalizado($spreadsheet,$cabecalhos);
        }

    } 
    public function relatorio($id = null)
    {
        if ($this->request->is(['post', 'put'])) {

            $requisicaoRelatorio = $this->request->data;

            //conversao das datas
            $de_data_devolucao = $requisicaoRelatorio['de_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['day'];

            $ate_data_devolucao = $requisicaoRelatorio['ate_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['day'];

            if ($requisicaoRelatorio['selecaoRelatorio'] == 'FATURAMENTO') {
                $this->relatorioFaturamento($de_data_devolucao,$ate_data_devolucao);
                echo "deu certo";
            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == 'ARRECADA????O DE MULTA') {
                $this->relatorioMulta($de_data_devolucao,$ate_data_devolucao);
            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == '10 CLIENTES QUE MAIS ATRASAM') {
                $this->relatorioClientesAtrasam($de_data_devolucao,$ate_data_devolucao);
            }
        }
    }
    public function relatorioFaturamento($de_data_devolucao,$ate_data_devolucao)
    {
        $this->loadModel('Reservas');
        $query = $this->Reservas->find()
            ->select([
                        'id','data_devolucao' ,'id_cliente', 'id_filme', 'valor_total_pagar'
                    ])
            ->where([
                'AND' => 
                    [
                        ['valor_total_pagar >' => 0],
                        ['data_devolucao >=' => $de_data_devolucao],
                        ['data_devolucao <=' => $ate_data_devolucao]
                    ]
                    ])
            ->order(['data_devolucao' => 'ASC']);   

        // gera??ao de planilha
        $cabecalhos = array("Codigo Reserva","Data de Entrada do Valor","Cliente","Filme","Valor Total Pago");
        $spreadsheet = new Spreadsheet();
        $this->setCabecalho($spreadsheet,$cabecalhos);
        $this->setCorpo($spreadsheet,$query);
        $writer = new Xlsx ($spreadsheet); 
        $writer->save('RelatorioFaturamento.xlsx'); 
        exit;

    }
    public function relatorioMulta($de_data_devolucao,$ate_data_devoluca)
    {
        $this->loadModel('Reservas');
        $query = $this->Reservas->find()
            ->select([
                'id', 'data_devolucao','data_limite_devolucao','id_cliente','id_filme','valor_multa_atraso','valor_locacao'
            ])
            ->where([
                'AND' => [
                    ['valor_multa_atraso >' => 0],
                    ['data_devolucao >=' => $de_data_devolucao],
                    ['data_devolucao <=' => $ate_data_devolucao]
                ]
            ])
            ->order(['data_devolucao' => 'ASC']);

        // gera??ao de arquivo Xlsx
        $cabecalhos =array("C??digo Reserva","Data de Devolu????o","Data lime de Devolu????o","Cliente","Filme","Valor Multa","Valor Locacao");
        // ,"Horas de atraso"

        $spreadsheet = new Spreadsheet();
        $this->setCabecalho($spreadsheet,$cabecalhos);
        $this->setCorpo($spreadsheet,$query);
        $writer = new Xlsx ($spreadsheet); 
        $writer->save('RelatorioMulta.xlsx'); 
        exit;
        
        // $diasAtraso = $fatura['data_limite_devolucao']->diff($fatura['data_devolucao']);
        // $horasAtraso = $diasAtraso->h + ($diasAtraso->days * 24);
    }
    public function relatorioClientesAtrasam($de_data_devolucao,$ate_data_devoluca)
    {
        $this->loadModel('Reservas');
        $query = $this->Reservas->find()
            ->select([
                'id', 'id_cliente', 'valor_multa_atraso',
                'data_devolucao', 'data_limite_devolucao'
            ])
            ->where([
                'AND' => [
                    ['valor_multa_atraso >' => 0],
                    ['data_devolucao >=' => $de_data_devolucao],
                    ['data_devolucao <=' => $ate_data_devolucao]
                ]
            ])
            ->order(['valor_multa_atraso' => 'DESC'])
            ->limit(10);

        // gera??ao de arquivo Xlsx
        $spreadsheet = new Spreadsheet();

        $cabecalhos =array("C??digo Reserva","Cliente","Valor Multa","Data de Devolu????o","Data lime de Devolu????o");
        $this->setCabecalho($spreadsheet,$cabecalhos);
        $this->setCorpo($spreadsheet,$query);
        $writer = new Xlsx ($spreadsheet); 
        $writer->save('RelatorioAtrasoCliente.xlsx'); 
        exit;
    }
    public function relatorioPersonalizado($spreadsheet,$cabecalhos)
    {
        $this->loadModel('Reservas');
        $query = $this->Reservas->find()
            ->select([
                        'id','data_devolucao' ,'id_cliente', 'id_filme', 'valor_total_pagar'
                    ])
            ->where([
                'AND' => 
                    [
                        ['valor_total_pagar >' => 0],
                        ['data_devolucao >=' => $de_data_devolucao],
                        ['data_devolucao <=' => $ate_data_devolucao]
                    ]
                    ])
            ->order(['data_devolucao' => 'ASC']);

    }
    public function setCabecalho($spreadsheet,$cabecalhos)
    {
        $planilha = $spreadsheet-> getActiveSheet (); 
        $letra = "A";
        foreach ($cabecalhos as $cabecalho) 
        {
            $planilha->setCellValue($letra.'1',$cabecalho);
            ++$letra;
        }
        
    }
    public function setCorpo($spreadsheet,$query)
    {
        $planilha = $spreadsheet-> getActiveSheet ();

        $letra = "A";
        $numero = 2;
        foreach ($query as $linha)    
        {         
            //converte a query(objeto) em array, iguinorando informa??oes desnecessarias do PHP.
            $linha = json_decode(json_encode($linha));
            $linha = array_values((array)$linha);

            foreach ($linha as $coluna){
                $planilha->setCellValue($letra.$numero,$coluna);
                ++$letra;
            }
            $numero++;
            $letra = "A";

        }
                
    }  

}
