<div>
  <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastrar operador</h4>
                 
                  <form class="forms-sample" wire:submit.prevent="save">


                    <div class="form-group row">
                      <div class="col">
                        <label>Nome do Operador</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="operador" type="text"  placeholder="Operador" wire:model="operador">
                        </div>
                        <span class="text-danger"> {{ session('success_message') }}</span>
                         
                      </div>
                    </div>
                    <button  class="btn btn-primary me-2">Cadastrar Operador</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
            </div>
            
</div>
