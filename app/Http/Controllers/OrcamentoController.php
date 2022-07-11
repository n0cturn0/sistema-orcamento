<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use App\Models\Produto;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('telacriaorcamento');
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
        // $prod = Produto::find(3); 
        // //echo $prod->produto;
       

        $prod = Produto::select('*')->where('id', '=', 3)->get('produto')->first();
        echo $prod->id;
        //dd($prod);
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
