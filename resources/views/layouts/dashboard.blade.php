<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset(iconsLoad()['favicon']) }}">

    <title>{{ $title }}</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('assets/src/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('assets/src/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/src/css/skin_color.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" integrity="sha512-3tCem0NQxvvXP8EDNmZlL59PXSvNQOpnt1uxpT4sB8JepAC/lyr1uN8djpHflzy8WtwUtCXlEtOop2UB5d5zGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://kit.fontawesome.com/111032cd6f.js" crossorigin="anonymous"></script>

    <!-- Toast notification -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link href="{{ asset('css/mobiscroll.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/mobiscroll.js') }}"></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Personnal style -->
    @stack('css')

</head>

<body class="hold-transition light-skin sidebar-mini theme-info fixed bg-s">

    <div class="wrapper">
        <!-- Header menu & header navbar -->
        @include('partials._header')
        <!-- And Header menu & header navbar -->

        <!-- Dashbord Menu -->
        @include('partials._menu')
        <!-- And Dashbord Menu -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-s">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <div class="d-inline-block align-items-left ">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><b href="#"><i class="fa-solid fa-home"></i></b></li>
                                        <li class="breadcrumb-item active fs-5" aria-current="page">{{ $title }}
                                        <span class="text-primary"> </span></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
            </div>
        </div>
        <!-- And Content Wrapper. Contains page content -->

        <!-- Start Page-Footer -->
        @include('partials._footer')
        <!-- End Page-Footer -->

    </div>
    <style>
        .bg-s {
            background-image: url("{{ asset('assets/images/bg.jpg') }}");
        }
        .simplemenu {
            float: right;
        }
        .danger {
            color: red;
        }
    </style>


    <!-- Vendor JS -->
    <script src="{{ asset('assets/vendor_components/jquery-ui/jquery-ui.min.js ') }}"></script>
    <script src="{{ asset('assets/src/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/src/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/dropzone/dropzone.js') }}"></script>
    <!-- App -->
    <script src="{{ asset('assets/src/js/template.js') }}"></script>
    {{-- <script src="{{ asset('assets/src/js/pages/dashboard.js') }}"></script> --}}
    <script src="{{ asset('assets/src/js/pages/data-table.js') }}"></script>
    {{-- Form script  --}}
    <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
	<script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>

    <script src="{{ asset('assets/src/js/pages/advanced-form-element.js') }}"></script>

    <script src="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>

    <script src="{{ asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- Personnal script -->
    <script src="{{ asset('assets/src/js/pages/calendar.js') }}"></script>

    @stack('js')


    <!-- Toast script -->
</body>
