@extends('template');
@section('listageral')


<table class="table table-bordered ">
    <thead >
            <th>Data de Entrada</th>
            <th>Previsão de saída</th>
            <th>Marca / Modelo</th>
            <th>Cliente</th>
            <th>ORCAMENTO nº</th>
    </thead>
    <tbody>
        @foreach ($select_identificacao as $item)
            
        
      <tr>
        <td>{{date("d-m-Y", strtotime($item->datadeentrada));}}</td>
        <td>{{date("d-m-Y", strtotime($item->datadesaida));}}</td>
        <td>{{$item->equipamento}}</td>
        <td>{{$item->cliente}}</td>
        <td><a href="{{url("orcamentos/$item->idorcamento")}}"><h2>{{$item->idorcamento}}</h2></a></td>
      </tr>
      @endforeach
   
    
       
     
     
    </tbody>
    </table>
    
    {{$select_identificacao->links()}}
   

@endsection