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
                            <h5>Formulario de Edicion</h5>
                            <span>Formulario de edicion en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Editar Ubicaciones</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header"><h3>Formulario De Edicion de Ubicacion</h3></div>
                <div class="col-md-8 text-right">
                    </div>

                <div class="card-block">

                        <div class="form">
                            <form method="post" action="{{route('inactitem')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
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
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="const" id="input-name" type="text" placeholder="{{ __('Nombre ') }}" value="{{ old('const',$selec[0]->id_cont) }}" required="true" aria-required="true"/>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                  </div>

                                <div  class="form-group row"  style="display:none;">
                                    <label class="col-sm-3 col-form-label">{{ __('Nombre De Proyecto ') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="proy" id="input-name" type="text" placeholder="{{ __('Nombre ') }}" value="{{ old('proy',$selec[0]->nombr_proy) }}" required="true" aria-required="true" list="prot"/>
                                          <datalist id="prot" >
                                            @foreach($proy as $pro)
                                            <option value="{{$pro->nombr_proy}}" > {{$pro->nombr_proy}} </option>
                                            @endforeach
                                      </datalist>
                                      </div>
                                    </div>
                                  </div>

                                <div  class="form-group row" >
                                    <label class="col-sm-3 col-form-label">{{ __('Nombre Item') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nombr" id="input-name" type="text" placeholder="{{ __('Nombre ') }}" value="{{ old('nombr',$selec[0]->nombr_c) }}" required="true" aria-required="true"/>
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
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unid_pro" id="input-name" type="text" placeholder="{{ __('Unidad de Proyecto') }}" value="{{ old('unid_pro',$selec[0]->nombre) }}" required="true" aria-required="true" list="dadm"/>
                                      <datalist id="dadm" >
                                          @foreach($item as $ite)
                                          <option value="{{$ite->nombre}}" > {{$ite->nombre}} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>

                                </div>

                                <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                  <button class="btn btn-theme" type="submit">Editar Item</button>
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
 {{-- <script language="JavaScript" type="text/javascript">

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
 </script> --}}
  @endsection
   <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}/js/select/ciud.js"></script>

  {{-- @section('scripts')
  <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/avenidas.js"></script>

 @endsection --}}
