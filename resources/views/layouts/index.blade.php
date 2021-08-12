<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Создать Анкету</title>

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />            <!-- Ionicons -->
        <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" /><!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />                      <!-- iCheck -->
        <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css" />                                          <!-- JQVMap -->
        <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css" />                                              <!-- Theme style -->
        <link rel="stylesheet" href="/assets/dist/css/adminlte.css" />
        <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />                <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css" />                            <!-- Daterange picker -->
        <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.css" />                                  <!-- summernote -->
        <link rel="stylesheet" href="/assets/plugins/datatables-autofill/css/autoFill.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-keytable/css/keyTable.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-scroller/css/scroller.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/datatables-select/css/select.bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css" />                                    <!-- Select2 -->
        <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
        <link rel="stylesheet" href="/assets/plugins/glyphicon/css/glyphicon.css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />       <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="/assets/plugins/bootstrap-fileinput/css/fileinput.min.css" />

        @yield('css')

        <style type="text/css">
            :required {
                border-bottom-color: red;
            }
            .form-control {
                min-width: 100px;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('layouts._navbar')

            @include('layouts._main_sidebar')

            <div id="ajaxData">
                @yield('content')
            </div>
        </div>
    </body>

    <script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>                                             <!-- jQuery -->
    <script type="text/javascript" src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>                                       <!-- jQuery UI 1.11.4 -->

    <script type="text/javascript">                                                                                                 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    @yield('scripts_vars')

    <script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>                             <!-- Bootstrap 4 -->
    <script type="text/javascript" src="/assets/plugins/chart.js/Chart.min.js"></script>                                            <!-- ChartJS -->
    <script type="text/javascript" src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>                                        <!-- JQVMap -->
    <script type="text/javascript" src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>                                   <!-- jQuery Knob Chart -->
    <script type="text/javascript" src="/assets/plugins/moment/moment.min.js"></script>                                             <!-- daterangepicker -->
    <script type="text/javascript" src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>    <!-- Tempusdominus Bootstrap 4 -->
    <script type="text/javascript" src="/assets/plugins/summernote/summernote-bs4.min.js"></script>                                 <!-- Summernote -->
    <script type="text/javascript" src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>             <!-- overlayScrollbars -->
    <script type="text/javascript" src="/assets/dist/js/adminlte.min.js"></script>                                                  <!-- AdminLTE App -->
    <script type="text/javascript" src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/assets/dist/js/demo.js"></script>                                                          <!-- AdminLTE for demo purposes -->
    <script type="text/javascript" src="/assets/custom/js/csrftoken.js"></script>
    <script type="text/javascript" src="/assets/custom/js/formjs/product-fields.add.js"></script>

    <script type="text/javascript">
        const ddgi_routes = {
            construction_participant_row: '{{route("get_construction_participant_for_table")}}',
            notary_employee_row: '{{route("get_notary_employee_for_table")}}',
            policies: '{{route("get_policies")}}',
            policy_row: '{{route("get_policy_for_table")}}',
            policy_employee: '{{route("get_policy_employee")}}',
            property_row: '{{route("get_property_for_table")}}',
            tranche_row: '{{route("get_tranche_for_table")}}',
            type_specifications: '{{route("get_type_specifications")}}'
        };
    </script>
    <script type="text/javascript" src="/assets/custom/js/form/form-actions.js"></script>                                           <!-- TODO: скрипты на чистом JS для обработки формы audit -->
    <script type="text/javascript" src="/assets/app.js"></script>                                                                   <!-- TODO: скрипты на чистом JS проекта -->

    <script type="text/javascript" src="/assets/plugins/bootstrap-fileinput/js/plugins/piexif.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap-fileinput/js/plugins/sortable.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap-fileinput/themes/fa/theme.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap-fileinput/js/locales/LANG.js"></script>

    <script type="text/javascript" src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>                      <!-- Bootstrap Switch -->

    <script type="text/javascript">
        $('input[data-bootstrap-switch]').each(function () {
            $(this).bootstrapSwitch();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                url: '{{route("currencies")}}',
                method: 'GET',
                type: 'json',
                success: function (data) {
                    const products = data;
                    const length = products.length;

                    for (let i = 0; i < length; i++) {
                        $('#walletNames').append('<option value="' + products[i].Ccy + '">' + products[i].Ccy + '</option>');
                    }
                },
                error: function () {
                    console.log('error');
                }
            });
        });
    </script>

    @yield('scripts')
</html>

