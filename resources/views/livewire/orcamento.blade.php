<div>
    <div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">O R Ç A M E N T O</h4>
               
                <form class="forms-sample">
        
                  <div class="row">
        
                      <div class="col-md-3">
                          <div class="form-group">
                              <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                      <h4 class="card-title">Data de entrada</h4>                                                   
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Data de entrada</label>
                                        <input type="text" class="form-control" data-mask="00/00/0000" id="exampleInputUsername1" placeholder="00/00/0000"  required wire:model="dataentrada">
        
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
                                      
                                        <select class="form-control form-control-sm" id="exampleFormControlSelect3" 
                                        wire:model="idproduto"
                                        wire:change="filterproduto"
                                          required>
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
                      <p> {{ $dataentrada }}</p>
                      <p> {{ $idproduto }}</p>
                     


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
                                    @if($produtos)
                                      <select class="form-control form-control-sm" id="exampleFormControlSelect3"  required>
                                          <option>{{ $produtos->produto}}</option>
                                        </select>
                                        @endif
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
