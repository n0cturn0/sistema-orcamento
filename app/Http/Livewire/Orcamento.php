<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Produto;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Orcamento extends Component
{
    
    public $marca;
    public $modelos;
    
    public $selecionamarca = NULL;
 

    public function mount()
    {
        
        $this->marca = Marca::all();
        $this->modelos = collect();  
    }

    public function render()
    {
        $last = DB::table('orcamentos')->orderBy('id', 'DESC')->first();
        return view('livewire.orcamento',
        [
        'ultimoid' => $last->id, 
        'clientes' => Cliente::orderBy('cliente', 'asc')->get()
        ]);
    }

    public function updateMarca($marca)
    {
        if (!is_null($marca)) {
            $this->modelos = Modelo::where('idmarca', $marca)->get();
           
        }
    }

    
}
