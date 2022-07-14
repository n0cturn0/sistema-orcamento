<div class="col-12 grid-margin">
  <div class="card">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card-body">
          {{-- <h4 class="card-title">Selecione um ação</h4>
          <div class="template-demo">
            <button  wire:click="addidorcamento({{ $ultimoid}})" type="button" class="btn btn-primary btn-icon-text">
              <i class="ti-file btn-icon-prepend"></i>
              Novo
            </button>
           
            <button type="button" class="btn btn-outline-primary btn-icon-text">
                <i class="ti-file btn-icon-prepend"></i>
                Buscar Orçamento
              </button>
          </div> --}}



          <div>
            <div class="col-md-12 grid-margin stretch-card">
                       <div class="card">
                         <div class="card-body">
                           <h4 class="card-title">Cadastro de Produto</h4>
                           <span class="text-danger"> {{ session('success_message') }}</span>
                           <form class="forms-sample" >
                             <div class="form-group row">
                               <div class="col">
                                 <label>Produto</label>
                                 <div id="bloodhound">
                                   <input class="typeahead" name="produto" type="text"  placeholder="Produto" required >
                                 </div>
                               </div>
                               <div class="col">
                                 <label>Preço</label>
                                 <div id="bloodhound">
                                   <input class="typeahead" name="produto_preco"  type="text" required placeholder="R$">
                                 </div>
                               </div>
                              <input type="hidden" name="id" value="{{ $ultimoid}}">
                               <div class="col">
                                 <label>Quantidade</label>
                                 <div id="bloodhound">
                                  <select class="form-control form-control-sm" id="exampleFormControlSelect3"  wire:model="novamarca" required>
                                    <option>Selecione uma opção</option>
                                    @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->cliente}}</option>
                                    @endforeach
                                    
                                  
                                  </select>
                                 </div>
                               </div>
                             </div>
                             <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                             <button class="btn btn-light">Cancelar</button>
                           </form>
                         </div>
                       </div>
                     </div>
         
         
         
                     <div class="col-md-12 grid-margin stretch-card">
                       <div class="card">
                         <div class="card-body">
                           <h4 class="card-title">Atualizar Preço do produto</h4>
                          
                           <form class="forms-sample" >
         
                             <div class="row">
         
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <div class="col">
                                           <div class="card">
                                               <div class="card-body">
                                                 <h4 class="card-title">Selecione o Produto</h4>                                                   
                                                 <div class="form-group">
                                                   <label for="exampleFormControlSelect3">Escolha o produto</label>
                                                   <select class="form-control form-control-sm" id="exampleFormControlSelect3"  required>
                                                     <option>Selecione um produto</option>
                                                
                                                     <option value="4">ff</option>
                                                  
                                                   
                                                   </select>
                                                 </div>
                                               </div>
                                             </div>
                                         </div> 
                                       </div>
                                 </div>
             
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <div class="col">
                                           <div class="card">
                                               <div class="card-body">
                                                 <h4 class="card-title">Preço</h4>    
                                                  <div>
                                                 <span class="text-danger"> {{ session('preocoatualizado') }}</span>
                                                 </div>                                               
                                                                 <div class="form-group">
                                                   <label for="exampleFormControlSelect3">Digite novo Preço</label>
                                                   <div>
                                                     
                                                   </div>
                                                   <input type="text" class="form-control" id="exampleInputUsername1" placeholder="0"  >
                                                 </div>
                                               </div>
                                             </div>
                                         </div> 
                                       </div>
                                 </div>
         
                             </div>
         
                             <button type="submit" class="btn btn-warning me-2">Atualizar</button>
                             <button class="btn btn-light">Cancelar</button>
                           </form>
                         </div>
                       </div>
                     </div>
         
         
         
         
         
         
         
                     <div class="col-md-12 grid-margin stretch-card">
                       <div class="card">
                         <div class="card-body">
                           <h4 class="card-title">Inserir em Estoque</h4>
                          
                           <form class="forms-sample">
         
                             <div class="row">
         
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <div class="col">
                                           <div class="card">
                                               <div class="card-body">
                                                 <h4 class="card-title">Selecione o Produto</h4>                                                   
                                                 <div class="form-group">
                                                   <label for="exampleFormControlSelect3">Escolha o produto</label>
                                                   <select class="form-control form-control-sm" id="exampleFormControlSelect3"   required>
                                                     <option>Selecione um produto</option>
                                                   
                                                     <option value="0">dd</option>
                                                  
                                                   
                                                   </select>
                                                 </div>
                                               </div>
                                             </div>
                                         </div> 
                                       </div>
                                 </div>
             
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <div class="col">
                                           <div class="card">
                                               <div class="card-body">
                                                 <h4 class="card-title">Quantidade</h4>    
                                                  <div>
                                                 <span class="text-danger"> {{ session('atualizado') }}</span>
                                                 </div>                                               
                                                                 <div class="form-group">
                                                   <label for="exampleFormControlSelect3">Quantidade</label>
                                                   <div>
                                                     
                                                   </div>
                                                   <input type="text" class="form-control" id="exampleInputUsername1" placeholder="0"  >
                                                 </div>
                                               </div>
                                             </div>
                                         </div> 
                                       </div>
                                 </div>
         
                             </div>
         
                             <button type="submit" class="btn btn-warning me-2">Atualizar</button>
                             <button class="btn btn-light">Cancelar</button>
                           </form>
                         </div>
                       </div>
                     </div>
         
                  
         
                   
         </div>
         
          
         
         
         
        </div>
      </div>
    </div>
  </div>
</div>