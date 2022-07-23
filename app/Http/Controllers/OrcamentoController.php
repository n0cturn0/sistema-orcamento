<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Orcamento;
use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Database;
use Illuminate\Support\Facades\DB;
//https://www.codecheef.org/article/laravel-livewire-dynamically-add-more-input-fields-example
class OrcamentoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novoorcamento()
    {
        //ULTIMO NUMERO DE ORCAMENTO
        $last = DB::table('orcamentos')->orderBy('id', 'DESC')->first();
        return view('inicioorcamento', ['idinicial' => $last->id]);
    }


    public function index()
    {
        
        return view('telaprincipal');
    }


    public function tempo()
    {
        
        // $final  = DB::table('marcas')
        // ->join('modelos', 'marcas.id', '=', 'modelos.idmarca')->get();

        // dd($final);

        //ULTIMO NUMERO DE ORCAMENTO
        $last = DB::table('orcamentos')->orderBy('id', 'DESC')->first();
        // $marca_modelo = DB::table('modelos')
        //                         ->join('marcas', 'modelos.id', '=', 'idmarca')->get();
        
        $binding = "select * from modelos 
        inner join marcas on
        marcas.id = modelos.idmarca";

        $marca_modelo = DB::select($binding);
                                 return view('teladeatendimento',
        [
        'ultimoid' => $last->id, 
        'marca_modelo' => $marca_modelo,
        'clientes' => Cliente::orderBy('cliente', 'asc')->get()
        
        ]);

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function show(Orcamento $orcamento)
    {
        
       

        // $last_row = DB::table('orcamentos')->latest()->reorder('id', 'desc')->row()->get();
        $last = DB::table('orcamentos')->orderBy('id', 'DESC')->first();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Orcamento $orcamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orcamento $orcamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orcamento $orcamento)
    {
        //
    }
}
