<?php

namespace App\Controller;

use App\Controller\AppController;
// use App\Model\Entity\Reserva;
// use DateTime;

use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RelatoriosController extends AppController
{

    public function index()
    {
        $a = 'a';
        debug(++$a);
        // Criar uma nova planilha 
        $spreadsheet = new Spreadsheet();
        // Adicione valor em uma folha dentro dessa planilha. 

        // // (É possível ter várias planilhas em uma única planilha) 
        $sheet = $spreadsheet-> getActiveSheet (); 
        $sheet-> setCellValue ('A1', 'opa');
        $sheet-> setCellValue ('A2', 'opa');

        // Salve a planilha na pasta webroot 
        $writer = new Xlsx ($spreadsheet); 
        $writer->save('teste.xlsx'); 
        exit;
    } 


    public function view($id = null)
    {  
    }

    public function adicionar()
    {
    }
    public function edit($id = null)
    {
    }

    public function relatorio($id = null)
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

            $requisicaoRelatorio = $this->request->data;

            if ($requisicaoRelatorio['selecaoRelatorio'] == 'FATURAMENTO') {
                $this->relatorioFaturamento($requisicaoRelatorio);
            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == 'ARRECADAÇÃO DE MULTA') {
                $this->relatorioMulta($requisicaoRelatorio);
            }
            if ($requisicaoRelatorio['selecaoRelatorio'] == '10 CLIENTES QUE MAIS ATRASAM') {
                $this->relatorioClientesAtrasam($requisicaoRelatorio);
            }
        }
    }
    public function relatorioFaturamento($requisicaoRelatorio)
    {
        //concatena as posicao do array
        $de_data_devolucao = $requisicaoRelatorio['de_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['day'];            
        $ate_data_devolucao = $requisicaoRelatorio['ate_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['day'];

        $this->loadModel('Reservas');
        $faturamento = $this->Reservas->find()
            ->select([
                'id', 'id_cliente', 'id_filme', 'valor_total_pagar',
                'data_devolucao'
            ])
            ->where([
                'AND' => [
                    ['data_devolucao >=' => $de_data_devolucao],
                    ['data_devolucao <=' => $ate_data_devolucao]
                ]
            ])
            ->order(['data_devolucao' => 'ASC'])
            ->toArray();

        //geraçao de planilha

        // $arquivo ='.planilhas/relatorio.xlsx';
        // $planilha =;

        $spreadsheet = new Spreadsheet();
        $planilha = $spreadsheet-> getActiveSheet (); 

        $planilha->setCellValue('A1','Codigo Reserva');
        $planilha->setCellValue('B1','Data de Entrada do Valor');
        $planilha->setCellValue('C1','Cliente');
        $planilha->setCellValue('D1','Filme');
        $planilha->setCellValue('E1','Valor Total Pago');

        $contador = 1;
        foreach ($faturamento as $fatura) {
            $contador++;
            $planilha->setCellValue('A'.$contador,$fatura["id"]);
            $planilha->setCellValue('B'.$contador,$fatura["data_devolucao"]);
            $planilha->setCellValue('C'.$contador,$fatura["id_cliente"]);
            $planilha->setCellValue('D'.$contador,$fatura["id_filme"]);
            $planilha->setCellValue('E'.$contador,$fatura["valor_total_pagar"]);
        }
        $writer = new Xlsx ($spreadsheet); 
        $writer->save('RelatorioFaturamento.xlsx'); 
        exit;

    }

    public function setCabecalho(Spreadsheet $xlsx, array $row)
    {
        
        ['Codigo Reserva', 'Data de Entrada do Valor', '123'];
        // $xlsx->setCellValue
    }


    public function relatorioMulta($requisicaoRelatorio)
    {
        $de_data_devolucao = $requisicaoRelatorio['de_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['day'];

        $ate_data_devolucao = $requisicaoRelatorio['ate_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['day'];

        $this->loadModel('Reservas');

        $faturamento = $this->Reservas->find()
            ->select([
                'id', 'id_cliente', 'id_filme', 'valor_multa_atraso', 'valor_locacao',
                'data_devolucao', 'data_limite_devolucao'
            ])
            ->where([
                'AND' => [
                    ['valor_multa_atraso >' => 0],
                    ['data_devolucao >=' => $de_data_devolucao],
                    ['data_devolucao <=' => $ate_data_devolucao]
                ]
            ])
            ->order(['data_devolucao' => 'ASC'])
            ->toArray();

        $arquivo = 'RelatorioMulta.xls';
        $html = '';
        $html .= '<table border="4">';
        $html .= '<tr>';
        $html .= '<td colspan="7">Relatorio de Arrecadacao de Multa </tr>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td><b>Codigo Reserva</b></td>';
        $html .= '<td><b>Data de Entrada do Valor</b></td>';
        $html .= '<td><b>Horas de atraso</b></td>';
        $html .= '<td><b>Cliente</b></td>';
        $html .= '<td><b>Filme</b></td>';
        $html .= '<td><b>Valor Multa</b></td>';
        $html .= '<td><b>Valor Locacao</b></td>';
        $html .= '</tr>';
        foreach ($faturamento as $fatura) {
            $diasAtraso = $fatura['data_limite_devolucao']->diff($fatura['data_devolucao']);
            $horasAtraso = $diasAtraso->h + ($diasAtraso->days * 24);
            $html .= '<tr>';
            $html .= '<td>' . $fatura["id"] . '</td>';
            $html .= '<td>' . $fatura["data_devolucao"] . '</td>';
            $html .= '<td>' . $horasAtraso . '</td>';
            $html .= '<td>' . $fatura["id_cliente"] . '</td>';
            $html .= '<td>' . $fatura["id_filme"] . '</td>';
            $html .= '<td>' . $fatura["valor_multa_atraso"] . '</td>';
            $html .= '<td>' . $fatura["valor_locacao"] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header("Content-Description: PHP Generated Data");
        echo $html;
        exit;
    }
    public function relatorioClientesAtrasam($requisicaoRelatorio)
    {
        $de_data_devolucao = $requisicaoRelatorio['de_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['de_data_devolucao']['day'];

        $ate_data_devolucao = $requisicaoRelatorio['ate_data_devolucao']['year']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['month']
            . '-' . $requisicaoRelatorio['ate_data_devolucao']['day'];

        $this->loadModel('Reservas');

        $faturamento = $this->Reservas->find()
            ->select([
                'id', 'id_cliente', 'valor_multa_atraso',
                'data_devolucao', 'data_limite_devolucao'
            ])
            ->where([
                'AND' => [
                    ['data_devolucao >=' => $de_data_devolucao],
                    ['data_devolucao <=' => $ate_data_devolucao]
                ]
            ])
            ->order(['valor_multa_atraso' => 'DESC'])
            ->limit(10)
            ->toArray();

        $arquivo = 'RelatorioAtrasoCliente.xls';
        $html = '';
        $html .= '<table border="4">';
        $html .= '<tr>';
        $html .= '<td colspan="4">Relatorio 10 clientes que mais atrasam </tr>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td><b>Codigo Reserva</b></td>';
        $html .= '<td><b>Horas de atraso</b></td>';
        $html .= '<td><b>Cliente</b></td>';
        $html .= '<td><b>Valor Multa</b></td>';
        $html .= '</tr>';
        foreach ($faturamento as $fatura) {
            $diasAtraso = $fatura['data_limite_devolucao']->diff($fatura['data_devolucao']);
            $horasAtraso = $diasAtraso->h + ($diasAtraso->days * 24);
            $html .= '<tr>';
            $html .= '<td>' . $fatura["id"] . '</td>';
            $html .= '<td>' . $horasAtraso . '</td>';
            $html .= '<td>' . $fatura["id_cliente"] . '</td>';
            $html .= '<td>' . $fatura["valor_multa_atraso"] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header("Content-Description: PHP Generated Data");
        echo $html;
        exit;
    }
    public function relatorioPersonalizado()
    {
    }
    

}
