<div>
    <div>
       
        <div class="col-md-12 grid-margin stretch-card">
                   <div class="card">
                     <div class="card-body">
                       <h4 class="card-title">Cadastro de Produto</h4>
                       <span class="text-danger"> {{ session('success_message') }}</span>
                       <form class="forms-sample">
                        
<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
@endif

<table class="table table-bordered">
    <tr>
     
        <th>Name</th>
       
    </tr>
    @foreach($orcamentos as $key => $value)
        <tr>
            
            <td>{{ $value->modelo }}</td>
            
        </tr>
    @endforeach
</table>
   
   
  
    <form>
        <div class=" add-input">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <select wire:model="name.0" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                        {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="name.0"> --}}
                        @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="phone" class="form-control" wire:model="phone.0" placeholder="Enter Phone">
                        @error('phone.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
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
  
        {{-- @foreach($inputs as $key => $value)
            <div class=" add-input">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Name" wire:model="name.{{ $value }}">
                            @error('name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="phone.{{ $value }}" placeholder="Enter phone">
                            @error('phone.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    </div>
                </div>
            </div>
        @endforeach --}}
        <div><span class="text-danger"> {{ session('finalizado') }}</span></div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Submit</button>
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
