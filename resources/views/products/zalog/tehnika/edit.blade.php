@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-tehnika.update', $page->id)}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
        @method('PUT')
        @csrf
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
                @include('includes.messages')

                @include('includes.contract')

                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Залогодатель</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-name" class="col-form-label">Наименования
                                                залогодателя</label>
                                            <input type="text" id="fio_zalog" name="fio_zalog"
                                                   class="form-control
                                                    @if($errors->has('fio_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->fio}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес
                                                залогодателя</label>
                                            <input type="text" id="beneficiary-address"
                                                   name="address_zalog" class="form-control
                                                    @if($errors->has('address_zalog'))
                                                is-invalid
                                                    @endif" value="{{$page->zalogodatel->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="phone_zalog" name="phone_zalog"
                                                   class="form-control
                                                    @if($errors->has('phone_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                счет</label>
                                            <input type="text" id="checking_account_zalog"
                                                   name="checking_account_zalog"
                                                   class="form-control
                                                    @if($errors->has('checking_account_zalog'))
                                                       is-invalid
                                                        @endif"
                                                   value="{{$page->zalogodatel->checking_account}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="inn_zalog" name="inn_zalog"
                                                   class="form-control
                                                    @if($errors->has('inn_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->inn}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="mfo_zalog" name="mfo_zalog"
                                                   class="form-control
                                                    @if($errors->has('mfo_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->mfo}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-bank" class="col-form-label">Банк</label>
                                            <select @if($errors->has('bank_id_zalog'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="bank_id_zalog" name="bank_id_zalog"
                                                    style="width: 100%;" required>
                                                <option>Выберите банк</option>
                                                @foreach(\App\Model\Bank::all() as $bank)
                                                    @if($page->zalogodatel->bank_id == $bank->id)
                                                        <option selected
                                                                value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @else
                                                        <option
                                                            value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="oked_zalog" name="oked_zalog"
                                                   class="form-control
                                                    @if($errors->has('oked_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->oked}}">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dogovor_num_zalog" class="col-form-label">Номер договора залога</label>
                                    <input type="text" id="zalog_unique_number" name="zalog_unique_number"
                                           value="{{$page->zalog_unique_number}}"
                                           class="form-control @if($errors->has('zalog_unique_number')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date_zalog" class="col-form-label">Период договора залога</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input id="dogovor_zalog_date_from" name="dogovor_zalog_date_from" type="date"
                                           value="{{$page->dogovor_zalog_date_from}}"
                                           class="form-control @if($errors->has('dogovor_zalog_date_from')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date_zalog" class="col-form-label">Период договора залога</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">до</span>
                                    </div>
                                    <input id="dogovor_zalog_date_to" name="dogovor_zalog_date_to" type="date"
                                           value="{{$page->dogovor_zalog_date_to}}"
                                           class="form-control @if($errors->has('dogovor_zalog_date_to')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dogovor_num" class="col-form-label">Номер договора</label>
                                    <input type="text" id="unique_number" name="unique_number" class="form-control @if($errors->has('unique_number')) is-invalid @endif"
                                           value="{{$page->unique_number}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date" class="col-form-label">Период договора</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input id="dogovor_date_from" name="dogovor_date_from" type="date"
                                           class="form-control @if($errors->has('dogovor_date_from')) is-invalid @endif" value="{{$page->dogovor_date_from}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date" class="col-form-label">Период договора</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">до</span>
                                    </div>
                                    <input id="dogovor_date_to" name="dogovor_date_to" type="date" class="form-control @if($errors->has('dogovor_date_to')) is-invalid @endif"
                                           value="{{$page->dogovor_date_to}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="period_strah_from" class="col-form-label">Период страхования</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>
                                        <input id="object_from_date" name="object_from_date" type="date"
                                               class="form-control @if($errors->has('object_from_date')) is-invalid @endif" value="{{$page->object_from_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="period_strah_to" class="col-form-label">Период страхования</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>
                                        <input id="object_to_date" name="object_to_date" type="date"
                                               class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{$page->object_to_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="loan_reason" class="col-form-label">Основание для оценки</label>
                                    <input id="loan_reason" name="loan_reason" type="text"
                                           class="form-control @if($errors->has('loan_reason')) is-invalid @endif" value="{{$page->loan_reason}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведения о имуществе</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" id="addProperty" class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" class="product-fields" data-field-number="0">
                                <table data-info-table="" class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Наименование Имущества</th>
                                        <th class="text-nowrap">Местонахождения имущества</th>
                                        <th class="text-nowrap">Дата выдачи</th>
                                        <th class="text-nowrap">Кол-во</th>
                                        <th class="text-nowrap">Единицы измерения</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($page->infos as $info)
                                        <tr id="{{$info->id}}">
                                            <td>
                                                <input required type="text" class="@if($errors->has('name_property.'.$loop->index)) is-invalid @endif form-control" name="name_property[]"
                                                       value="{{$info->name_property}}">
                                            </td>
                                            <td>
                                                <input required type="text" class="@if($errors->has('place_property.'.$loop->index)) is-invalid @endif form-control" name="place_property[]"
                                                       value="{{$info->place_property}}">
                                            </td>
                                            <td>
                                                <input required type="date" class="form-control @if($errors->has('date_of_issue_property.'.$loop->index)) is-invalid @endif "
                                                       name="date_of_issue_property[]"
                                                       value="{{$info->date_of_issue_property}}">
                                            </td>
                                            <td>
                                                <input required type="text" class="form-control @if($errors->has('count_property.'.$loop->index)) is-invalid @endif " name="count_property[]"
                                                       value="{{$info->count_property}}">
                                            </td>
                                            <td>
                                                <select class="form-control polises @if($errors->has('units_property.'.$loop->index)) is-invalid @endif " id="polises"
                                                        name="units_property[]" style="width: 100%;">
                                                    <option selected="selected" value="1">Кв.м</option>
                                                    <option value="2">Кв.см</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input required type="text" data-field="value" class="form-control @if($errors->has('insurance_cost.'.$loop->index)) is-invalid @endif "
                                                       name="insurance_cost[]" value="{{$info->insurance_cost}}">
                                            </td>
                                            <td>
                                                <input required type="text" data-field="sum" class="form-control @if($errors->has('insurance_sum.'.$loop->index)) is-invalid @endif "
                                                       name="insurance_sum[]" value="{{$info->insurance_sum}}">
                                            </td>
                                            <td>
                                                <input required type="text" data-field="premiya" class="form-control @if($errors->has('insurance_premium.'.$loop->index)) is-invalid @endif "
                                                       name="insurance_premium[]" value="{{$info->insurance_premium}}">
                                            </td>
                                            <td>
                                                <input onclick="removeAndCalc({{$info->id}})" type="button"
                                                       value="Удалить" data-action="delete" class="btn btn-warning">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="5" style="text-align: right"><label class="text-bold">Итого</label>
                                        </td>
                                        <td><input required readonly data-insurance-stoimost type="text"
                                                   class="form-control overall-sum"/></td>
                                        <td><input required readonly data-insurance-sum type="text"
                                                   class="form-control overall-sum4"/></td>
                                        <td><input required readonly data-insurance-award type="text"
                                                   class="form-control overall-sum3"/></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие пожарной сигнализации и средств пожаротушения</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')"
                                                    type="radio" class="other_insurance-0" name="fire_alarm_file_check"
                                                    @if($page->fire_alarm_file) checked @endif id="radioSuccess1" @if($page->fire_alarm_file == null)  value="1"
                                                    @else   value="2" @endif>
                                                <label for="radioSuccess1">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)"
                                                    type="radio" class="other_insurance-0" name="fire_alarm_file_check"
                                                    @if($page->fire_alarm_file == null) checked
                                                    @endif id="radioSuccess2" value="0">
                                                <label for="radioSuccess2">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess2="" @if(!$page->fire_alarm_file) style="display: none;"
                                     @endif class="form-group other_insurance_info-0">
                                    <label>Прикрепите сертификат</label>
                                    <input class="form-control" type="file" name="fire_alarm_file" value="{{$page->fire_alarm_file}}">
                                    @if($page->fire_alarm_file)  <a
                                        href="/storage/{{$page->fire_alarm_file}}">Скачать</a> @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие охранной сигнализации и средств защиты/охраны</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')"
                                                    type="radio" class="other_insurance-0"
                                                    @if($page->security_file) checked @endif name="security_file_check"
                                                    id="radioSuccess1-0" @if($page->security_file == null) value="1"
                                                    @else   value="2" @endif>
                                                <label for="radioSuccess1-0">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)"
                                                    type="radio" class="other_insurance-0"
                                                    @if($page->security_file == null) checked
                                                    @endif name="security_file_check" id="radioSuccess2-0" value="0">
                                                <label for="radioSuccess2-0">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess1="" @if(!$page->security_file) style="display: none;"
                                     @endif class="form-group other_insurance_info">
                                    <label>Прикрепите сертификат</label>
                                    <input class="form-control" type="file" name="security_file" value="{{$page->security_file}}">
                                    @if($page->fire_alarm_file)<a
                                        href="/storage/{{$page->security_file}}">Скачать</a> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Условия оплаты страховой премии</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="payment-terms-form">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input type="text" id="all-summ" name="insurance_sum_prod" class="form-control"
                                               value="{{$page->insurance_sum}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" class="form-control"
                                               value="{{$page->insurance_bonus}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" class="form-control"
                                               value="{{$page->franchise}}">
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
        </div>
    </form>

@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
