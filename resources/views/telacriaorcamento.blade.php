@extends('template')
@section('telacriaorcamento')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Inserir em Estoque</h4>
       
        <form class="forms-sample" wire:submit.prevent="atualizaquantidade">

          <div class="row">

              <div class="col-md-3">
                  <div class="form-group">
                      <div class="col">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Selecione o Produto</h4>                                                   
                              <div class="form-group">
                                <label for="exampleFormControlSelect3">Escolha o produto</label>
                              
                                <div class="container">
                                    <div class="row">
                                     
                                    </div>
                                    <br />
                                      <div class="row">
                                          <div class='col-sm-3'>
                                              <div class="form-group">
                                                

                                               
       
                                                   
                                                      
                                                   
                                              
                                                  


                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                 
                              </div>
                            </div>
                          </div>
                      </div> 
                    </div>
              </div>

              <div class="col-md-3">
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
@endsection