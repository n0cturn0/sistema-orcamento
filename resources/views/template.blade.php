<!DOCTYPE html>
<html lang="pt-BR">
 @livewireStyles
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Controle de loja </title>
  <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset ('../assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset ('../assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset ('../assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('../assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('../assets/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{ asset ('../assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('../assets/vendors/css/vendor.bundle.base.css')}}">
     <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    
     <!-- End plugin css for this page -->
    <!-- inject:css -->
     <link rel="stylesheet" href="{{asset('../assets/css/vertical-layout-light/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="../../index.html">
           <img src="{{ asset('../assets/images/logo.jpg') }}" alt="logo" />
            
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html">
             <img src="{{ asset('../assets/images/logo.jpg')}}" alt="logo" />
            
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Oficial <span class="text-black fw-bold">Estacionários</span></h1>
            <h3 class="welcome-sub-text">Assistência Técnica </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block">
            <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> OPÇÕES </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
              <a class="dropdown-item py-3" >
                <p class="mb-0 font-weight-medium float-left"></p>
              </a>
              <div class="dropdown-divider"></div>
              <a href="./telaorcamento" class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">ORÇAMENTOS </p>
                  <p class="fw-light small-text mb-0">Adicionar</p>
                </div>
              </a>
              <a href="./produto" class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">PRODUTOS</p>
                  <p class="fw-light small-text mb-0">Adicionar</p>
                </div>
              </a>
              <a href="./servico" class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">SERVIÇOS</p>
                  <p class="fw-light small-text mb-0">Adicionar</p>
                </div>
              </a>
              <a href="cliente" class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">CLIENTES</p>
                  <p class="fw-light small-text mb-0">Adicionar</p>
                </div>
              </a>
            </div>
          </li>
       
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                {{-- <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span></div> --}}
                 <div class="profile"><img src="{{ asset('../assets//images/faces/face1.jpg') }}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('../assets/images/faces/face2.jpg')}}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('../assets/images/faces/face3.jpg') }}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('../assets/images/faces/face4.jpg') }}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('../assets/images/faces/face5.jpg') }}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('../assets/images/faces/face6.jpg') }}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
    
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
           @yield('cadastrocliente')
           
           @yield('marcacadastro')
           @yield('modelocadastro')
           @yield('operadorcadastro')
           @yield('produtocadastro')
           @yield('servicocadastra')
           @yield('telacriaorcamento')
           @yield('orcamentoview')
           @yield('telaprincipal')
           @yield('inicioorcamento')
           @yield('lista_orcamento')
           @yield('listageral')
            {{-- <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de Cliente</h4>
                 
                  <form class="forms-sample">

                   






                    <div class="form-group">
                      <label for="exampleInputUsername1">Cliente</label>
                      <input type="text" class="form-control" name=""cliente id="exampleInputUsername1" placeholder="Nome do Cliente" required>
                    </div>

                    
                    <div class="form-group col">
                        <div id="bloodhound">
                      <label for="exampleInputEmail1">CPF/RG</label>
                      <input  class="form-control" id="cpfcnpj" placeholder="Email">
                    </div>
                    </div>

                    <div class="form-group row">
                      <div class="col">
                        <label>Cidade</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="cidade" type="text"  placeholder="States of USA">
                        </div>
                      </div>
                      <div class="col">
                        <label>Bairro</label>
                        <div id="bloodhound">
                          <input class="typeahead" type="text" placeholder="States of USA">
                        </div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <div class="col">
                        <label>Cep</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="cep" type="text"  placeholder="States of USA">
                        </div>
                      </div>
                      <div class="col">
                        <label>Rua</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="rua"  type="text" placeholder="States of USA">
                        </div>
                      </div>

                      <div class="col">
                        <label>Número</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="numero"  type="text" placeholder="States of USA">
                        </div>
                      </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                      <div class="col">
                        <label>Telefone</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="telefone" type="text"  placeholder="States of USA">
                        </div>
                      </div>
                      <div class="col">
                        <label>Telefone /  Celular</label>
                        <div id="bloodhound">
                          <input class="typeahead" name="celular"  type="text" placeholder="States of USA">
                        </div>
                      </div>

                      
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail</label>
                      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                   
                   
                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
            </div> --}}
      
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">By <a href="https://github.com/n0cturn0//" target="_blank">Luiz Augusto</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Oficial Estacionários © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 
  <!-- container-scroller -->
  <!-- plugins:js -->
  {{-- <script src="../../vendors/js/vendor.bundle.base.js"></script> --}}
  <script src="{{asset('../assets/vendors/js/vendor.bundle.base.js')}}"></script>

  <!-- endinject -->
  <!-- Plugin js for this page -->
  {{-- <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script> --}}
  {{-- <script src="../../vendors/select2/select2.min.js"></script> --}}
  {{-- <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> --}}
  <script src="{{ asset('../assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
  <script src="{{ asset('../assets/vendors/select2/select2.min.js')}}"></script>
  <script src="{{ asset('../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  {{-- <script src="../../js/off-canvas.js"></script> --}}
  {{-- <script src="../../js/hoverable-collapse.js"></script> --}}
  {{-- <script src="../../js/template.js"></script> --}}
  {{-- <script src="../../js/settings.js"></script> --}}
  {{-- <script src="../../js/todolist.js"></script> --}}
  <script src="{{ asset('../assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('../assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('../assets/js/template.js')}}"></script>
  <script src="{{ asset('../assets/js/settings.js')}}"></script>
  <script src="{{ asset('../assets/js/todolist.js')}}"></script>
  <script src="{{ asset('../assets/js/jquery.cookie.js')}}"></script>
  <script src="{{ asset('../assets/js/dashboard.js')}}"></script>
  <script src="{{ asset('../assets/js/Chart.roundedBarCharts.js')}}"></script>





  <!-- endinject -->
  <!-- Custom js for this page-->
  {{-- <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script> --}}
  <script src="{{ asset('../assets/js/file-upload.js') }}"></script>
  <script src="{{ asset('../assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('../assets/js/select2.js') }}"></script>
  <script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
 <script src="{{ asset('../assets/js/jquery.mask.js') }}"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
          window.addEventListener('show-delete-confirmation', event => {
          Swal.fire({
            title: 'Você tem certeza?',
            text: "Impossível restaurar depois de apagado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar esse produto!'
          }).then((result) => {
            if (result.isConfirmed) {
              Livewire.emit('deleteConfirmed')
            }
          })
          })
 </script>

<script>
$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
</script>
  @livewireScripts
</body>

</html>
