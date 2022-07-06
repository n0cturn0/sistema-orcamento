<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Marca;
use App\Models\Modelo as ModelsModelo;

class Modelo extends Component
{
    public $novamarca, $modelo;
    public function render()
    {
         return view('livewire.modelo',['marca' => Marca::orderBy('marca', 'asc')->get()
        ]);
    }

    public function save()
    {
       $save = ModelsModelo::insert([
    'idmarca'   => $this->novamarca,
    'modelo'     => $this->modelo,
    'status'     => 0
       ]);
    }
}
