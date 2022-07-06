<?php

namespace App\Http\Livewire;

use App\Models\Marca as ModelsMarca;
use Livewire\Component;

class Marca extends Component
{
    public $marca;
    public function render()
    {
        return view('livewire.marca');
    }

    public function save()
    {
        $save = ModelsMarca::insert([
            'marca' => $this->marca,
            'status'=> 0
    
    ]);
    session()->flash('success_message', 'Marca Inserida com Sucesso');
           $this->reset();
            
            return redirect()->route('cadastromarca');
    }
}
