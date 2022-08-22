<?php

namespace App\Http\Livewire;

use App\Models\Cliente as ModelsCliente;
use Livewire\Component;

use Facade\FlareClient\Http\Client;
use Illuminate\Auth\Events\Validated;

class Cliente extends Component
{

    public $cliente, $cpf, $cnpj, $email, $celular, $telefone, $cidade, $numero, $bairro, $cep, $rua;

    public function render()
    {
      $listacliente = ModelsCliente::orderBy('cliente', 'asc')->get();
        return view('livewire.cliente');
    }


    public function save()
    {
      $save = ModelsCliente::insert([

        'cliente'   => $this->cliente,
        'cpf'       => $this->cpf,
        'cnpj'      => $this->cnpj,
        'cidade'    => $this->cidade,
        'bairro'    => $this->bairro,
        'cep'       => $this->cep,
        'rua'       => $this->rua,
        'numero'    => $this->numero,
        'telefone'    => $this->telefone,
        'celular'    => $this->celular,
        'email'     => $this->email

      ]);

      session()->flash('success_message', 'Cliente Inserido com Sucesso');
           $this->reset();
            
            return redirect()->route('cadastrocliente');

        
            
    



    }



   



}
