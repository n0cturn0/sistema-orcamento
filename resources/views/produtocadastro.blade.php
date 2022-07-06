@extends('template')
@section('produtocadastro')
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de Produto</h4>
                 
                  <form class="forms-sample">
                    <div class="form-group row">
                      <div class="col">
                        <label>Produto</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="produto" type="text"  placeholder="Produto">
                        </div>
                      </div>
                      <div class="col">
                        <label>Preço</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="produto_preco"  type="text" placeholder="R$">
                        </div>
                      </div>

                      <div class="col">
                        <label>Quantidade</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="produto_quantidade"  type="number" placeholder="00">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
            </div>
@endsection