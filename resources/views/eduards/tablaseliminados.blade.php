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
                            <h5>Tabla de Datos Eliminados</h5>
                            <span>Informacion de registrados eliminados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista eliminados</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Lista de Datos Eliminados</h3>
            </div>
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
                              {{ __('Proyecto') }}
                            </th>
                            <th class="text-center">
                              {{ __('Construccion') }}
                            </th>
                            <th class="text-center">
                                {{ __('Item ') }}
                              </th>
                              <th class="text-center">
                                {{ __('Ci Us.') }}
                              </th>
                              <th class="text-center">
                                {{ __('Nombre') }}
                              </th>
                              <th class="text-center">
                              {{ __('Fecha') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($resp as $dato)
                            <tr>
                             <td class="text-center">
                           {{ $loop->iteration }}
                         </td>
                         <td class="text-center">
                           {{ $dato->pory }}
                         </td>
                         <td class="text-center">
                           {{ $dato->constr }}
                         </td>
                         <td class="text-center">
                               {{ $dato->nombre_act }}
                             </td>
                             <td class="text-center">
                                {{ $dato->ciper }}
                               </td>
                              <td class="text-center">
                                {{ $dato->user_ids }}
                              </td>
                              <td class="text-center">
                                    {{ $dato->fech }}
                              </td>

                     @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">
                                    {{ __('#') }}
                                </th>
                                <th class="text-center">
                                  {{ __('Proyecto') }}
                                </th>
                                <th class="text-center">
                                  {{ __('Construccion') }}
                                </th>
                                <th class="text-center">
                                    {{ __('Item ') }}
                                  </th>
                                  <th class="text-center">
                                    {{ __('Ci Us.') }}
                                  </th>
                                  <th class="text-center">
                                    {{ __('Nombre') }}
                                  </th>
                                  <th class="text-center">
                                  {{ __('Fecha') }}
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
 @push('links')
 <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('proyect')}}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

 @endpush
 @push('scripts')
 <script src="{{ asset('proyect') }}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="{{ asset('proyect') }}/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <script src="{{ asset('proyect') }}/js/datatables.js"></script>

 @endpush
