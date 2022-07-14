<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Produto;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Orcamento extends Component
{
    public $dataentrada='Teste', $idproduto, $numorca;
    public $produtos = null;



    public function addidorcamento($post)
    {
        return redirect()->to('/orcamento/'.$post);
        
    }


    public function filterproduto()
    {
       
        // $this->produtos = Produto::select('*')->where('id', '=', $this->idproduto)->get('produto')->first();
        $prod = Produto::select('*')->where('id', '=', $this->idproduto)->get('produto')->first();
        $nome_produto = $prod->id;
        dd($nome_produto);
    }



    public function render()
    {
        // $exibelista     =   Produto::where('status','0' )->get();
        $last = DB::table('orcamentos')->orderBy('id', 'DESC')->first();

        return view('livewire.orcamento',
        [
        'ultimoid' => $last->id, 
        'clientes' => Cliente::orderBy('cliente', 'asc')->get()
        ]);
    }

    
}
