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
                            <h5>Lista de Ubicacion</h5>
                            <span>Informacion de las Ubicaciones registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Formulario Registro de Items</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header"><h3>Formulario De Registros De Items</h3></div>
                <div class="col-md-8 text-right">
                    </div>

                <div class="card-block">

                        <div class="form">
                            <form method="post" action="{{route('inact')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                            enctype="multipart/form-data"
                            >
                              @csrf
                              @method('post')
                              <div class="form-group row">
                                  <div class="col-md-12 text-right">
                                  </div>
                                </div>

                                </div>
                                <div  class="form-group row" style="display:none;" >
                                    <label class="col-sm-3 col-form-label">{{ __('id_pro ') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="proy" id="input-name" type="text" placeholder="{{ __('Nombre ') }}" value="{{ old('proy',$pro) }}" required="true" aria-required="true"/>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Nombre de Obra') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="sen" id="input-name" type="text" placeholder="{{ __('Nombre de Obra') }}" value="{{ old('sen') }}" required="true" aria-required="true" list="sen"/>
                                      <datalist id="sen" >
                                          @foreach($contr as $con)
                                          <option value="{{$con->nombr_c}}" > {{$con->nombr_c}} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>

                                </div>
                                <div  class="form-group row" >
                                    <label class="col-sm-3 col-form-label">{{ __('Nombre Item') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nombr" id="input-name" type="text" placeholder="{{ __('Nombre ') }}" value="{{ old('nombr') }}" required="true" aria-required="true"/>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Unidad de Proyecto') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unid_pro" id="input-name" type="text" placeholder="{{ __('Unidad de Proyecto') }}" value="{{ old('unid_pro') }}" required="true" aria-required="true" list="dadm"/>
                                      <datalist id="dadm" >
                                          @foreach($unid_pro as $unid_p)
                                          <option value="{{$unid_p->nombre}}" > {{$unid_p->nombre}} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>

                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Clasificacion') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
  {{--                                             <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Clasificacion') }}" value="{{ old('clasi') }}" required="true" aria-required="true" list="list_vial"/>
  --}}                                          <select id="list_vial" class="form-control" name="clasi" onchange="mostrar()" >
                                        <option value="">Seleccionar Clasificacion</option>
                                        <option value="Maquina">Maquinaria</option>
                                        <option value="ManoB">Mano de Obra</option>
                                        <option value="Material">Material</option>
                                    </select>
                                      @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                </div>

                                <div id="entre" class="form-group row" style="display:none;">
                                  <label class="col-sm-3 col-form-label">{{ __('Costo por Hora') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="info" id="input-name" type="text" placeholder="{{ __('Costo por Hora') }}" value="{{ old('info', $aux) }}" required="true" aria-required="true"/>
                                        @if ($errors->has('name'))
                                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                  </div>
                                </div>
                                <div id="kilometro" class="form-group row" style="display:none;">
                                  <label class="col-sm-3 col-form-label">{{ __('Total de Horas') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="info1" id="input-name" type="text" placeholder="{{ __('Total de Horas') }}" value="{{ old('info1', $aux1) }}" required="true" aria-required="true"/>
                                      @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                                <div id="costo" class="form-group row" style="display:none;">
                                    <label class="col-sm-3 col-form-label">{{ __('Costo Por Unidad') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cost" id="input-name" type="text"  placeholder="{{ __('Costo por Unidad') }}" value="{{ old('cost', $aux) }}"  required="true" aria-required="true" />
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                  </div>
                                <div id="cantidad" class="form-group row" style="display:none;">
                                    <label class="col-sm-3 col-form-label">{{ __('Catidad') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="info2" id="input-name" type="text"  placeholder="{{ __('Costo por Hora') }}" value="{{ old('info2', $aux) }}"  required="true" aria-required="true" />
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div id="unidad" class="form-group row" style="display:none;">
                                    <label class="col-sm-3 col-form-label">{{ __('Unidad De Medida') }}</label>
                                    <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unid" id="input-name" type="text" placeholder="{{ __('Unidad de Medida') }}" value="{{ old('unid',$aux2) }}" required="true" aria-required="true" list="unid"/>
                                          <datalist id="unid" >
                                              @foreach($unid as $un)
                                              <option value="{{$un->nombr_m}}" > {{$un->nombr_m}} </option>
                                              @endforeach
                                        </datalist>
                                        </div>
                                      </div>
                                  </div>
                              <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                  <button class="btn btn-theme" type="submit">Añadir Ubi</button>
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
 <script language="JavaScript" type="text/javascript">

      function mostrar(){
      var paquet=document.getElementById("list_vial").value;
      if(paquet=="Maquina"||paquet=="ManoB"){
        //alert(paquet);
        $("#kilometro").show("slow");
        $("#entre").show("slow");
        $("#costo").hide();
        $("#unidad").hide();
        $("#cantidad").hide();

      }
      if((paquet=="Material")){
        //alert(paquet);
        $("#kilometro").hide();
        $("#entre").hide();
        $("#costo").show("slow");
        $("#unidad").show("slow");
        $("#cantidad").show("slow");

      }
    }
 </script>
  @endsection
   <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}/js/select/ciud.js"></script>

  {{-- @section('scripts')
  <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/avenidas.js"></script>

 @endsection --}}
