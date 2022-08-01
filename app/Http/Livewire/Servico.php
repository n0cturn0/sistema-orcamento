<?php

namespace App\Http\Livewire;

use App\Models\Servico as ModelsServico;
use Livewire\Component;

class Servico extends Component
{
    public $servico, $preco, $descricao, $atualizaservicopreco, $novopreco;
    public function render()
    {
        $exibelista = ModelsServico::where('status','0' )->get();
        return view('livewire.servico', ['exibelista' => $exibelista]);
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


    public function atualizapreco()
    {
        $prod = ModelsServico::find($this->atualizaservicopreco);  
        $prod->preco = $this->novopreco;
        $prod->save();
        session()->flash('preocoatualizado', 'Preço do produto atualizado');
        $this->reset();
        return redirect()->route('cadastraproduto');
    }



    protected $listeners = ['deleteConfirmed' => 'deleteAppointment'];
    public $appoimentid = null;
    public function remove($id)
   {
    $this->appoimentid = $id;
    $this->dispatchBrowserEvent('show-delete-confirmation');
   }

   public function deleteAppointment()
   {
   $appoimentid = ModelsServico::findOrFail($this->appoimentid);
   $appoimentid->delete();
   }





}
