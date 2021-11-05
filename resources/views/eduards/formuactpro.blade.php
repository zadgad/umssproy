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
                            <h5>Regitrar Unidades de Medidas Para las Actividades </h5>
                            <span>Unidades de Medidas que ser registraran en el sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Unidades De Medidas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header"><h3>Formulario De Registros de Unidades de Medidas Para las Actividades</h3></div>
                <div class="col-md-8 text-right">
                    </div>

                <div class="card-block">

                        <div class="form">
                            <form method="post" action="{{route('inunidact')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                            enctype="multipart/form-data"
                            >
                              @csrf
                              @method('post')
                              <div class="form-group row">
                                  <div class="col-md-12 text-right">
                                  </div>
                                </div>
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Nombre de Unidad') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unidad" id="input-name" type="text" placeholder="{{ __('Nombre de Unidad') }}" value="{{ old('unidad') }}" required="true" aria-required="true" />
                                      @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                  </div>

                                </div>
                                <div  class="form-group row" ">
                                    <label class="col-sm-3 col-form-label">{{ __('Abreviatura ') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="abre" id="input-name" type="text" placeholder="{{ __('Abreviatura ') }}" value="{{ old('abre') }}" required="true" aria-required="true"/>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                  </div>

                              <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                  <button class="btn btn-theme" type="submit">Añadir Unidad de Actividad</button>
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
