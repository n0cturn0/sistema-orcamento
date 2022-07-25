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
        $paginate =DB::table('controle_orcamento')->simplePaginate(3);
        $idorc= (intval($last->orcid)+1);
        $select_idetificacao = ("select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id ");
        
        
        $identificacao = DB::select($select_idetificacao);
       
       

        return view('lista_geral',['identificacao' => $identificacao], compact('paginate'));

    }
    public function orcamentos()
    {
        
        //Pega ultimo número da tabela de controle dos números de orçamento
        $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
        // seta para objeto orcamento o valor doultimo id da tabela de controle e adiciona +1 
        $this->orcamentos = DB::table('orcamentos')->where('idorcamento', '=', (intval($last->orcid)+1))->get();
        $this->orcamentos_sv = DB::table('orcamento_sv')->where('servico_idorc', '=', (intval($last->orcid)+1))->get();
        $idorc= (intval($last->orcid)+1);
        $select_idetificacao = "select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id where controle_orcamento.idorcamento = $idorc ";
        $this->identificacao = DB::select($select_idetificacao);
        $produto = Produto::all();
        $cliente = Cliente::all();
        $servico = Servico::all();
        //Marca e Modelo
        $binding = "select * from modelos inner join marcas on marcas.id = modelos.idmarca order by modelos.modelo ASC";
        $marcaemodelo = DB::select($binding);
        return view('lista_orcamentos', [
            'produto'       => $produto,
            'clienteform'   => $cliente,
            'marcaemodelo'  => $marcaemodelo,
            'servicos'       => $servico
            ]

        );
    }




}
