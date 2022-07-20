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
//https://www.codecheef.org/article/laravel-livewire-dynamically-add-more-input-fields-example
class TelaPrincipal extends Component
{
    public $orcamentos, $name, $phone, $contact_id, $idorcamentoinsert, $insert_prev;
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
        $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
        // $this->orcamentos = Orcamento::all();
        $this->orcamentos = DB::table('orcamentos')->where('idorcamento', (intval($last->orcid)+1))->get();
        // $marca_modelo = DB::select($binding);
        // return view('livewire.tela-principal', ['marca_modelo' => $marca_modelo]);
        return view('livewire.tela-principal');
    }

    private function resetInputFields(){
        $this->name = '';
        // $this->phone = '';
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
                ['modelo' => $this->name[$key], 'idorcamento' => (intval($last->orcid+1)) ]
                
            ]);
            
            // Orcamento::create(['modelo' => $this->name[$key]]);

        }
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Contact Has Been Created Successfully.');
    }
}
