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
                <h3>Analisis de Precios Unitarios</h3>
            </div>

            <div  class="row">
                <div class="col-md-12">
                    <div class="card">
                        <a onclick="javascript:window.imprimirDIV('ID_DIV');" class="btn btn-sm btn-primary">Print </a>
                        <div id="ID_DIV" class="card-body p-0 table-border-style">
                            <div class="card-header d-block">
                                <h3 class="text-center">ANALISIS DE PRECIO UNITARIO </h3>
                            </div>
                           <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <p><strong>PROYECTO: </strong>{{ $informacion[0]->nombr_proy }}</p>
                                <p><strong>Actividad: </strong> {{ $informacion[0]->nombr_c }}</p>
                                <p><strong>Unidad: </strong> {{ $informacion[0]->nombre }}</p>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <p><strong>N°: </strong>{{ $auxil }}</p>
                                <p><strong>Codigo: </strong> {{ $codigo }}</p>
                                <p><strong>Fecha: </strong> {{ $datf }}</p>
                                <p><strong>Moneda: </strong> Bs.</p>

                            </div>

                           </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Codigo de Item</th>
                                            <th>Descripcion</th>
                                            <th>Unidad</th>
                                            <th>Cantidad</th>
                                            <th>Precio Productivo </th>
                                            <th>Costo Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <th scope="row">MATERIALES</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            @foreach ($totalMat as $totalM)

                                            <th scope="row">{{ $totalM->numtab }}</th>
                                            <td>{{ $totalM->descripmat }}</td>
                                            <td>{{ $totalM->unidmt }}</td>
                                            <td>{{ $totalM->cantidad }}</td>
                                            <td>{{ $totalM->costxunid }}</td>
                                            <td>{{ $totalM->cost_total }}</td>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Materiales</td>
                                            <td>{{ $sumaMt }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <th scope="row">MANO DE OBRA</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach ($totalMab as $totalMb)
                                        <tr>
                                            <th scope="row">{{ $totalMb->numtab }}</th>
                                            <td>{{ $totalMb->descrip }}</td>
                                            <td>{{ $totalMb->unid }}</td>
                                            <td>{{ $totalMb->cantidad }}</td>
                                            <td>{{ $totalMb->precioprod }}</td>
                                            <td>{{ $totalMb->cost }}</td>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Subtotal Mano de Obra</td>
                                            <td>{{ $sumaMb }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <td>Carga Sociales</td>
                                            <td>=(% Del Subtotal Mano de obra)</td>
                                            <td>{{ $carga }}%</td>
                                            <td>{{ $sumaMb }}</td>
                                            <td>{{ $cs }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <td>Impuestos IVA</td>
                                            <td>=(% Del Subtotal Mano de obra)</td>
                                            <td>{{ $iv }}.00%</td>
                                            <td>{{ $ivas }}</td>
                                            <td>{{ $tivas }}</td>
                                        </tr>
                                        <tr>                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Mano de Obra</td>
                                            <td>{{ $total_mano }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <th scope="row">EQUIPO, MAQUINARIA  Y</th>
                                            <th scope="row">HERRAMIENTAS</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach ($totalMaq as $totalMq)
                                        <tr>
                                            <th scope="row">{{ $totalMq->numtab }}</th>
                                            <td>{{ $totalMq->descrpma }}</td>
                                            <td>{{ $totalMq->unidmq }}</td>
                                            <td>{{ $totalMq->cantidhor }}</td>
                                            <td>{{ $totalMq->precioxh }}</td>
                                            <td>{{ $totalMq->total_cos }}</td>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <th scope="row"></th>
                                            <td>Herramientas</td>
                                            <td>=(% Del Total Mano de obra)</td>
                                            <td>{{ $herra }}.00%</td>
                                            <td>{{ $total_mano }}</td>
                                            <td>{{ $herra_mano }}</td>
                                        </tr>
                                        <tr>
                                                        <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Equipo, Maquinaria</td>
                                            <td>{{ $total_maq }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <th scope="row">GASTOS GERENCIALES Y </th>
                                            <th scope="row">ADMINISTRATIVOS</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <td>Gastos Generales</td>
                                            <td>=% DE 1+2+3</td>
                                            <td>{{ $generales }}.00%</td>
                                            <td>{{ $suma_t }}</td>
                                            <td>{{ $suma_total }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Gastos Generales <br> y generales</td>
                                            <td>{{ $suma_total }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <th scope="row">UTILIDAD </th>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td>Utilidad</td>
                                                <td>=% DE 1+2+3+4</td>
                                                <td>{{ $utilid }}.00%</td>
                                                <td>{{ $utilidades }}</td>
                                                <td>{{ $utilidad }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <th scope="row">IMPUESTOS </th>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td>Utilidad</td>
                                                <td>=% DE 1+2+3+4+5</td>
                                                <td>{{ $impue }}%</td>
                                                <td>{{ $impuest }}</td>
                                                <td>{{ $impuestos }}</td>
                                            </tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total de Impuestos </td>
                                            <td>{{ $impuestos }}</td>
                                            </tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Precio Uitario </td>
                                            <td>{{ $total_precio }}</td>
                                            </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script>
                        function imprimirDIV(contenido) {
                            var ficha = document.getElementById(contenido);
                            var ventanaImpresion = window.open(' ', 'popUp');
                            ventanaImpresion.document.write(ficha.innerHTML);
                            ventanaImpresion.document.close();
                            ventanaImpresion.print();
                            ventanaImpresion.close();
                        }
                    </script>

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
