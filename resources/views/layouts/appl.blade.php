<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('Svc.System TDPA') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('plantillas/img/syste.jpg') }}">
    <link rel="icon" type="image/png" href="{{ asset('plantillas/img/system.jpg') }}">

      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="{{ asset('proyect') }}/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        @stack('links')
    <link rel="stylesheet" href="{{ asset('proyect') }}/dist/css/theme.min.css">
    <script src="{{ asset('proyect') }}/src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        @include('layouts.page_templates.authh')

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('proyect') }}/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="{{ asset('proyect') }}/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{ asset('proyect') }}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('proyect') }}/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('proyect') }}/plugins/screenfull/dist/screenfull.js"></script>
        <script src="{{ asset('proyect') }}/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="{{ asset('proyect') }}/plugins/moment/moment.js"></script>
        @stack('scripts')
        <script src="{{ asset('proyect') }}/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="{{ asset('proyect') }}/dist/js/theme.min.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        {{-- <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script> --}}
        <script>
            //    console.log(user);
                    $(document).ready(function(){
                        const user_rol = {!! json_encode(session()->get('rol')->first()) !!};
                        //(ocultarMostrar)();
                        if(user_rol=="Supremo"){
                            $("#depst0").show("slow");
                            $("#depst1").show("slow");
                            $("#depst2").show("slow");
                            $("#depst3").show("slow");
                            $("#depst4").show("slow");
                            $("#depst5").show("slow");
                            $("#depst6").show("slow");
                            $("#depst7").show("slow");
                            $("#depst8").show("slow");
                            $("#depst9").show("slow");
                            $("#depst10").show("slow");
                            $("#depst11").show("slow");
                            $("#depst12").show("slow");
                            $("#depst13").show("slow");
                            $("#depst14").show("slow");
                            $("#depst15").show("slow");
                            $("#dep").show("slow");
                        }
                        if(user_rol=="Administrador"){
                            $("#depst0").show("slow");
                            $("#depst1").show("slow");
                            $("#depst3").show("slow");
                            $("#depst4").show("slow");
                            $("#depst5").show("slow");
                            $("#depst6").show("slow");
                            $("#depst7").show("slow");
                            $("#depst8").show("slow");
                            $("#depst9").show("slow");
                            $("#depst10").show("slow");
                            $("#depst11").show("slow");
                            $("#depst12").show("slow");
                            $("#depst13").show("slow");
                            $("#depst14").show("slow");
                            $("#depst15").show("slow");
                            $("#dep").show("slow");
                            }
                        if(user_rol=="Personal"){
                            $("#depst1").show("slow");
                            $("#depst2").show("slow");
                            $("#depst3").show("slow");
                            $("#depst4").show("slow");
                            $("#depst5").show("slow");
                            $("#depst6").show("slow");
                            $("#depst7").show("slow");
                            $("#depst8").show("slow");
                            $("#depst9").show("slow");
                            $("#depst10").show("slow");
                            $("#depst11").show("slow");
                            $("#depst12").show("slow");
                            $("#depst13").show("slow");
                            $("#depst14").show("slow");
                            $("#depst15").show("slow");
                            }
                        if(user_rol=="Usuario"){
                            $("#depst6").show("slow");
                            $("#depst8").show("slow");
                            $("#depst10").show("slow");
                            $("#depst11").show("slow");
                            $("#depst14").show("slow");

                        }
                    });


           </script>
          </body>
</html>
