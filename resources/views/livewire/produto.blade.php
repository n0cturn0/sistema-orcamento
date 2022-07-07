<div>
   <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de Produto</h4>
                  <span class="text-danger"> {{ session('success_message') }}</span>
                  <form class="forms-sample" wire:submit.prevent="save">
                    <div class="form-group row">
                      <div class="col">
                        <label>Produto</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="produto" type="text"  placeholder="Produto" required wire:model="produtonovo">
                        </div>
                      </div>
                      <div class="col">
                        <label>Preço</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="produto_preco"  type="text" required placeholder="R$" wire:model="preco">
                        </div>
                      </div>

                      <div class="col">
                        <label>Quantidade</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="produto_quantidade" required  type="number" placeholder="00" wire:model="quantidade">
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
                  <h4 class="card-title">Inserir em Estoque</h4>
                 
                  <form class="forms-sample" wire:submit.prevent="inserepreco">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col">
                                  <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title">Selecione o Produto</h4>                                                   
                                        <div class="form-group">
                                          <label for="exampleFormControlSelect3">Escolha o produto</label>
                                          <select class="form-control form-control-sm" id="exampleFormControlSelect3"  wire:model="produtopreco" required>
                                            <option>Selecione um produto</option>
                                           @foreach($produto as $show)
                                            <option value="{{$show->id}}">{{ $show->produto}}</option>
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
                                        <h4 class="card-title">Quantidade</h4>    
                                         <div>
                                        <span class="text-danger"> {{ session('atualizado') }}</span>
                                        </div>                                               
                                                        <div class="form-group">
                                          <label for="exampleFormControlSelect3">Quantidade</label>
                                          <div>
                                            
                                          </div>
                                          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="0"  required wire:model="inserequantidade">
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
                  <h4 class="card-title">Apagar produto</h4>
                 
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Produto</th>
                          <th>Preço</th>
                          <th>Quantidade</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($exibeProduto as $produto)
                        <tr>
                          <td>{{ $produto->produto}}</td>
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
