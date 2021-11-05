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
                            <h5>Lista de Unidades Para Items</h5>
                            <span>Informacion de los Unidades registrados en sistema</span>
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
                <h3>Lista de Unidad para Items</h3>
            </div>
            <a href="{{route('formactiv')}}" class="btn btn-sm btn-primary">{{ __('Unidad De Item') }}</a>
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
                              {{ __('Nombre') }}
                            </th>
                            <th class="text-center">
                              {{ __('Abreviatura') }}
                            </th>
                            <th class="text-center">
                              {{ __('Actividades ') }}
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($selec as $sel)
                            <tr>
                             <td class="text-center">
                           {{ $loop->iteration }}
                         </td>
                         <td class="text-center">
                           {{ $sel->nombre }}
                         </td>
                                                  <td class="text-center">
                           {{ $sel->abre }}
                         </td>
                         <td class="text-center">
                            <a href="{{ route('Itemedit',$sel->id_md) }}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                         </td>

                     @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center">
                              {{ __('Nombre') }}
                            </th>
                            <th class="text-center">
                              {{ __('Abreviatura') }}
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
