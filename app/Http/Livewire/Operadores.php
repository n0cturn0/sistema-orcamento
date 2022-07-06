<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Operador;
use Illuminate\Auth\Events\Validated;

class Operadores extends Component
{
    public $operador;
    public function render()
    {
        return view('livewire.operadores');
    }

    public function save()
    {
           $this->validate([
            'operador'=>'required'
           ]);
           $save = Operador::insert([

            'nomeoperador' => $this->operador
           ]);
           session()->flash('success_message', 'Operador Inserido com Sucesso');
           $this->reset();
            
            return redirect()->route('teste');
         
    }
}
