<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Support\Facades\DB;

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



}
