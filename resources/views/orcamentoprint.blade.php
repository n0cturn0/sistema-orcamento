@extends('template');
@section('impressaopdf')

    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    
    <table class="table table-bordered table-dark">
        <thead >
                <th>Data de Entrada</th>
                <th>Previsão de saída</th>
                <th>Marca</th>
                <th></th>
                <th>ORCAMENTO nº</th>
        </thead>
            @foreach ($identificacao as $item)
                
            
          <tr>
            <td>{{$item->datadeentrada}}</td>
            <td>{{$item->datadesaida}}</td>
            <td>{{$item->equipamento}}</td>
            <td>&nbsp;</td>
            <td><h1>{{$item->idorcamento}}</h1></td>
          </tr>
          @endforeach
       
        <tbody>
            @foreach ($identificacao as $cliente)
          <tr>
            <td colspan="3">NOME:<strong> {{$cliente->cliente}}</strong></td>
            <td colspan="2">CPF: <strong>{{$cliente->cpf}}</strong></td>
          </tr>
          <tr>
            <td colspan="3">ENDEREÇO:<strong>{{$cliente->rua}}</strong></td>
            <td colspan="2">CNPJ:<strong>{{$cliente->cnpj}}</strong></td>
          </tr>
          <tr>
            <td colspan="3">BAIRRO: <strong>{{$cliente->bairro}}</strong></td>
            <td colspan="2">TELEFONE<strong>{{$cliente->telefone}}</strong></td>
          </tr>
          <tr>
            <td colspan="3">CIDADE <strong>{{$cliente->cidade}}</strong></td>
            <td colspan="2">CELULAR <strong>{{$cliente->celular}}</strong></td>
          </tr>
          @endforeach
        </tbody>
        </table>
    
    <table class="table ">
        <thead>
            <th>Servoço / Produto</th>
            <th>Quantidade</th>
            <th>Valor unitário</th>
            <th>Sub Total</th>
        </thead>
       @php 
       $var_total = 0;
       @endphp
       <tbody>
        @foreach($orcamentos as $key => $value)
        @php 
        $var_total += $value->valortoral;
        @endphp
            <tr>
                <td>{{ $value->item }}  </td>
                <td>{{ $value->itemquantidade }}</td>
                <td>{{ $value->itempreco }}</td>
                <td>{{ $value->valortoral }}</td>
            </tr>
        @endforeach
        @php
         $sv_var_total =0;   
         $totalfinal= 0;
        @endphp
        @foreach ($orcamentos_sv as $item)
        @php
           $sv_var_total += $item->servico_valtotal;
           $totalfinal=$sv_var_total+$var_total;
        @endphp
        <tr>
                <td>{{$item->servico}}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>{{$item->servico_valtotal}}</td>
        </tr>
        @endforeach
       </tbody>
       <tfoot>
        <tr>
                
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><strong>TOTAL</strong></td>
            <td><strong>{{ $totalfinal }}</strong></td>
            
            
        </tr>
       </tfoot>
    </table>
    @endsection
    






    
