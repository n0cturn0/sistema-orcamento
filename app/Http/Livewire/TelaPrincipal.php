<?php
use App\Models\Modelo;
use App\Models\Orcamento;
use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Database;
use Illuminate\Support\Facades\DB;
namespace App\Http\Livewire;

use App\Models\Orcamento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TelaPrincipal extends Component
{
    public $orcamentos, $name, $phone, $contact_id;
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
        // $binding = "select * from modelos 
        // inner join marcas on
        // marcas.id = modelos.idmarca";

        $this->orcamentos = Orcamento::all();
        // $marca_modelo = DB::select($binding);
        // return view('livewire.tela-principal', ['marca_modelo' => $marca_modelo]);
        return view('livewire.tela-principal');
    }

    private function resetInputFields(){
        $this->name = '';
        // $this->phone = '';
    }

    public function store()
    {
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
            Orcamento::create(['modelo' => $this->name[$key]]);
        }
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Contact Has Been Created Successfully.');
    }
}
