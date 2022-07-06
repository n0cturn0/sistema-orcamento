<div>
  <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de novo Modelo</h4>
                 
                  <form class="forms-sample" wire:submit.prevent="save">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col">
                                  <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title">Selecione uma marca</h4>                                                   
                                        <div class="form-group">
                                          <label for="exampleFormControlSelect3">Escola a Marca</label>
                                          <select class="form-control form-control-sm" id="exampleFormControlSelect3" wire:model="novamarca">
                                            <option>Selecione uma opção</option>
                                            @foreach($marca as $show )
                                            <option value="{{ $show->id}}">{{ $show->marca}}</option>
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
                                        <h4 class="card-title">Digite o modelo</h4>                                                   
                                        <div class="form-group">
                                          <label for="exampleFormControlSelect3">Modelo</label>
                                          <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Modelo" wire:model="modelo">
                                        </div>
                                      </div>
                                    </div>
                                </div> 
                              </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
            </div>
</div>
