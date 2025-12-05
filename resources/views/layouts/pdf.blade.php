<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>{{ $title }} </title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('assets/src/css/vendors_css.css') }}">
	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('assets/src/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/src/css/skin_color.css') }}">
    
</head>

<body>
    <section>
        @yield('content')
    </section>

	<!-- Vendor JS -->
	<script src="{{ asset('assets/src/js/vendors.min.js') }}"></script>
	<script src="{{ asset('assets/src/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/src/js/template.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/src/js/pages/data-table.js') }}"></script>
</body>
</html>
