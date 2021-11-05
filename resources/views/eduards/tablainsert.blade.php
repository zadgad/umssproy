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
                            <h5>Lista de Registros Prosesados en el Sistema</h5>
                            <span>Informacion de registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista de Registro</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Registro de Proyectos</h3></div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>CI</th>
                                    <th>Nombre Us.</th>
                                    <th>Proyecto.</th>
                                    <th >Fecha</th>
                                    <th>ID US.</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selectproy as $proy)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                          </td>
                                          <td class="text-center">
                                            {{ $proy->ci }}
                                          </td>
                                          <td class="text-center">
                                            {{ $proy->nombre }}
                                          </td>
                                          <td class="text-center">
                                            {{ $proy->nombr_proy }}
                                          </td>
                                          <td class="text-center">
                                            {{ $proy->fechap }}
                                          </td>
                                          <td class="text-center">
                                            {{ $proy->user_idp}}
                                          </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Registro de Actividades</h3>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="simpletable"
                                   class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ci Us.</th>
                                    <th>Nombre P.</th>
                                    <th>Nombre C.</th>
                                    <th>Fecha</th>
                                    <th>ID US.</th>
                                </tr>
                                </thead>
                                <tbody>
                                        @foreach ($selectconst as $const)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                              </td>
                                              <td class="text-center">
                                                {{ $const->ci_per }}
                                              </td>
                                              <td class="text-center">
                                                {{ $const->nombr_proy }}
                                              </td>
                                              <td class="text-center">
                                                {{ $const->nombr_c }}
                                              </td>
                                              <td class="text-center">
                                                {{ $const->fecha }}
                                              </td>
                                              <td class="text-center">
                                                {{ $const->user_idc}}
                                              </td>
                                        </tr>

                                        @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Ci Us.</th>
                                    <th>Nombre P.</th>
                                    <th>Nombre C.</th>
                                    <th>Fecha</th>
                                    <th>ID US.</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Registro de Maquinaria</h3>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="order-table"
                                   class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ci Us.</th>
                                        <th>Nombre P.</th>
                                        <th>Nombre C.</th>
                                        <th>Nomb. Item</th>
                                        <th>Fecha</th>
                                        <th>ID US.</th>
                                    </tr>
                                      </thead>
                                <tbody>
                                    @foreach ($selectmaq as $maq)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                          </td>
                                          <td class="text-center">
                                            {{ $maq->ci_per }}
                                          </td>
                                          <td class="text-center">
                                            {{ $maq->nombr_proy }}
                                          </td>
                                          <td class="text-center">
                                            {{ $maq->nombr_c }}
                                          </td>
                                          <td class="text-center">
                                            {{ $maq->nomb_maq }}
                                          </td>
                                          <td class="text-center">
                                            {{ $maq->fechamq }}
                                          </td>
                                          <td class="text-center">
                                            {{ $maq->user_idmq}}
                                          </td>
                                    </tr>

                                    @endforeach
                            </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Ci Us.</th>
                                    <th>Nombre P.</th>
                                    <th>Nombre C.</th>
                                    <th>Nomb. Item</th>
                                    <th>Fecha</th>
                                    <th>ID US.</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Lista De Personal Ingresados</h3>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="multi-colum-dt"
                                   class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ci Us.</th>
                                    <th>Nombre P.</th>
                                    <th>Nombre C.</th>
                                    <th>Nomb. Item</th>
                                    <th>Fecha</th>
                                    <th>ID US.</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectmanb as $manb)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                          </td>
                                          <td class="text-center">
                                            {{ $manb->ci_per }}
                                          </td>
                                          <td class="text-center">
                                            {{ $manb->nombr_proy }}
                                          </td>
                                          <td class="text-center">
                                            {{ $manb->nombr_c }}
                                          </td>
                                          <td class="text-center">
                                            {{ $manb->nomb_ca }}
                                          </td>
                                          <td class="text-center">
                                            {{ $manb->fechamb }}
                                          </td>
                                          <td class="text-center">
                                            {{ $manb->user_idmb}}
                                          </td>
                                    </tr>

                                    @endforeach

                            </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Ci Us.</th>
                                    <th>Nombre P.</th>
                                    <th>Nombre C.</th>
                                    <th>Nomb. Item</th>
                                    <th>Fecha</th>
                                    <th>ID US.</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Lista De Material Registro En sistema</h3>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="complex-dt"
                                   class="table table-striped table-bordered nowrap">
                                <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Ci Us.</th>
                                    <th>Nombre P.</th>
                                    <th>Nombre C.</th>
                                    <th>Nomb. Item</th>
                                    <th>Fecha</th>
                                    <th>ID US.</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectmat as $mat)

                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                          </td>
                                          <td class="text-center">
                                            {{ $mat->ci_per }}
                                          </td>
                                          <td class="text-center">
                                            {{ $mat->nombr_proy }}
                                          </td>
                                          <td class="text-center">
                                            {{ $mat->nombr_c }}
                                          </td>
                                          <td class="text-center">
                                            {{ $mat->nomb_mat }}
                                          </td>
                                          <td class="text-center">
                                            {{ $mat->fechamt }}
                                          </td>
                                          <td class="text-center">
                                            {{ $mat->user_idmt}}
                                          </td>

                                    </tr>
                                    @endforeach
                            </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Ci Us.</th>
                                    <th>Nombre P.</th>
                                    <th>Nombre C.</th>
                                    <th>Nomb. Item</th>
                                    <th>Fecha</th>
                                    <th>ID US.</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Language - Comma Decimal Place table end -->
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
