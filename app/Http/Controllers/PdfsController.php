<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Support\Facades\DB;
// use Codedge\Fpdf\Facades\Fpdf;
// use Codedge\Fpdf\Fpdf\Fpdf as FpdfFpdf;
// use PDF;
use App\Source\Fpdf\Pdf;


class PdfsController extends Controller
{
   
 
 
   

    public function lista ()
    {
        $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
        $select_identificacao = DB::table('clientes')
        ->join('controle_orcamento','controle_orcamento.cliente_id', '=', 'clientes.id')
        ->select('clientes.*', 'controle_orcamento.*')
        ->orderBy('idorcamento', 'DESC')->paginate(5);
      
        //   $clientes  = DB::table('clientes')
        //  ->join('controle_orcamento','controle_orcamento.cliente_id', '=', 'clientes.id')->select('clientes.*')->paginate(5);
        // $idorc= (intval($last->orcid)+1);
        // $select_idetificacao = ("select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id ");
        
        
        // $identificacao = DB::select($select_idetificacao);
       
       

          return view('lista_geral', compact('select_identificacao'));

    }


    public function orcamentos($id=null)
    {
       
        //Pega ultimo número da tabela de controle dos números de orçamento
       
        // seta para objeto orcamento o valor doultimo id da tabela de controle e adiciona +1 
        $orcamentos = DB::table('orcamentos')->where('idorcamento', '=', $id)->get();
        $orcamentos_sv = DB::table('orcamento_sv')->where('servico_idorc', '=', $id)->get();
        // $idorc= (intval($id)+1);
        $select_idetificacao = "select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id where controle_orcamento.idorcamento = $id ";
        
        $identificacao = DB::select($select_idetificacao);
        $produto = Produto::all();
        $cliente = Cliente::all();
        $servico = Servico::all();
        //Marca e Modelo
        $binding = "select * from modelos inner join marcas on marcas.id = modelos.idmarca order by modelos.modelo ASC";
        $marcaemodelo = DB::select($binding);
        return view('lista_orcamento', [
            'produto'       => $produto,
            'clienteform'   => $cliente,
            'marcaemodelo'  => $marcaemodelo,
            'identificacao'       =>  $identificacao,
            'orcamentos'    => $orcamentos,
            'orcamentos_sv' => $orcamentos_sv,
            'id'            => $id
            ]

        );
       
    }

