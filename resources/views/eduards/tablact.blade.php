@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Lista de ciudades ')])
@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Lista de Actividades del {{$nombrp[0]}}</h5>
                            <span>Informacion registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista Actividades {{$nombrp[0]}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Lista de Items</h3></div>
                    <div class="card-body">
                        <table id="lang-dt"
                        class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                         <th class="text-center">
                             {{ __('#') }}
                         </th>
                         <th class="text-center">
                           {{ __('Nombre Proyecto') }}
                         </th>
                         <th class="text-center">
                           {{ __('Nombre Construccion') }}
                         </th>
                         <th class="text-center">
                           {{ __('Unidad De Medida') }}
                         </th>
                         <th class="text-center">
                           {{ __('Material') }}
                         </th>
                         <th class="text-center">
                           {{ __('Mano de Obra ') }}
                         </th>
                         <th class="text-center">
                             {{ __('Maquinaria ') }}
                           </th>
                           <th class="text-center">
                             {{ __('Calcular ') }}
                           </th>
                           <th class="text-center">
                             {{ __('Actividades ') }}
                           </th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($select as $selec)
                         <tr>
                          <td class="text-center">
                        {{ $loop->iteration }}
                        </td>
                        <td class="text-center">
                        {{ $selec->nombr_proy }}
                        </td>
                                               <td class="text-center">
                        {{ $selec->nombr_c }}
                        </td>
                        <td class="text-center">
                        {{ $selec->nombre }}
                        </td>
                        <td class="text-center">
                         <a href="{{route('material',$selec->id_cont)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                        </td>
                        <td class="text-center">
                         <a href="{{route('manobra',$selec->id_cont)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                        </td>
                        <td class="text-center">
                         <a href="{{route('maquinaria',$selec->id_cont)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                          </td>
                          <td class="text-center">
                             <a href="{{route('forcal',$selec->id_cont)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                          </td>
                          <td class="text-center">
                             <a  href="{{ route('actform',$selec->id_cont) }}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                            <a href=""><i class="ik ik-trash-2 f-16 text-red"></i></a>
                           </td>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <tr>
                                <th class="text-center">
                                    {{ __('#') }}
                                </th>
                                <th class="text-center">
                                  {{ __('Nombre Proyecto') }}
                                </th>
                                <th class="text-center">
                                  {{ __('Nombre Construccion') }}
                                </th>
                                <th class="text-center">
                                  {{ __('Unidad De Medida') }}
                                </th>
                                <th class="text-center">
                                  {{ __('Material') }}
                                </th>
                                <th class="text-center">
                                  {{ __('Mano de Obra ') }}
                                </th>
                                <th class="text-center">
                                    {{ __('Maquinaria ') }}
                                  </th>
                                  <th class="text-center">
                                    {{ __('Calcular ') }}
                                  </th>
                                  <th class="text-center">
                                    {{ __('Actividades ') }}
                                  </th>
                               </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>
 @endsection
 @push('links')
 <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('proyect')}}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

 @endpush
 @push('scripts')
         <script src="{{ asset('proyect') }}/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <script src="{{ asset('proyect') }}/js/datatables.js"></script>

 @endpush
