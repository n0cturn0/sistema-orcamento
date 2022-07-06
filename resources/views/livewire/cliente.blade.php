<div>
    <div class="col-md-12 grid-margin stretch-card">

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de Cliente</h4>
                 
                  <form class="forms-sample" wire:submit.prevent="save">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Cliente</label>
                      <input type="text" class="form-control" name="cliente" id="exampleInputUsername1" placeholder="Nome do Cliente" required wire:model="cliente">
                    </div>

                    <div class="form-group row">
                      <div class="col">
                        <label>CPF</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="cidade" type="text" data-mask="000.000.000-00"  placeholder="Cpf" wire:model="cpf">
                        </div>
                      </div>
                      <div class="col">
                        <label>CNPJ</label>
                        <div id="bloodhound">
                          <input class="typeahead" type="text" data-mask="00.000.000/0000-00" placeholder="Cnpj" wire:model="cnpj">
                        </div>
                      </div>
                    </div>
                

                    <div class="form-group row">
                      <div class="col">
                        <label>Cidade</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="cidade" type="text"  placeholder="Cidade" wire:model="cidade">
                        </div>
                      </div>
                      <div class="col">
                        <label>Bairro</label>
                        <div id="bloodhound">
                          <input class="typeahead" type="text" placeholder="Bairro" wire:model="bairro">
                        </div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <div class="col">
                        <label>Cep</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="cep" type="text" data-mask="00000-000"  placeholder="7900-000" wire:model="cep">
                        </div>
                      </div>
                      <div class="col">
                        <label>Rua</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="rua"  type="text" placeholder="Rua . . ." wire:model="rua">
                        </div>
                      </div>

                      <div class="col">
                        <label>Número</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="numero"  type="text" placeholder="0000" wire:model="numero">
                        </div>
                      </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                      <div class="col">
                        <label>Telefone</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="telefone" type="text" data-mask="(00) 00000-0000"  placeholder="Telefone" wire:model="telefone">
                        </div>
                      </div>
                      <div class="col">
                        <label>Telefone /  Celular</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="celular" data-mask="(00) 00000-0000"  type="text" placeholder="Celular" wire:model="celular">
                        </div>
                      </div>

                      
                    </div>
                         <span class="text-danger"> {{ session('success_message') }}</span>

                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail</label>
                      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="email" wire:model="email">
                    </div>
                   
                   
                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
            </div>

            
</div>
