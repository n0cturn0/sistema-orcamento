<?php
use App\Models\Modelo;
use App\Models\Orcamento;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Database;
namespace App\Http\Livewire;

use App\Models\Orcamento;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
//https://www.codecheef.org/article/laravel-livewire-dynamically-add-more-input-fields-example
class TelaPrincipal extends Component
{
    public $orcamentos, $name, $dataentrada, $phone, $contact_id, $idorcamentoinsert, $insert_prev;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }


    public function render()
    {
        //Pega ultimo número da tabela de controle dos números de orçamento
        $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
        // seta para objeto orcamento o valor doultimo id da tabela de controle e adiciona +1 
        $this->orcamentos = DB::table('orcamentos')->where('idorcamento', (intval($last->orcid)+1))->get();
        $produto = Produto::all();
        return view('livewire.tela-principal',
        ['produto' => $produto]
        );
    }

    private function resetInputFields(){
        $this->name = '';
        $this->phone = '';
        $this->dataentrada;
    }
    
    public function finalizar()
    {
        $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
        $inser_val = (intval($last->orcid+1));
        DB::table('orcamentoid')->insert([
            ['orcid' => $inser_val , 'statusorc' => 1]
            
        ]);
        session()->flash('finalizado', 'Orçamento Finalizado');
           $this->reset();


    }
    public function store()
    {
        $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
        //Coverte data Mysql Formtat
        
         $newdate = date("Y-m-d", strtotime($this->dataentrada));
        // $validatedDate = $this->validate([
        //         'name.0' => 'required',
        //         'phone.0' => 'required',
        //         'name.*' => 'required',
        //         'phone.*' => 'required',
        //     ],
        //     [
        //         'name.0.required' => 'name field is required',
        //         'phone.0.required' => 'phone field is required',
        //         'name.*.required' => 'name field is required',
        //         'phone.*.required' => 'phone field is required',
        //     ]
        // );
   
        foreach ($this->name as $key => $value) {

            DB::table('orcamentos')->insert([
                [
                'modelo'            => $this->name[$key], 
                'itemquantidade'    => $this->phone[$key],
                'idorcamento'       => (intval($last->orcid+1)),
                'dataentrada'       => $newdate
                ]
                
            ]);
            
            // Orcamento::create(['modelo' => $this->name[$key]]);

        }
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Item adicionado com sucesso.');
    }
}
