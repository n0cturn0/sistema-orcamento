<?php
use App\Models\Modelo;
use App\Models\Orcamento;
use Illuminate\Http\Request;
use Illuminate\Database;
namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Orcamento;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
//https://www.codecheef.org/article/laravel-livewire-dynamically-add-more-input-fields-example
class TelaPrincipal extends Component
{
    public $orcamentos, $name, $servicoid, $dataentradaform, $phone, $cliente, $contact_id, $idorcamentoinsert, $insert_prev, $idclienteinsert, $marcaemodeloinsert;
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
        $this->orcamentos = DB::table('orcamentos')

        ->join('orcamento_sv','orcamentos.idorcamento','=','orcamento_sv.servico_idorc')
        // ->join('servicos','orcamentos.idorcamento','=','servicos.servico_idorc')
        ->where('orcamentos.idorcamento', (intval($last->orcid)+1))->groupBy('orcamento_sv.servico_idorc')->toSql();
         dd($this->orcamentos);
        $produto = Produto::all();
        $cliente = Cliente::all();
        $servico = Servico::all();
        //Marca e Modelo
        $binding = "select * from modelos inner join marcas on marcas.id = modelos.idmarca order by modelos.modelo ASC";
        $marcaemodelo = DB::select($binding);
        

        return view('livewire.tela-principal',
        [
            'produto'       => $produto,
            'clienteform'   => $cliente,
            'marcaemodelo'  => $marcaemodelo,
            'servicos'       => $servico
            ]
        );
    }

    private function resetInputFields(){
        $this->name = '';
        $this->phone = '';
        $this->servicoid = '';
       
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

    public function identificacao()
    {
        
        
    $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
    $now = date("Y-m-d");
    $datasaida = date('Y-m-d', strtotime(str_replace('/', '-', $this->dataentradaform)));
    
    DB::table('controle_orcamento')->insert([
        'idorcamento'       => (intval($last->orcid+1)),
        'datadeentrada'     => $now, 
        'datadesaida'       => $datasaida,
        'cliente_id'        => $this->idclienteinsert,
        'equipamento'       => $this->marcaemodeloinsert,
        'status'            => 0

    ]);
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
   
        if (!empty($this->name)) {
            foreach ($this->name as $key => $value) {
                $get_produto =  DB::table('produtos')->where('id',  $this->name[$key] )->first();
                
                $total = ($get_produto->preco * intval($this->phone[$key]));
               
                
                DB::table('orcamentos')->insert([
                    [
                    'item'            => $get_produto->produto, 
                    'itemquantidade'    => $this->phone[$key],
                    'idorcamento'       => (intval($last->orcid+1)),
                    'itempreco'         => $get_produto->preco,
                    'valortoral'        => $total,
                    
                    ]
                    
                ]);
            }
        }
        
            foreach ($this->servicoid as $key => $value){
                $get_servico =  DB::table('servicos')->where('id',  $this->servicoid[$key] )->first();
                $total_sv = 0;
                $total_sv += $get_servico->preco;

                DB::table('orcamento_sv')->insert([
                    'servico'           => $get_servico->servico,
                    'servico_valunitario'     => $get_servico->preco,
                    'servico_idorc'     => (intval($last->orcid+1)),
                    'servico_valtotal'  => $total_sv
                ]);
            }
            
            
        

        
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Item adicionado com sucesso.');
    }
}
