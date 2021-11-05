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
                            <h5>Lista de Proyectos</h5>
                            <span>Informacion de los proyectos registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista de proyectos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Lista de proyectos</h3>
            </div>
            <a href="{{route('formactiv')}}" class="btn btn-sm btn-primary">{{ __('Añadir Unid SubProyecto') }}</a>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="lang-dt"
                           class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center">
                              {{ __('Proyectos') }}
                            </th>
                            <th class="text-center">
                              {{ __('Clasificacion') }}
                            </th>
                            <th class="text-center">
                              {{ __('Provincia ') }}
                            </th>
                            <th class="text-center">
                              {{ __('Actividades ') }}
                            </th>
                            <th class="text-center">
                                {{ __('Funciones') }}
                              </th>
                   <th class="text-center">
                              {{ __('Insertar Actividades ') }}
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($proy as $pro)
                            <tr>
                             <td class="text-center">
                           {{ $loop->iteration }}
                         </td>
                         <td class="text-center">
                            <a href="{{ route('epro',$pro->id_proye) }}"> {{ $pro->nombr_proy }} </a>
                         </td>
                                                  <td class="text-center">
                           {{ $pro->tipo }}
                         </td>
                                                  <td class="text-center">
                           {{ $pro->provincia }}
                         </td>
                         <td class="text-center">
                            <a href="{{route('tabact',$pro->id_proye)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                         </td>
                         <td class="text-center">
                            <a href="{{route('formul_act',$pro->id_proye)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                         </td>
                         <td class="text-center">
                            <a  href="{{ route('epro',$pro->id_proye) }}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                            <a href="{{ route('bopro',$pro->id_proye) }}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                         </td>
                     @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center">
                              {{ __('Proyectos') }}
                            </th>
                            <th class="text-center">
                              {{ __('Clasificacion') }}
                            </th>
                            <th class="text-center">
                              {{ __('Provincia ') }}
                            </th>
                            <th class="text-center">
                              {{ __('Actividades ') }}
                            </th>
                            <th class="text-center">
                              {{ __('Insertar Actividades ') }}
                            </th>
                            <th class="text-center">
                                {{ __('Funciones') }}
                              </th>

                            </tr>
                        </tfoot>
                    </table>
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
 <script src="{{ asset('proyect') }}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="{{ asset('proyect') }}/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <script src="{{ asset('proyect') }}/js/datatables.js"></script>

 @endpush
