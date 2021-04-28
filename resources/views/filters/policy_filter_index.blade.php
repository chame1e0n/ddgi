@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div id="ajaxData">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Список договоров</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Главная</a></li>
                                <li class="breadcrumb-item active">Список договоров</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-success" href="http://wecloud.rocks/all_products/create">Создать</a>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-success" href="http://wecloud.rocks/all_products/create">Обновить</a>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-success" href="http://wecloud.rocks/all_products/create">Export</a>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-success" href="http://wecloud.rocks/all_products/create">Import</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


                <div class="card card-success product-type">
                    <div class="card-header">
                        <h3 class="card-title">Фильтры</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('all_product.filter') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_filial" class="col-form-label">Филиал</label>
                                        <select id="filter_filial" class="form-control select2" name="filter_filial">
                                            @foreach($branches as $branch) <option value="{{$branch->id}}" selected="selected">{{$branch->name}}</option> @endforeach
                                        </select>
                                    </div>
                                </div>+
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_class" class="col-form-label">Класс</label>
                                        <select id="filter_class" class="form-control select2" name="filter_class">
                                            <option value="1" selected="selected">говно</option>
                                            <option value="2" selected="selected">говно 2</option>
                                            <option value="3">asdc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_vid" class="col-form-label">Вид продукта</label>
                                        <select id="filter_vid" class="form-control select2" name="filter_vid">
                                            <option value="1" selected="selected">говно</option>
                                            <option value="2" selected="selected">говно 2</option>
                                            <option value="3">asdc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_data" class="col-form-label">Дата договора</label>
                                        <input type="date" id="filter_data" name="filter_data" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter_number_ot" class="col-form-label">Номер полиса</label>
                                    <div class="input-group">
                                        <input type="text" id="filter_number_ot" class="form-control"
                                               name="filter_number_ot">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="filter_sings"
                                                    style="width: 100%;">
                                                <option value="=" selected="selected">=</option>
                                                <option value="<"><</option>
                                                <option value="<="><=</option>
                                                <option value=">">></option>
                                                <option value=">=">>=</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter_number_do" class="col-form-label">Номер полиса до</label>
                                    <div class="input-group">
                                        <input type="text" id="filter_number_do" name="filter_number_do"
                                               class="form-control">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="filter_sings"
                                                    style="width: 100%;">
                                                <option selected="selected">=</option>
                                                <option><</option>
                                                <option><=</option>
                                                <option>></option>
                                                <option>>=</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter_series_ot" class="col-form-label">Серия полиса</label>
                                    <div class="input-group">
                                        <input type="text" id="filter_series_ot" name="filter_series_ot"
                                               class="form-control">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="filter_sings"
                                                    style="width: 100%;">
                                                <option selected="selected">=</option>
                                                <option><</option>
                                                <option><=</option>
                                                <option>></option>
                                                <option>>=</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter_series_do" class="col-form-label">Серия полиса</label>
                                    <div class="input-group">
                                        <input type="text" id="filter_series_do" name="filter_series_do"
                                               class="form-control">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="filter_sings"
                                                    style="width: 100%;">
                                                <option selected="selected">=</option>
                                                <option><</option>
                                                <option><=</option>
                                                <option>></option>
                                                <option>>=</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_data_ot" class="col-form-label">Период от</label>
                                        <input type="date" id="filter_data_ot" name="filter_data_ot"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_data_do" class="col-form-label">Период до</label>
                                        <input type="date" id="filter_data_do" name="filter_data_do"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_form" class="col-form-label">Форма лица</label>
                                        <select id="filter_form" class="form-control select2" name="filter_form">
                                            <option selected="selected">Физ. лицо</option>
                                            <option>Юр. лицо</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_agent" class="col-form-label">Агент</label>
                                        <select id="filter_agent" class="form-control select2" name="filter_agent">
                                            @foreach($agents as $agent)
                                            <option value="{{$agent->id}}" selected="selected">{{$agent->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_summ" class="col-form-label">Страховая сумма</label>
                                        <input type="text" id="filter_summ" name="filter_summ" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_preim" class="col-form-label">Страховая премия</label>
                                        <input type="text" id="filter_preim" name="filter_preim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_kuda" class="col-form-label">Куда поступили деньги</label>
                                        <select id="filter_kuda" class="form-control select2" name="filter_kuda">
                                            <option selected="selected">Основной счет</option>
                                            <option>Вторичный счет</option>
                                            <option>Агент</option>
                                            <option>Электронная коммерция</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_transh" class="col-form-label">Транш</label>
                                        <select id="filter_transh" class="form-control select2" name="filter_transh">
                                            <option value="transh" selected="selected">Да</option>
                                            <option value="1">Нет</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter_name_strah" class="col-form-label">Страхователь</label>
                                        <input type="text" id="filter_name_strah" name="filter_name_strah"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter_name_vigod"
                                               class="col-form-label">Выгодоприобритатель</label>
                                        <input type="text" id="filter_name_vigod" name="filter_name_vigod"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button style="margin-top: 38px;" class="btn btn-success" type="submit">Найти</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                {{--                        @include('layouts._success_or_error')--}}
                                <table id="example1" class="table table-bordered table-striped text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Дата договора</th>
                                        <th>Номер договора</th>
                                        <th>Страхователь</th>
                                        <th>Выгодоприобретатель</th>
                                        <th>Залогодатель</th>
                                        <th>Страховая сумма</th>
                                        <th>Страховая премия</th>
                                        <th>Начало договора</th>
                                        <th>Конец договора</th>
                                        <th>Серия полиса</th>
                                        <th>Тариф</th>
                                        <th>Филиал</th>
                                        <th>Агент</th>
                                        <th>Куда поступили деньги</th>
                                        <th>Ожидаемая премия</th>
                                        <th>Комментарий</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($all_products as $product)
                                        <tr>
                                            <td>@if(!empty($product->allProductInfo)){{$product->allProductInfo->policy_insurance_from}}@endif</td>
                                            <td>@if(!empty($product->dogovor_num)){{$product->dogovor_num}}@endif</td>
                                            <td>@if(!empty($product->policyHolder->FIO)){{$product->policyHolder->FIO}}@endif</td>
                                            <td>@if(!empty($product->policyBeneficiaries->FIO)){{$product->policyBeneficiaries->FIO}}@endif</td>
                                            <td>@if(!empty($product->zaemshik->z_fio)){{$product->zaemshik->z_fio}}@endif</td>
                                            <td>@if(!empty($product->insurance_sum)){{$product->insurance_sum}}@endif</td>
                                            <td>@if(!empty($product->insurance_bonus)){{$product->insurance_bonus}}@endif</td>
                                            <td>@if(!empty($product->insurance_from)){{$product->insurance_from}}@endif</td>
                                            <td>@if(!empty($product->insurance_to)){{$product->insurance_to}}@endif</td>
                                            <td>@if(!empty($product->polis_series)){{$product->polis_series}}@endif</td>
                                            <td>@if(!empty($product->tarif_other)){{$product->tarif_other}}@endif</td>
                                            <td>@if(!empty($product->branches->name)){{$product->branches->name}}@endif</td>
                                            <td>@if(!empty($product->allProductInfo->otvet_litso)){{$product->allProductInfo->otvet_litso}}@endif</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {{--                        {!! $policyFlow->links() !!}--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('scripts')
    <script src="/assets/custom/js/form/form-actions.js"></script>
@endsection