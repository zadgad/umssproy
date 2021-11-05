@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Añadir Ciudad ')])

 @section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Formulario De Registro De Proyectos</h5>
                            <span>Registrar la informacion necesaria en el sistema</span>
                            <br>
                            <br>
                            <h6> </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Apps</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Lista Ubicaciones</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header"><h3>Formulario De Registros De Proyectos</h3></div>
                <div class="col-md-8 text-right">
                    </div>

                <div class="card-block">

                        <div class="form">
                            <form method="post" action="{{route('inpro')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                            enctype="multipart/form-data"
                            >
                              @csrf
                              @method('post')
                              <div class="form-group row">
                                  <div class="col-md-12 text-right">
                                  </div>
                                </div>
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Nombre de Proyecto') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="proyect" id="input-name" type="text" placeholder="{{ __('Nombre de Proyecto') }}" value="{{ old('proyect') }}" required="true" aria-required="true" />
                                      @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Clasificacion') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
  {{--                                             <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Clasificacion') }}" value="{{ old('clasi') }}" required="true" aria-required="true" list="list_vial"/>
  --}}                                          <select id="list_vial" class="form-control" name="clasifi"  >
                                        <option value="">Seleccionar Clasificacion</option>
                                        <option value="Urbano">Urbano</option>
                                        <option value="Rural">Rural</option>
                                    </select>
                                      @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Clasificacion') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
  {{--                                             <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Clasificacion') }}" value="{{ old('clasi') }}" required="true" aria-required="true" list="list_vial"/>
  --}}                                          <select id="provi" class="form-control" name="provin"  >
                                        <option value="">Seleccionar Provincia</option>
                                        <option value="Cercado">Cercado</option>
                                        <option value="Quillacollo">Quillacollo</option>
                                        <option value="Chapare">Chapare</option>
                                        <option value="Tapacari">Tapacari</option>
                                        <option value="Bolivar">Bolivar</option>
                                        <option value="Arque">Arque</option>
                                        <option value="Capinota">Capinota</option>
                                        <option value="Misque">Misque</option>
                                        <option value="Capero">Campero</option>
                                        <option value="Ayopaya">Ayopaya</option>
                                        <option value="Carrasco">Carrasco</option>
                                        <option value="Punata">Punata</option>
                                        <option value="Arani">Arani</option>
                                        <option value="Esteban Arze">Esteban Arze</option>
                                        <option value="Jerman Jordan">Jerman Jordan</option>
                                        <option value="Tiraque">Tiraque</option>
                                    </select>
                                      @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                </div>

                              <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                  <button class="btn btn-theme" type="submit">Añadir Proyecto</button>
                                </div>
                              </div>
                            </form>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  @endsection
   <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}/js/select/ciud.js"></script>

  {{-- @section('scripts')
  <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/avenidas.js"></script>

 @endsection --}}
