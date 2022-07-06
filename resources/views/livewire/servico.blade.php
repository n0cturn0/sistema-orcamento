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
</div>
