<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Marca;

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
        dd($this->novamarca);
    }
}
