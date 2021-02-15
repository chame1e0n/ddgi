<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Создать Анкету</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-autofill/css/autoFill.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-keytable/css/keyTable.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-scroller/css/scroller.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-select/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/glyphicon/css/glyphicon.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/assets/plugins/bootstrap-fileinput/css/fileinput.min.css">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts._navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts._main_sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div id="ajaxData">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

</body>
<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
@yield('scripts_vars')
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>

<script src="/assets/custom/js/csrftoken.js"></script>
<script src="/assets/custom/js/form/variables.js"></script>
<script src="/assets/custom/js/form/add-clients.js"></script>
<script src="/assets/custom/js/form/product-fields.js"></script>
<script src="/assets/custom/js/form/product-fields.add.js"></script>
<script src="/assets/plugins/bootstrap-fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="/assets/plugins/bootstrap-fileinput/themes/fa/theme.min.js"></script>
<script src="/assets/plugins/bootstrap-fileinput/js/locales/LANG.js"></script>
<script>
    // let appendData = $("#ajaxData");
    // $('#banki').click(function(event){
    //     event.preventDefault();
    //     $.ajax({
    //         url:'/spravochniki/bank',
    //         method:'GET',
    //         success:function(response){
    //             appendData.html(response)
    //         },
    //         errors:function(error){
    //             console.log(error)
    //         }
    //     })
    // });
</script>
@yield('scripts')
</html>

