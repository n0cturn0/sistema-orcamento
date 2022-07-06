<div>
   <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de nova Marca</h4>
                 
                  <form class="forms-sample" wire:submit.prevent="save">


                    <div class="form-group row">
                      <div class="col">
                      
                        <label>Marca</label>
                         <div><span class="text-danger"> {{ session('success_message') }}</span></div>
                        <div id="bloodhound">
                        
                          <input class="typeahead" name="marca" type="text"  placeholder="Descrição da marca" wire:model="marca">
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Cadastrar Marca</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
            </div>
</div>
