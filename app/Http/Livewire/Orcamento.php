<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Orcamento extends Component
{
    public $dataentrada='Teste', $idproduto;
    public $produtos = null;


    public function filterproduto()
    {
       
        $this->produtos = Produto::select('*')->where('id', '=', $this->idproduto)->get('produto')->first();
        
    }



    public function render()
    {
        $exibelista     =   Produto::where('status','0' )->get();

        return view('livewire.orcamento', ['produto' => $exibelista]);
    }

    
}
