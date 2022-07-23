<div>
    <div>
       
        <div class="col-md-12 grid-margin stretch-card">
                   <div class="card">
                     <div class="card-body">
                       <h4 class="card-title">O R Ç A M E N T O</h4>
                       <span class="text-danger"> {{ session('success_message') }}</span>
                       <form class="forms-sample">



                        <div class=" add-input">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Previsão de entrega</label>
                                        <input type="text" data-mask="00/00/0000" class="form-control" placeholder="Digite a data" required wire:model="dataentradaform">
                                        @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Cliente</label>
                                        <select class="form-control form-control-sm" id="exampleFormControlSelect3" wire:model="idclienteinsert">
                                            <option></option>
                                            @foreach ($clienteform as $item)
                                            <option value="{{$item->id}}">{{$item->cliente}}</option>
                                                
                                            @endforeach
                                        </select>
                
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Marca / Modelo</label>
                                        <select class="form-control form-control-sm" id="exampleFormControlSelect3" wire:model="marcaemodeloinsert">
                                            <option></option>
                                            @foreach ($marcaemodelo as $item)
                                            <option value="{{$item->marca}}-{{$item->modelo}}">{{$item->marca}}-{{$item->modelo}}</option>
                                                
                                            @endforeach
                                        </select>
                
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="button" wire:click.prevent="identificacao()"      class="btn btn-success btn-sm" wire:loading.attr="disabled" >Adicionar </button>
                                    
                                </div>
                            </div>

                        </div>













                        
<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
@endif

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
   
   <br><br>
  
    <form class="form-inline">
        <div class=" add-input">
            
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Escolha o produto</label>
                        <select class="form-control form-control-sm" id="exampleFormControlSelect3"  wire:model="name.0" >
                            <option></option>
                       @foreach ($produto as $item)
                         <option value="{{$item->id}}" >{{$item->produto}}&nbsp; {{$item->preco}} R$</option>
                       @endforeach
                    </select>
                        {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="name.0"> --}}
                        @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Quantidade</label>
                        <input type="phone" class="form-control" wire:model="phone.0" placeholder="0">
                        @error('phone.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-2">
                    
                        
                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">+Adicionar</button>
                    
                </div>
            </div>


            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="exampleFormControlSelect3">Escolha o Serviço</label>
                        <select class="form-control form-control-sm" id="exampleFormControlSelect3"  wire:model="servicoid.0" >
                            <option>---=---</option>
                       @foreach ($servicos as $item)
                         <option value="{{$item->id}}" >{{$item->servico}}&nbsp; {{$item->preco}} R$</option>
                         
                       @endforeach
                    </select>
                        {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="name.0"> --}}
                        @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>







        </div>

        @foreach($inputs as $key => $value)
        <div class=" add-input">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="name.{{ $value }}">
                        @error('name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
             
                <div class="col-md-3">
                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    
                </div>
            </div>
        </div>
    @endforeach
  
       






        <div><span class="text-danger"> {{ session('finalizado') }}</span></div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Adicionar Item</button>
                <button type="button" wire:click.prevent="finalizar()" class="btn btn-danger btn-sm">Encerrar Orçamento</button>
            </div>
        </div>
  
    </form>
</div> 
                       </form>
                     </div>
                   </div>
                 </div>
                
     
     
               
     
     
     
     
     
     
     
                
     
              
     
                 
     </div>
     
</div>
