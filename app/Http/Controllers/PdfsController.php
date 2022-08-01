<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Facades\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf as FpdfFpdf;

class PdfsController extends Controller
{
    protected $fpdf;
 
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
   

    public function lista ()
    {
        $last = DB::table('orcamentoid')->orderBy('id', 'DESC')->first();
        $select_identificacao = DB::table('clientes')
        ->join('controle_orcamento','controle_orcamento.cliente_id', '=', 'clientes.id')
        ->select('clientes.*', 'controle_orcamento.*')
        ->orderBy('idorcamento', 'DESC')->paginate(5);
      
        //   $clientes  = DB::table('clientes')
        //  ->join('controle_orcamento','controle_orcamento.cliente_id', '=', 'clientes.id')->select('clientes.*')->paginate(5);
        // $idorc= (intval($last->orcid)+1);
        // $select_idetificacao = ("select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id ");
        
        
        // $identificacao = DB::select($select_idetificacao);
       
       

          return view('lista_geral', compact('select_identificacao'));

    }


    public function orcamentos($id=null)
    {
        
        //Pega ultimo número da tabela de controle dos números de orçamento
       
        // seta para objeto orcamento o valor doultimo id da tabela de controle e adiciona +1 
        $orcamentos = DB::table('orcamentos')->where('idorcamento', '=', $id)->get();
        $orcamentos_sv = DB::table('orcamento_sv')->where('servico_idorc', '=', $id)->get();
        // $idorc= (intval($id)+1);
        $select_idetificacao = "select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id where controle_orcamento.idorcamento = $id ";
        
        $identificacao = DB::select($select_idetificacao);
        $produto = Produto::all();
        $cliente = Cliente::all();
        $servico = Servico::all();
        //Marca e Modelo
        $binding = "select * from modelos inner join marcas on marcas.id = modelos.idmarca order by modelos.modelo ASC";
        $marcaemodelo = DB::select($binding);
        return view('lista_orcamento', [
            'produto'       => $produto,
            'clienteform'   => $cliente,
            'marcaemodelo'  => $marcaemodelo,
            'identificacao'       =>  $identificacao,
            'orcamentos'    => $orcamentos,
            'orcamentos_sv' => $orcamentos_sv,
            'id'            => $id
            ]

        );
       
    }

    public function gerapdf($id=null)
    {
        
        //Pega ultimo número da tabela de controle dos números de orçamento
       
        // seta para objeto orcamento o valor doultimo id da tabela de controle e adiciona +1 
        $contador = count ($orcamentos = DB::table('orcamentos')->where('idorcamento', '=', $id)->get());
        $contador_sv = count($orcamentos_sv = DB::table('orcamento_sv')->where('servico_idorc', '=', $id)->get());
        // $idorc= (intval($id)+1);
        $select_idetificacao = "select * from clientes inner join controle_orcamento   on controle_orcamento.cliente_id = clientes.id where controle_orcamento.idorcamento = $id ";
        
        $identificacao = DB::select($select_idetificacao);
        
        $produto = Produto::all();
        $cliente = Cliente::all();
        $servico = Servico::all();
        //Marca e Modelo
        $binding = "select * from modelos inner join marcas on marcas.id = modelos.idmarca order by modelos.modelo ASC";
        $marcaemodelo = DB::select($binding);
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y'),
        //     'produto'       => $produto,
        //     'clienteform'   => $cliente,
        //     'marcaemodelo'  => $marcaemodelo,
        //     'identificacao'       =>  $identificacao,
        //     'orcamentos'    => $orcamentos,
        //     'orcamentos_sv' => $orcamentos_sv
        // ];
            
     
           
        // dd($orcamentos);
       
        $fpdf = new FpdfFpdf();
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', '', 12);
        $loja =iconv('UTF-8', 'windows-1252', 'OFICIAL ESTACIONÁRIOS');
        $fpdf->Text(10,5, "$loja");
        foreach($identificacao  as $cliente)
        {
            
            $fpdf->Text(10,10, "CLIENTE:$cliente->cliente");
            $fpdf->Text(10,15, "CPF: $cliente->cpf");
            $fpdf->Text(10,20, "CNPJ: $cliente->cnpj");
            $fpdf->Text(10,25, "CIDADE $cliente->cidade");
            $fpdf->Text(10,30, "BAIRRO $cliente->bairro");
            $fpdf->Text(10,35, "CEP $cliente->cep");
            $rua = iconv('UTF-8', 'windows-1252', $cliente->rua);
            $fpdf->Text(10,40, "RUA $rua");
            $numero = iconv('UTF-8', 'windows-1252', 'NÚMERO');
            $fpdf->Text(80,40, "$numero $cliente->numero");
            $fpdf->Text(10,45, "TELEFONE: $cliente->telefone");
            $fpdf->Text(10,50, "CELULAR: $cliente->celular");
            $fpdf->Text(10,55, "EMAIL: $cliente->email");
            $fpdf->Text(10,70, "EQUIPAMENTO: $cliente->equipamento");
            $fpdf->Text(10,75, "Data de Entrada do Equipamento: $cliente->datadeentrada");
            $fpdf->Text(10,80, "Previsão de saída: $cliente->datadesaida");
            $str = iconv('UTF-8', 'windows-1252', 'ORÇAMENTO');
            $fpdf->Text(10,85, "$str $cliente->idorcamento");
        }
       $espaco_sv = 5;
       $limitador_sv = 85;
       $semi_sv =0;
        foreach($orcamentos_sv  as $orca)
        {
            for ($i = 1; $i <= $contador_sv; $i++)
            {
                $loop_sv=($limitador_sv+($i*$espaco_sv));
            }
            
            $fpdf->Text(10,$loop_sv, "$orca->servico");
            $fpdf->Text(135,$loop_sv, "Sub Total :$orca->servico_valunitario");
            $limitador_sv = $loop_sv;
            $semi_sv += $orca->servico_valunitario;
        }
        





        
        $total_servico = $orca->servico_valtotal;
        $limitador = $loop_sv;
        $espaco = 2;
        $semi = 0;

        foreach ($orcamentos as $values)
        {
        for ($i = 1; $i <= $contador; $i++) {
        $loop = ($limitador+($i*$espaco));
        }
        $fpdf->Text(10,$loop, "$values->item");
        $fpdf->Text(45,$loop, "Qtdade :$values->itemquantidade");
        $fpdf->Text(80,$loop, "Valor unitario :$values->itempreco");
        $fpdf->Text(135,$loop, "Sub Total :$values->valortoral");
        $limitador = $loop;
        $semi += $values->valortoral++;

        }
        $total = ($semi+$semi_sv);
        $fpdf->SetFont('Courier', 'B', 12);
        $fpdf->Text(110,($loop+20), "T O T A L : $total");
        $fpdf->SetFont('Courier', '', 10);
        $fpdf->Text(10,($loop+170), "Rua Tal ");
        $limitador = $loop;


                
             
        
        
              
        $fpdf->Output();
        exit;
        


       
       
    }



}
