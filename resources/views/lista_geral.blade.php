@extends('template');
@section('listageral')
@if(!empty($paginate) && $paginate->count())
@else
Not Data
@endif
<table class="table table-bordered ">
    <thead >
            <th>Data de Entrada</th>
            <th>Previsão de saída</th>
            <th>Marca / Modelo</th>
            <th>Cliente</th>
            <th>ORCAMENTO nº</th>
    </thead>
    <tbody>
        @foreach ($identificacao as $item)
            
        
      <tr>
        <td>{{date("d-m-Y", strtotime($item->datadeentrada));}}</td>
        <td>{{date("d-m-Y", strtotime($item->datadesaida));}}</td>
        <td>{{$item->equipamento}}</td>
        <td>{{$item->cliente}}</td>
        <td><h2>{{$item->idorcamento}}</h2></td>
      </tr>
      @endforeach
   
    
       
     
     
    </tbody>
    </table>
    <h5>Pagination:</h5>
    {{ $paginate->links() }}

@endsection