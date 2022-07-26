<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class PdfController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }


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
        $orcamentos = DB::table('orcamentos')->where('id', '=', $id)->get();
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
        // $orcamentos = DB::table('orcamentos')->where('id', '=', $id)->get();
        // $orcamentos_sv = DB::table('orcamento_sv')->where('servico_idorc', '=', $id)->get();
        // // $idorc= (intval($id)+1);
        // $select_idetificacao = "select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id where controle_orcamento.idorcamento = $id ";
        
        // $identificacao = DB::select($select_idetificacao);
        
        // $produto = Produto::all();
        // $cliente = Cliente::all();
        // $servico = Servico::all();
        // //Marca e Modelo
        // $binding = "select * from modelos inner join marcas on marcas.id = modelos.idmarca order by modelos.modelo ASC";
        // $marcaemodelo = DB::select($binding);
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
        // // $orcname = $cliente->cliente.'-'.$id.'_';
        // $pdf = PDF::loadView('orcamentoprint', $data);
    
        // return $pdf->download('teste.pdf');

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('orcamentoprint', $data);
    
        return $pdf->download('itsolutionstuff.pdf');

       
       
    }




}
