<div>
     <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de Serviço</h4>
                 
                  <form class="forms-sample" wire:submit.prevent="save">
                    

                    <div class="form-group row">
                      <div class="col">
                        <label>Serviço</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="servico" type="text"  placeholder="Descrição do Serviço" wire:model="servico">
                        </div>
                      </div>
                      <div class="col">
                        <label>Preço</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="servico_valor"  type="text" placeholder="R$"wire:model="preco">
                        </div>
                      </div>

                      
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Descrição do Serviço</label>
                        <textarea class="form-control" name="descricao-sv" id="exampleTextarea1" rows="4" wire:model="descricao"></textarea>
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
                  <h4 class="card-title">Atualizar Preço do serviço</h4>
                 
                  <form class="forms-sample" wire:submit.prevent="atualizapreco">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col">
                                  <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title">Selecione o Serviço para atualizar</h4>                                                   
                                        <div class="form-group">
                                          <label for="exampleFormControlSelect3">Escolha o serviço</label>
                                          <select class="form-control form-control-sm" id="exampleFormControlSelect3"  wire:model="atualizaservicopreco" required>
                                            <option>Selecione um serviço</option>
                                           @foreach($exibelista as $show)
                                            <option value="{{$show->id}}">{{ $show->servico}}</option>
                                          @endforeach
                                          
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
                                          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="0"  required wire:model="novopreco">
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




                




            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Apagar Serviço</h4>
                 
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Serviço</th>
                          <th>Preço</th>
                         
                          <th></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($exibelista as $produto)
                        <tr>
                          <td>{{ $produto->servico}}</td>
                          <td>{{ $produto->preco}}</td>
                         
                          <td><button wire:click.prevent="remove({{$produto->id}})" class="add btn btn-danger btn-sm" id="add-task">Apagar</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

























</div>