    public function gerapdf($id=null)
    {
        
        //Pega ultimo número da tabela de controle dos números de orçamento
       
        // seta para objeto orcamento o valor doultimo id da tabela de controle e adiciona +1 
        $contador = count ($orcamentos = DB::table('orcamentos')->where('idorcamento', '=', $id)->get());
        $contador_sv = count($orcamentos_sv = DB::table('orcamento_sv')->where('servico_idorc', '=', $id)->get());
        // $idorc= (intval($id)+1);
        $select_idetificacao = "select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id where controle_orcamento.idorcamento = $id ";
        
        $identificacao = DB::select($select_idetificacao);
        
        $produto = Produto::all();
        $cliente = Cliente::all();
        $servico = Servico::all();
        //Marca e Modelo
        $binding = "select * from modelos inner join marcas on marcas.id = modelos.idmarca order by modelos.modelo ASC";
        $marcaemodelo = DB::select($binding);
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y'),
        //     'produto'       => $produto,
        //     'clienteform'   => $cliente,
        //     'marcaemodelo'  => $marcaemodelo,
        //     'identificacao'       =>  $identificacao,
        //     'orcamentos'    => $orcamentos,
        //     'orcamentos_sv' => $orcamentos_sv
        // ];
            
          
            $pdf = new Pdf();
        $pdf->AddPage();
        $pdf->SetFont('Courier', '', 12);
       
        $pdf->SetWidths_dinamico(1);
        $pdf->SetAligns(array('C'));
        $pdf->Row(array('B_font_OFICIAL ESTACIONÁRIOS'),0,0);
        $pdf->SetAligns(array('L'));
        foreach($identificacao  as $cliente)
        {
            $pdf->Row(array("CLIENTE:".$cliente->cliente),0,0);
            $pdf->Row(array("CPF: ".$cliente->cpf),0,0);
            $pdf->Row(array("CNPJ: ".$cliente->cnpj),0,0);
            $pdf->Row(array("CIDADE: ".$cliente->cidade),0,0);
            $pdf->Row(array("BAIRRO: ".$cliente->bairro),0,0);
            $pdf->Row(array("CEP: ".$cliente->cep),0,0);

           
            $pdf->Row(array("Rua ".$cliente->rua),0,0);
            $numero = iconv('UTF-8', 'windows-1252', 'NÚMERO');
            $pdf->Row(array($numero ." ".$cliente->numero),0,0);
            $pdf->Row(array("TELEFONE: ".$cliente->telefone),0,0);
            $pdf->Row(array("CELULAR: ".$cliente->celular),0,0);
            $pdf->Row(array("EMAIL: ".$cliente->email),0,0);
            $pdf->Row(array("EQUIPAMENTO: ".$cliente->equipamento),0,0);
            $datadesaida = date('d-m-Y', strtotime($cliente->datadesaida));
            $dataentrada = date('d-m-Y', strtotime($cliente->datadeentrada));
            $pdf->Row(array("Data de Entrada do Equipamento: ".$dataentrada),0,0);
            
            $pdf->Row(array('Previsão de saída: '.$datadesaida),0,0);
            $pdf->Row(array("B_font_O R Ç A M E N T O:".$cliente->idorcamento),0,0);
        }
        $pdf->Ln(6);
        $pdf->SetWidths_dinamico(2);
        $pdf->Row(array('B_font_Serviço','B_font_Valor'),1,1);
       $semi_sv =0;
        foreach($orcamentos_sv  as $orca)
        {
            $pdf->Row(array($orca->servico,$orca->servico_valunitario),0,1);
            $semi_sv += $orca->servico_valunitario;
        }
        $pdf->Row(array('Total de Serviço:',$semi_sv),1,1);
        $pdf->Ln(6);
        $pdf->SetWidths_dinamico(4);
        $pdf->Row(array('B_font_Produto','B_font_Valor Unitário', 'B_font_Quantidade', 'B_font_Sub Total'),1,1);
        $semi =0;
        foreach ($orcamentos as $values)
        {
        $pdf->Row(array($values->item,$values->itempreco,$values->itemquantidade,$values->valortoral),0,1);
        $semi += $values->valortoral++;
        }
        $pdf->Row(array('Total de peças:','','',$semi),1,1);
        $totalizando = 0;
        $totalizando = ($semi+$semi_sv);
        $pdf->Row(array('B_font_T O T A L:','','',$totalizando),0,0,1);
        $pdf->SetWidths_dinamico(4);
        $pdf->Row(array('','','', ''),0,0);
        $pdf->Row(array('','','', ''),0,0);
        $pdf->Row(array('','','', ''),0,0);
        $pdf->Row(array('','','', ''),0,0);
        $pdf->Row(array('','','', ''),0,0);

        
     
        $pdf->SetWidths_dinamico(1);
        $pdf->SetAligns(array('C'));

        $pdf->Row(array("Av das Bandeiras  2356 - Jardim Nhanhá"),0,0);
        $pdf->Row(array("Telefone: 67 3331-4919 whathsapp (67) 99101-5645 "),0,0);
        $pdf->Row(array("wendersonmtv@hotmail.com "),0,0);
        $pdf->Row(array("B_font_Este orçamento tem validade de 30 dias!"),0,0);


        
        $pdf->SetTitle(utf8_decode('Orçamento'));
        $pdf->Output('',utf8_decode('Orçamento.pdf'));
            exit();
     
       



    //     }
    //     $total = ($semi+$semi_sv);
    //     $fpdf->SetFont('Courier', 'B', 12);
    //     $fpdf->Text(110,($loop+20), "T O T A L : $total");
    //     $fpdf->SetFont('Courier', '', 10);
        
    //     $endereco = iconv('UTF-8', 'windows-1252', '');
       
    //     $fpdf->Text(10,($loop+170), "$endereco ");
    //     $fpdf->Text(10,($loop+175), "");
    //     $fpdf->Text(10,($loop+180), "wendersonmtv@hotmail.com");
    //     $limitador = $loop;


                
             
        
        
              
    //     $fpdf->Output();
    //     exit;
  

   



       
       
    }



}
