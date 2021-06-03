<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Создать Анкету</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-autofill/css/autoFill.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-keytable/css/keyTable.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-scroller/css/scroller.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-select/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../assets/plugins/glyphicon/css/glyphicon.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/logout/" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">DDGI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->




                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview   menu-open ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p>
                                    Business Book
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview ">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas far fa-user"></i>
                                        <p>
                                            Клиенты
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item menu-open">
                                            <a href="/individual-client/" class="nav-link ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Физические лица</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/legal-client/" class="nav-link ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Юредические лица</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="/form" class="nav-link ">
                                        <i class="far fa-window-restore nav-icon"></i>
                                        <p>Продукты</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-window-restore nav-icon"></i>
                                        <p>Orders</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/references/branch/" class="nav-link ">
                                <i class="nav-icon far fa-building"></i>
                                <p>
                                    Филиалы
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Simple Link
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <form action="GET" id="mainFormKasko">
            <div class="content-wrapper">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                    <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                                    <li class="breadcrumb-item active">Создать Анкету</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="card card-success product-type">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="client-product-form">
                                <div class="form-group clearfix">
                                    <label>Типы клиента</label>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-1" value="individual">
                                                <label for="client-type-radio-1">физ. лицо</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-2" value="legal">
                                                <label for="client-type-radio-2">юр. лицо</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product-id">Вид продукта</label>
                                    <select id="product-id" class="form-control select2" name="product_id" style="width: 100%;">
                                            <option selected="selected">говно</option>
                                            <option selected="selected">говно 2</option>
                                            <option value="1">asdc</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('includes.client')
                    </div>
                    <div class="card-body">
                        <div class="card card-info" id="clone-beneficiary">
                            <div class="card-header">
                                <h3 class="card-title">Заемщик</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="beneficiary-card-body">
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beneficiary-name" class="col-form-label">ФИО заемщика</label>
                                                <input type="text" id="beneficiary-name" name="fio-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beneficiary-address" class="col-form-label">Адрес заемщика</label>
                                                <input type="text" id="beneficiary-address" name="address-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                <input type="text" id="beneficiary-tel" name="tel-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Серия паспорта</label>
                                                <input type="text" id="beneficiary-tel" name="tel-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Номер паспорта</label>
                                                <input type="text" id="beneficiary-tel" name="tel-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                <input type="text" id="beneficiary-schet" name="beneficiary-schet" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                <input type="text" id="beneficiary-inn" name="inn-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                <input type="text" id="beneficiary-mfo" name="mfo-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                                <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                <input type="text" id="beneficiary-okonh" name="okonh-beneficiary" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="dogovor-lizing-num" class="col-form-label">Кредитный договор №</label>
                                                    <input type="text" id="dogovor-lizing-num" name="dogovor-lizing-num" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Срок кредитования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Срок кредитования</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_to" name="insurance_to" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="geographic-zone">Сумма кредита</label>
                                                <input type="text" id="geographic-zone" name="geo-zone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="insurance_from">Срок действия договора страхования</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_to" name="insurance_to" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Безусловная франшиза по риску утрата(гибель) или повреждение ТС</label>
                                                <input type="text" id="geographic-zone" name="geo-zone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="polises">Валюта взаиморасчетов</label>
                                            <select class="form-control polises" id="polises" name="polis-series-0" style="width: 100%;">
                                                <option selected="selected">UZS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Сведени о трансортных средствах</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" onclick="addRow()" class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                <div id="product-fields" class="product-fields" data-field-number="0">
                                    <table class="table table-hover table-head-fixed" id="empTable">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">Номер полиса</th>
                                                <th class="text-nowrap">Год выпуска</th>
                                                <th class="text-nowrap">Марка</th>
                                                <th class="text-nowrap">Модель</th>
                                                <th class="text-nowrap">Гос. номер</th>
                                                <th class="text-nowrap">Номер тех паспорта</th>
                                                <th class="text-nowrap">Номер двигателя</th>
                                                <th class="text-nowrap">Номер кузова</th>
                                                <th class="text-nowrap">Страховая стоимость</th>
                                                <th class="text-nowrap">Страховая сумма</th>
                                                <th class="text-nowrap">Страховая премия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="polis-mark-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis-model-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis-gos-num-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis-teh-passport-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis-num-engine-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis-num-body-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis-payload-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum2" name="polis-places-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum2" name="polis-places-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum-0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum3 insurance_premium-0" name="polis_premium-0">
                                                </td>
                                                <td>
                                                    <input type="button" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" style="text-align: right"><label class="text-bold">Итого</label></td>
                                                <td><input readonly type="text" class="form-control overall-sum" /></td>
                                                <td><input readonly type="text" class="form-control overall-sum4" /></td>
                                                <td><input readonly type="text" class="form-control overall-sum3" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Утрата (Гибель) или повреждение ТС</label>
                                            <div class="form-group">
                                                <label>Страховая сумма</label>
                                                <input type="text" class="form-control formus5">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Риск невозврата кредита</label>
                                            <div class="form-group">
                                                <label>Страховая сумма</label>
                                                <input type="text" class="form-control formus6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Общая cтраховая сумма</label>
                                                <input type="text" class="form-control formus7">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Общая страховая премия</label>
                                                <input type="text" class="form-control formus8">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="payment">Условия оплаты</label>
                                        <select class="form-control polises" id="payment" name="polis-series-0" style="width: 100%;">
                                            <option selected="selected">Единовременно</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="general-product-fields">
                            <div id="product-field-modal-0" class="modal" data-field-number="0">
                                <div class="modal-content" id="product-field-modal-content-0">
                                    <span class="close product-fields-close" id="product-fields-close-0" data-field-number="0">&times;</span>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Перечень дополнительного оборудования</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                                <div id="product-fields-0-1">
                                                    <table class="table table-hover table-head-fixed" id="empTable2">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap">Марка, модель, модификация ТС</th>
                                                                <th>Наименование оборудования</th>
                                                                <th>Серийный номер</th>
                                                                <th>Страховая сумма</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control" name="mark_model"></td>
                                                                <td><input type="text" class="form-control" name="name"></td>
                                                                <td><input type="text" class="form-control" name="series_number"></td>
                                                                <td><input type="text" class="form-control forsum5" name="insurance_sum" id="insurance_sum-0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><label class="text-bold">Итого</label></td>
                                                                <td><input type="text" class="form-control overall-sum5" readonly name="total"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Дополнительное страховое покрытие</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="product-fields-0-2">
                                                <div class="form-group">
                                                    <label>Покрытие террористических актов с ТС </label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" class="form-control terror-tc-0" name="cover_terror_attacks_sum">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="cover_terror_attacks_currency" style="width: 100%;">
                                                                <option selected="selected">UZS</option>
                                                                <option>USD</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Покрытие террористических актов с застрахованными лицами </label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" class="form-control terror-zl-0" name="cover_terror_attacks_insured_sum">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="cover_terror_attacks_insured_currency" style="width: 100%;">
                                                                <option selected="selected">UZS</option>
                                                                <option>USD</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Покрытие расходы по эвакуации</label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" class="form-control evocuation-0" name="coverage_evacuation_cost">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="coverage_evacuation_currency" style="width: 100%;">
                                                            <option selected="selected">UZS</option>
                                                            <option>USD</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Сведени о трансортных средствах</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="product-fields-0-3">
                                                <div class="form-group">
                                                    <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты? </label>
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess1" value="1">
                                                                <label for="radioSuccess1">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess2" value="0">
                                                                <label for="radioSuccess2">Нет</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group other_insurance_info-0" style="display:none">
                                                    <label>Укажите название и адрес страховой организации и номер Полиса</label>
                                                    <input class="form-control" type="text" name="other_insurance_info">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Страховые покрытия по видам опасностей </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="product-fields-0-4">
                                                <div class="form-group">
                                                    <label>Раздел I. Гибель или повреждение транспортного средства</label>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="vehicleDamage" class="r-1-0" id="radioSuccess3" value="1">
                                                                <label for="radioSuccess3">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="vehicle_damage" class="r-1-0" id="radioSuccess4" value="0">
                                                                <label for="radioSuccess4">Нет</label>
                                                            </div>
                                                        </div>
                                                        <div class="row r-1-show-0" style="display: none;">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Сумма</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-1-sum-0" name="one-sum" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Страховая премия</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-1-premia-0" name="one-premia" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Франшиза</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-1-frnshiza" name="one-franshiza" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="product-fields-0-5">
                                                <div class="form-group">
                                                    <label class=>Раздел II. Автогражданская ответственность</label>
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="civil_liability" class="r-2-0" id="radioSuccess5" value="1">
                                                                <label for="radioSuccess5">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="civil_liability" class="r-2-0" id="radioSuccess6" value="0">
                                                                <label for="radioSuccess6">Нет</label>
                                                            </div>
                                                        </div>
                                                        <div class="row r-2-show-0" style="display: none;">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Сумма</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-2-sum-0" name="tho_sum" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Страховая премия</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-2-premia-0" name="two-preim" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="product-fields-0-6">
                                                <div class="form-group">
                                                    <label>Раздел III. Несчастные случаи с Застрахованными лицами</label>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="accidents" class="r-3-0" id="radioSuccess7-0" value="1">
                                                                <label for="radioSuccess7-0">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="accidents" class="r-3-0" id="radioSuccess8-0" value="0">
                                                                <label for="radioSuccess8-0">Нет</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- раздел 3 - да - show -->
                                                <div class="table-responsive p-0 r-3-show-0" style="display: none;">
                                                    <div id="product-fields-0-7">
                                                        <table class="table table-hover table-head-fixed">
                                                            <thead>
                                                                <tr>
                                                                    <th>Объекты страхования </th>
                                                                    <th>Количество водителей /пассажиров</th>
                                                                    <th>Страховая сумма на одного лица</th>
                                                                    <th>Страховая сумма</th>
                                                                    <th>Страховая премия</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><label>Водитель(и)</label></td>
                                                                    <td><input type="number" class="form-control r-3-pass-0" readonly value="1" name="driver_quantity"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text" class="form-control r-3-one-0" name="driver_one_sum">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success" name="driver_currency" style="width: 100%;">
                                                                                    <option selected="selected">UZS</option>
                                                                                    <option>USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number" class="form-control r-3-sum-0" name="driver_total_sum" id="driver_total_sum-0"></td>
                                                                    <td><input type="number" class="form-control r-3-premia-0" name="driver_preim_sum" id="driver_total_sum-0"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Пассажиры</label></td>
                                                                    <td><input type="number" class="form-control r-3-pass-1-0" name="passenger_quantity"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text" class="form-control r-3-one-1-0" name="passenger_one_sum">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success" name="passenger_currency" style="width: 100%;">
                                                                                <option selected="selected">UZS</option>
                                                                                <option>USD</option>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number" class="form-control r-3-sum-1-0" name="passenger_total_sum" id="passenger_total_sum-0"></td>
                                                                    <td><input type="number" class="form-control r-3-premia-1-0" name="passenger_preim_sum" id="passenger_total_sum-0"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label class="text-bold">Общий Лимит</label></td>
                                                                    <td><input type="number" class="form-control r-3-pass-2-0" name="limit_quantity"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text" class="form-control r-3-one-2-0" name="limit_one_sum">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success" name="limit_currency" style="width: 100%;">
                                                                                    <option selected="selected">UZS</option>
                                                                                    <option>USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number" class="form-control r-3-sum-2-0" name="limit_total_sum"></td>
                                                                    <td><input type="number" class="form-control r-3-premia-2-0" name="limit_preim_sum"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><label class="text-bold">Итого</label></td>
                                                                    <td><input type="number" class="form-control r-summ-0"></td>
                                                                    <td><input type="number" class="form-control r-summ-premia-0"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label>Общий лимит ответственности </label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" id="totalLimit-0" class="form-control" name="total_liability_limit-0">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="total_liability_limit_currency-0" style="width: 100%;">
                                                                <option selected="selected">UZS</option>
                                                                <option>USD</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-info polis" id="polis-container">
                                            <div class="card-header">
                                                <h3 class="card-title">Полис</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </button>
                                                </div>
                                            </div>
                                            <div class="card payment">
                                                <div class="card-body">
                                                    <div id="polis-fields-0">
                                                        <div class="row policy">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="polises">Полис</label>
                                                                    <select class="form-control polises" id="polises" name="policy" style="width: 100%;">
                                                                                                <option selected="selected"></option>
                                                                                            </select>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3" style="margin-top: 33px">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">от</span>
                                                                        </div>
                                                                        <input type="date" class="form-control" name="from_date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Ответственный Агент</label>
                                                                    <select class="form-control select2" name="agent" style="width: 100%;">
                                                                                                <option selected="selected">Ф.И.О агента</option>
                                                                                                <option></option>
                                                                                            </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Оплата страховой премии</label>
                                                                    <select class="form-control select2" name="payment" style="width: 100%;">
                                                                                                <option selected="selected">Сум</option>
                                                                                                <option>Доллар</option>
                                                                                                <option>Евро</option>
                                                                                            </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Порядок оплаты</label>
                                                                    <select class="form-control select2" name="payment-order" style="width: 100%;">
                                                                                                <option selected="selected">Сум</option>
                                                                                                <option>Доллар</option>
                                                                                                <option>Евро</option>
                                                                                            </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-info polis" id="Overall">
                                                <div class="card-header">
                                                    <h3 class="card-title">Итого</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                                        <i class="fas fa-minus"></i>
                                                                                    </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Общая страховая сумма</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly id="overall-sum-0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Default box -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Условия оплаты страховой премии</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="payment-terms-form">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-inline justify-content-between">
                                                        <label>Оплата страховой премии в</label>
                                                        <select class="form-control" style="width: 100%; text-align: center">
                                                                            <option selected="selected" name="insurance_premium_currency">UZS</option>
                                                                            <option>USD</option>
                                                                            <option>Евро</option>
                                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group form-inline justify-content-between">
                                                        <label>Порядок оплаты страховой премии</label>
                                                        <select class="form-control payment-schedule" name="payment_term" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                                            <option value="1">Единовременно</option>
                                                            <option value="other">Другое</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="other-payment-schedule" style="display: none">
                                                <div class="form-group">
                                                    <button type="button" onclick="addRow3()" class="btn btn-primary ">Добавить</button>
                                                </div>
                                                <div class="table-responsive p-0 " style="max-height: 300px;">
                                                    <table class="table table-hover table-head-fixed" id="empTable3">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap">Сумма</th>
                                                                <th class="text-nowrap">От</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                                <td><input type="text" class="form-control" name="payment_sum-0-0"></td>
                                                                <td><input type="date" class="form-control" name="payment_from-0-0"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-info" id="clone-beneficiary">
                            <div class="card-header">
                                <h3 class="card-title">Сведения о страховом полисе</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="beneficiary-card-body">
                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="polis-series" class="col-form-label">Серийный номер полиса страхования</label>
                                                <input type="text" id="polis-series" name="polis-series" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso">Ответственное лицо</label>
                                                <select class="form-control polises" id="otvet-litso" name="litso" style="width: 100%;">
                                                    <option selected="selected">Имя Фамилия</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
                </div>
        </form>








        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        </div>
        <style>
            #insurer-modal-button,
            #beneficiary-modal-button {
                width: 100px;
            }
        </style>
        <!-- ./wrapper -->
