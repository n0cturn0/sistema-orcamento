<?php

namespace App\Http\Livewire;

use App\Models\Servico as ModelsServico;
use Livewire\Component;

class Servico extends Component
{
    public $servico, $preco, $descricao;
    public function render()
    {
        return view('livewire.servico');
    }


    public function save()
    {
        $save = ModelsServico::insert([
            'servico'   => $this->servico,
            'preco'     => $this->preco,
            'descricao' => $this->descricao,
            'status'    => 0
        ]);

        session()->flash('success_message', 'Serviço Cadastrado com sucesso!!');
        $this->reset();
        return redirect()->route('cadastroservico');

    }
}
