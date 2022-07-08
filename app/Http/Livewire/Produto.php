<?php

namespace App\Http\Livewire;
use Illuminate\Pagination\Paginator;
use App\Models\Modelo;
use App\Models\Produto as ModelsProduto;
use Livewire\Component;
use Livewire\WithPagination;

class Produto extends Component
{
    use WithPagination;
    
    public $produtonovo, $preco, $quantidade, $produtopreco, $inserequantidade, $novopreco, $atualizaprodutopreco;

    protected $listeners = ['deleteConfirmed' => 'deleteAppointment'];
    public $appoimentid = null;
    public function remove($id)
   {
    $this->appoimentid = $id;
    $this->dispatchBrowserEvent('show-delete-confirmation');
   }

   public function deleteAppointment()
   {
   $appoimentid = ModelsProduto::findOrFail($this->appoimentid);
   $appoimentid->delete();
   }






    public function render()
    {
        //Lista Produto
        $produtol = ModelsProduto::orderBy('produto', 'asc')->get();
        $exibelista     =   ModelsProduto::where('status','0' )->get();
         
        
        return view('livewire.produto',[
            'produto' =>$produtol , 
            'exibeProduto' => $exibelista
    ]);
    }

    public  function save()
    {
        $save = ModelsProduto::insert([
            'produto'   => $this->produtonovo,
            'preco'     => $this->preco,
            'quantidade'    => $this->quantidade,
            'status'       => 0
        ]);

        session()->flash('success_message', 'Produto inserido com Sucesso');
        $this->reset();
        return redirect()->route('cadastraproduto');
    }

    public function atualizaquantidade()
    {
         $prod = ModelsProduto::find($this->produtopreco);
         $prod->quantidade = $this->inserequantidade;
         $prod->save();
         session()->flash('atualizado', 'Quantidade atualizada');
        $this->reset();
        return redirect()->route('cadastraproduto');
       
    }

    public function atualizapreco()
    {
        $prod = ModelsProduto::find($this->atualizaprodutopreco);  
        $prod->preco = $this->novopreco;
        $prod->save();
        session()->flash('preocoatualizado', 'Preço do produto atualizado');
        $this->reset();
        return redirect()->route('cadastraproduto');
    }

   


}
