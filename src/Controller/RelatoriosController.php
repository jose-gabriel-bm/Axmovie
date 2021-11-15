<?php

namespace App\Controller;

use App\Controller\AppController;


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
                $this->relatorioFaturamento($de_data_devolucao, $ate_data_devolucao); 

            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == 'ARRECADAÇÃO DE MULTA') {
                $this->relatorioMulta($de_data_devolucao, $ate_data_devolucao);
            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == '10 CLIENTES QUE MAIS ATRASAM') {
                $this->relatorioClientesAtrasam($de_data_devolucao, $ate_data_devolucao);
            }
        }
    }
    public function relatorioFaturamento($de_data_devolucao, $ate_data_devolucao)
    {
        $this->loadModel('Reservas');
        $query = $this->Reservas->find()
            ->contain(['Clientes', 'Filmes'])
            ->select([
                'id', 'data_devolucao', 'valor_total_pagar', 'Filmes.titulo', 'Clientes.nome',
            ])
            ->where([
                'AND' =>
                [
                    ['valor_total_pagar >' => 0],
                    ['data_devolucao >=' => $de_data_devolucao],
                    ['data_devolucao <=' => $ate_data_devolucao]
                ]
            ])
            ->order(['data_devolucao' => 'ASC'])
            ->toarray();

        // geraçao de planilha
        $cabecalhos = array("Codigo Reserva", "Data de Entrada do Valor", "Valor Total Pago", "Filme", "Cliente");

        $spreadsheet = new Spreadsheet();
        $arquivo = WWW_ROOT . 'relatorios' . DS . 'faturamento' . DS . 'Relatorio.xlsx';

        $this->setCabecalho($spreadsheet, $cabecalhos);
        $this->setCorpo($spreadsheet, $query);

        $writer = new Xlsx($spreadsheet);
        $writer->save($arquivo);

        return $this->redirect(['controller' => 'Relatorios', 'action' => 'index']);
        exit;
    }
    public function relatorioMulta($de_data_devolucao, $ate_data_devolucao)
    {
        $this->loadModel('Reservas');
        $query = $this->Reservas->find()
            ->contain(['Clientes', 'Filmes'])
            ->select([
                'id', 'data_devolucao', 'data_limite_devolucao', 'valor_multa_atraso', 'valor_locacao', 'Filmes.titulo', 'Clientes.nome'
            ])
            ->where([
                'AND' => [
                    ['valor_multa_atraso >' => 0],
                    ['data_devolucao >=' => $de_data_devolucao],
                    ['data_devolucao <=' => $ate_data_devolucao]
                ]
            ])
            ->order(['data_devolucao' => 'ASC'])
            ->toarray();

        // geraçao de arquivo Xlsx
        $cabecalhos = array("Código Reserva", "Data de Devolução", "Data lime de Devolução", "Valor Multa", "Valor Locacao", "Filme", "Cliente",);

        // ,"Horas de atraso"

        $spreadsheet = new Spreadsheet();
        $arquivo = WWW_ROOT . 'relatorios' . DS . 'multas' . DS . 'Relatorio.xlsx';

        $this->setCabecalho($spreadsheet, $cabecalhos);
        $this->setCorpo($spreadsheet, $query);

        $writer = new Xlsx($spreadsheet);
        $writer->save($arquivo);

        return $this->redirect(['controller' => 'Relatorios', 'action' => 'index']);
        exit;

        // $diasAtraso = $fatura['data_limite_devolucao']->diff($fatura['data_devolucao']);
        // $horasAtraso = $diasAtraso->h + ($diasAtraso->days * 24);
    }
    public function relatorioClientesAtrasam($de_data_devolucao, $ate_data_devolucao)
    {
        $this->loadModel('Reservas');
        $query = $this->Reservas->find()
            ->contain(['Clientes'])
            ->select([
                'id', 'Clientes.nome', 'valor_multa_atraso',
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

        $cabecalhos = array("Código Reserva", "Valor Multa", "Data de Devolução", "Data lime de Devolução", "Cliente");
        // geraçao de arquivo Xlsx
        $spreadsheet = new Spreadsheet();
        $arquivo = WWW_ROOT . 'relatorios' . DS . 'clientesMaiorAtraso' . DS . 'Relatorio.xlsx';

        $this->setCabecalho($spreadsheet, $cabecalhos);
        $this->setCorpo($spreadsheet, $query);

        $writer = new Xlsx($spreadsheet);
        $writer->save($arquivo);
        return $this->redirect(['controller' => 'Relatorios', 'action' => 'index']);
        exit;
    }
    // public function relatorioPersonalizado($spreadsheet,$cabecalhos)
    // {
    //     $this->loadModel('Reservas');
    //     $query = $this->Reservas->find()
    //         ->select([
    //                     'id','data_devolucao' ,'id_cliente', 'id_filme', 'valor_total_pagar'
    //                 ])
    //         ->where([
    //             'AND' => 
    //                 [
    //                     ['valor_total_pagar >' => 0],
    //                     ['data_devolucao >=' => $de_data_devolucao],
    //                     ['data_devolucao <=' => $ate_data_devolucao]
    //                 ]
    //                 ])
    //         ->order(['data_devolucao' => 'ASC']);

    // }
    public function setCabecalho($spreadsheet, $cabecalhos)
    {
        $planilha = $spreadsheet->getActiveSheet();
        $letra = "A";
        foreach ($cabecalhos as $cabecalho) {
            $planilha->setCellValue($letra . '1', $cabecalho);
            ++$letra;
        }
    }
    public function setCorpo($spreadsheet, $query)
    {
        $planilha = $spreadsheet->getActiveSheet();

        $letra = "A";
        $numero = 2;

        foreach ($query as $linha) {

            //converte a querlinhay(objeto) em array, iguinorando informaçoes desnecessarias do PHP.
            $linha = json_decode(json_encode($linha));
            $linha = array_values((array)$linha);

            foreach ($linha as $coluna) {

                $coluna = json_decode(json_encode($coluna));
                $coluna = array_values((array)$coluna);

                $coluna = implode($coluna);

                $planilha->setCellValue($letra . $numero, $coluna);
                ++$letra;
            }

            $numero++;
            $letra = "A";
        }
    }
}