</body>
<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->

<!-- JQVMap -->
<script src="../../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../assets/plugins/moment/moment.min.js"></script>
<script src="../../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<script src="../../assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>


<script src="../../assets/custom/js/csrftoken.js"></script>
<!-- 
<script>
    insurerId.select2();
    beneficiaryId.select2();
    pledgerId.select2();

    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
            if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
                xhr.setRequestHeader("X-CSRFToken", csrftoken);
            }
        }
    });

    $(document).ready(function() {
        $('.client-type-radio').click(function() {
            formContainer.hide();
            clientType = $(this).val() == 'individual' ? 1 : 2;
            $.ajax({
                url: '/api/get_product_types_by/?client_type=' + clientType,
                method: "GET",
                success: function(data) {
                    if (data.success === true) {
                        productId.empty().append('<option selected="selected"></option>');
                        const products = data.data;
                        const length = products.length;
                        for (let i = 0; i < length; i++) {
                            productId.append(`<option value="${products[i].id}">${products[i].name}</option>`);
                        }
                    }
                },
                error: function() {
                    console.log('error');
                }
            })
        });

        productId.change(function(e) {
            let value = $(this).children("option:selected").val();
            if (value) {
                $.ajax({
                    url: '/api/get_product_types_by/?item_id=' + value,
                    method: "GET",
                    success: function(data) {
                        if (data.success === true) {
                            product = data.data;

                            if (product.has_beneficiary) {
                                beneficiaryCardBody.show();
                            } else {
                                beneficiaryCardBody.hide();
                            }

                            if (product.has_pledger) {
                                pledgerCardBody.show();

                                $.ajax({
                                    url: '/api/client-legal/',
                                    method: "GET",
                                    success: function(data) {
                                        if (data.success === true) {
                                            pledgerId.empty().append('<option selected="selected"></option>');
                                            const clients = data.data;
                                            const length = clients.length;
                                            for (let i = 0; i < length; i++) {
                                                pledgerId.append(`<option value="${clients[i].id}">${clients[i].name}</option>`);
                                            }
                                        }
                                    },
                                    error: function() {
                                        console.log('error');
                                    }
                                });
                            } else {
                                pledgerCardBody.hide();
                            }
                        }
                    },
                    error: function() {
                        console.log('error');
                    }
                })

                let clientType = $("input:radio[name='client_type_radio']:checked").val();
                getPolicyList(clientType === 'individual' ? 1 : 2);

                if (clientType === 'individual') {
                    insurerLegalClientRow.hide();
                    insurerName.prop('disabled', true);
                    insurerOkonh.prop('disabled', true);
                    insurerIndividualClientRow.show();
                    insurerFirstName.prop('disabled', false);
                    insurerLastName.prop('disabled', false);
                    insurerMiddleName.prop('disabled', false);
                    insurerIndividualClient = true;
                } else {
                    insurerLegalClientRow.show();
                    insurerName.prop('disabled', false);
                    insurerOkonh.prop('disabled', false);
                    insurerIndividualClientRow.hide();
                    insurerFirstName.prop('disabled', true);
                    insurerLastName.prop('disabled', true);
                    insurerMiddleName.prop('disabled', true);
                    insurerIndividualClient = false;
                }
                formContainer.show();
            } else {
                formContainer.hide();
            }
        });

        $('.beneficiary-type-radio').click(function() {
            clientType = $("input:radio[name='beneficiary_type_radio']:checked").val();
            console.log(clientType);

            let clientType = $("input:radio[name='beneficiary_type_radio']:checked").val();
            // 

            if (clientType === 'individual') {
                console.log('beneficiary individual');
                beneficiaryLegalClientRow.hide();
                beneficiaryName.prop('disabled', true);
                beneficiaryOkonh.prop('disabled', true);
                beneficiaryIndividualClientRow.show();
                beneficiaryFirstName.prop('disabled', false);
                beneficiaryLastName.prop('disabled', false);
                beneficiaryMiddleName.prop('disabled', false);
                beneficiaryIndividualClient = true;
            } else {
                console.log('beneficiary legal');
                beneficiaryLegalClientRow.show();
                beneficiaryName.prop('disabled', false);
                beneficiaryOkonh.prop('disabled', false);
                beneficiaryIndividualClientRow.hide();
                beneficiaryFirstName.prop('disabled', true);
                beneficiaryLastName.prop('disabled', true);
                beneficiaryMiddleName.prop('disabled', true);
                beneficiaryIndividualClient = false;
            }

            $.ajax({
                url: '/api/client-' + clientType + '/',
                method: "GET",
                success: function(data) {
                    if (data.success === true) {
                        beneficiaryId.empty().append('<option selected="selected"></option>');
                        const clients = data.result;
                        const length = clients.length;
                        for (let i = 0; i < length; i++) {
                            beneficiaryId.append(`<option value="${clients[i].id}">${clients[i].name}</option>`);
                        }
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
        });

        insurerModalButton.click(function(e) {
            insurerModal.show();
        });

        beneficiaryModalButton.click(function(e) {
            beneficiaryModal.show();
        });

        pledgerModalButton.click(function(e) {
            pledgerModal.show();
        });

        insurerClose.click(function(e) {
            insurerModal.hide();
        });

        beneficiaryClose.click(function(e) {
            beneficiaryModal.hide();
        });

        pledgerClose.click(function(e) {
            pledgerModal.hide();
        });

        // $(window).click(function(event) {
        //     let fieldNumber;
        //     if (event.target == insurerModal[0]) {
        //         insurerModal.hide();
        //     } else if (event.target == beneficiaryModal[0]) {
        //         beneficiaryModal.hide();
        //     } else if (event.target == pledgerModal[0]) {
        //         pledgerModal.hide();
        //     } else {
        //         let modal = $('#product-fields-' + (fieldNumber = event.target.data('field-number')));
        //         if (modal.length && target.event == modal[0]) {
        //             modal.hide();
        //         }
        //     }
        // });

        formSaveButton.click(function(e) {
            e.preventDefault();

            let productFieldsForm = $('#product-fields');

            let forms = {};
            let params = {};
            forms.csrfmiddlewaretoken = csrftoken;
            forms.action = 'create';
            forms.client_type = clientType;
            forms.insurer_id = insurerId.children("option:selected").val();
            forms.beneficiary_id = beneficiaryId.children("option:selected").val();
            forms.pledger_id = pledgerId.children("option:selected").val();
            let serializedForm = clientProductForm.serializeArray();
            for (let i = 0; i < serializedForm.length; i++) {
                forms[serializedForm[i]['name']] = serializedForm[i]['value'];
            }

            params = {};
            serializedForm = paymentTermsForm.serializeArray();
            for (let i = 0; i < serializedForm.length; i++) {
                params[serializedForm[i]['name']] = serializedForm[i]['value'];
            }
            forms.payment_terms = params;

            params = {};
            serializedForm = anketaFieldsForm.serializeArray();
            for (let i = 0; i < serializedForm.length; i++) {
                forms[serializedForm[i]['name']] = serializedForm[i]['value'];
            }
            forms.payment_terms = params;

            params = {};
            let count = 0;
            let field;
            let productFields1 = [];
            let productFields2 = [];
            let polisFields = {};
            let productExists = false;
            for (let i = 0; i < productFieldNumber + 1; i++) {
                field = null;

                for (let j = 1; j < 8; j++) {
                    if ((field = $(`#product-fields-${i}-${j}`)).length) {
                        serializedForm = field.serializeArray();
                        for (let k = 0; k < serializedForm.length; k++) {
                            params[serializedForm[k]['name']] = serializedForm[k]['value'];
                        }

                    }
                    productFields2[j] = params;
                    params = {};
                }
                params = {};

                if ((polisFields = $(`#polis-fields-${i}`)).length) {
                    field = $(`#product-fields`);
                    serializedForm = field.serializeArray();
                    params.mark_model = field.find(`input[name=mark_model-${i}]`).val();
                    params.release_year = field.find(`input[name=release_year-${i}]`).val();
                    params.country_number = field.find(`input[name=country_number-${i}]`).val();
                    params.tech_passport_number = field.find(`input[name=tech_passport_number-${i}]`).val();
                    params.engine_number = field.find(`input[name=engine_number-${i}]`).val();
                    params.carcase_number = field.find(`input[name=carcase_number-${i}]`).val();
                    params.lifting_capacity = field.find(`input[name=lifting_capacity-${i}]`).val();
                    params.number_of_seats = field.find(`input[name=number_of_seats-${i}]`).val();
                    params.insurance_cost = field.find(`input[name=insurance_cost-${i}]`).val();
                    params.insurance_sum = field.find(`input[name=insurance_sum-${i}]`).val();
                    params.insurance_premium = field.find(`input[name=insurance_premium-${i}]`).val();
                    console.log(params);
                    productFields2[0] = params;
                    params = {};

                    serializedForm = polisFields.serializeArray();
                    for (let j = 0; j < serializedForm.length; j++) {
                        params[serializedForm[j]['name']] = serializedForm[j]['value'];
                    }
                    productFields2[8] = params;
                    params = {};
                    productExists = true;
                } else {
                    productExists = false;
                }

                productFields1[count++] = productFields2;
                productFields2 = [];
            }
            forms.product_fields = productFields1;

            $.ajax({
                url: '/api/klassss/',
                data: JSON.stringify(forms),
                processData: false,
                contentType: 'application/json',
                dataType: 'json',
                type: "GET",
                success: function(data) {
                    if (data.success === true) {
                        console.log(data);
                        window.location.replace('/references/klass/');
                    }
                }
            });
        });
    });

    function getPolicyList(clientType) {
        polises.empty().append('<option selected="selected">Полисы</option>');
        $.ajax({
            url: '/api/get_product_type_list/?client-type=' + clientType,
            processData: false,
            contentType: 'application/json',
            dataType: 'json',
            type: "GET",
            success: function(data) {
                if (data.success === true) {
                    console.log(data);
                    polises.append(`<option value="${data.id}">${data.code} - ${data.name}</option`);
                }
            }
        });
    }
</script> -->
<script>
    var num1 = $('.forsum2').val();
    var num2 = $('.forsum3').val();
    var num3 = $('.forsum4').val();
    var num4 = $('.forsum5').val();
    var num5 = $('.forsum6').val();
    var num6 = $('.forsum7').val();
    var num7 = $('.forsum8').val();

    $(document).on('keyup', function() {
        var strSumm = num2 + num4 + sum5;
        var strPreim = num3;
    });
</script>

</html>