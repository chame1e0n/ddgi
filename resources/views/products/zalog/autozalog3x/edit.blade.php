@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-autozalog3x.update', $page->id)}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-name" class="col-form-label">Наименование
                                    страхователя</label>
                                <input required type="text" id="insurer-name" name="fio_insurer"
                                       value="{{$page->policyHolders->FIO}}" @if($errors->has('fio_insurer'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                       @endif
                                       required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-address" class="col-form-label">Юр адрес
                                    страхователя</label>
                                <input required value="{{$page->policyHolders->address}}" type="text"
                                       id="insurer-address"
                                       name="address_insurer"
                                       @if($errors->has('address_insurer'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                       @endif required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-tel" class="col-form-label">Телефон</label>
                                <input required value="{{$page->policyHolders->phone_number}}" type="text"
                                       id="insurer-tel"
                                       name="tel_insurer"
                                       @if($errors->has('tel_insurer'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                    @endif >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                <input required value="{{$page->policyHolders->checking_account}}" type="text"
                                       id="insurer-schet"
                                       name="checking_account"
                                       @if($errors->has('checking_account'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                    @endif >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-inn" class="col-form-label">ИНН</label>
                                <input required value="{{$page->policyHolders->inn}}" type="text"
                                       id="insurer-inn"
                                       name="inn_insurer"
                                       @if($errors->has('inn_insurer'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                    @endif
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-mfo" class="col-form-label">МФО</label>
                                <input required value="{{$page->policyHolders->mfo}}" type="text"
                                       id="insurer-mfo" name="mfo_insurer" @if($errors->has('mfo_insurer'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                    @endif >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-bank" class="col-form-label">Банк</label>
                                <select @if($errors->has('bank_insurer'))
                                        class="form-control is-invalid"
                                        @else
                                        class="form-control"
                                        @endif id="insurer_bank" name="bank_insurer"
                                        style="width: 100%;" required>
                                    <option>Выберите банк</option>
                                    @foreach(\App\Model\Bank::all() as $bank)
                                        @if($page->policyHolders->bank_id == $bank->id)
                                            <option selected value="{{ $bank->id }}">{{ $bank->name }}</option>
                                        @else
                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                <input required value="{{$page->policyHolders->oked}}" type="text" id="oked"
                                       name="oked"
                                       @if($errors->has('oked'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                    @endif >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                <input type="text" id="insurer-okonh" name="okonx"
                                       value="{{$page->policyHolders->okonx}}" @if($errors->has('okonh'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                    @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
                </div>

                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Сведение о тс</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" id="addAutozalogBtn" class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;" >
                                <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                    <table class="table table-hover table-head-fixed" id="empTable1">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Дата выдачи</th>
                                            <th class="text-nowrap">Год выпуска</th>
                                            <th class="text-nowrap">Период действия от</th>
                                            <th class="text-nowrap">Период действия до</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">Марка</th>
                                            <th class="text-nowrap">Модель</th>
                                            <th class="text-nowrap">Модификация</th>
                                            <th class="text-nowrap">Гос. номер</th>
                                            <th class="text-nowrap">Номер тех паспорта</th>
                                            <th class="text-nowrap">Номер двигателя</th>
                                            <th class="text-nowrap">Номер кузова</th>
                                            <th class="text-nowrap">Грузоподмность</th>
                                            <th class="text-nowrap">Страховая стоимость</th>
                                            <th class="text-nowrap">Страховая сумма</th>
                                            <th class="text-nowrap">Страховая премия</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($page->informations as $info)
                                        <tr id="a0">
                                            <td>
                                                    <input type="text" class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{$info->policy_number}}" name="policy_number[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('policy_series.0')) is-invalid @endif" value="{{$info->policy_series}}" name="policy_series[]">
                                            </td>
                                            <td>
                                                <input disabled="" type="date" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('god_vipuska.0')) is-invalid @endif" value="{{$info->god_vipuska}}" name="god_vipuska[]">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control @if($errors->has('policy_insurance_from.0')) is-invalid @endif" value="{{$info->policy_insurance_from}}" name="policy_insurance_from[]">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control @if($errors->has('policy_insurance_to.0')) is-invalid @endif" value="{{$info->policy_insurance_to}}" name="policy_insurance_to[]">
                                            </td>
                                            <td>
                                                <select class="form-control @if($errors->has('otvet_litso.0')) is-invalid @endif"  id="polise_agents" name="otvet_litso[]" style="width: 100%;">
                                                    @foreach($agents as $agent)
                                                        <option value="{{$agent->user_id}}" @if($agent->user_id === $info->otvet_litso)  selected="selected" @endif> {{$agent->name}} {{$agent->surname}} {{$agent->middle_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('marka.0')) is-invalid @endif" value="{{$info->marka}}" name="marka[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('model.0')) is-invalid @endif" value="{{$info->model}}" name="model[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('modification.0')) is-invalid @endif" value="{{$info->modification}}" name="modification[]">
                                            </td>


                                            <td>
                                                <input type="text" class="form-control @if($errors->has('gos_nomer.0')) is-invalid @endif" value="{{$info->gos_nomer}}" name="gos_nomer[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('tex_passport.0')) is-invalid @endif" value="{{$info->tex_passport}}" name="tex_passport[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('number_engine.0')) is-invalid @endif" value="{{$info->number_engine}}" name="number_engine[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('number_kuzov.0')) is-invalid @endif" value="{{$info->number_kuzov}}" name="number_kuzov[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('gryzopodemnost.0')) is-invalid @endif" value="{{$info->gryzopodemnost}}" name="gryzopodemnost[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="value" class="form-control @if($errors->has('strah_stoimost.0')) is-invalid @endif" value="{{$info->strah_stoimost}}" name="strah_stoimost[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0 @if($errors->has('strah_sum.0')) is-invalid @endif" value="{{$info->strah_sum}}" name="strah_sum[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="premiya" class="form-control insurance_premium-0 @if($errors->has('strah_prem.0')) is-invalid @endif" value="{{$info->strah_prem}}" name="strah_prem[]">
                                            </td>
                                            <td>
                                                <input type="button" onclick="removeProductsFieldRow(0)" value="Удалить" class="btn btn-warning">
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tbody>
                                        <tr></tr>
                                        <tr>
                                            <td colspan="15" style="text-align: right"><label class="text-bold">Итого</label></td>
                                            <td><input readonly data-insurance-stoimost type="text" class="form-control overall-sum" /></td>
                                            <td><input readonly data-insurance-sum type="text" class="form-control overall-sum4" /></td>
                                            <td><input readonly data-insurance-award type="text" class="form-control overall-sum3" /></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>При наружном осмотре ТС дефекты и повреждения? </label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($page->defect_image && $page->defect_comment) checked @endif
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')"
                                                           type="radio" class="other_insurance-0" name="deffects"
                                                           id="radioSuccess1" @if($page->defect_image == null && $page->defect_comment == null) value="1"
                                                           @else   value="2" @endif>
                                                    <label for="radioSuccess1">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input
                                                        onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)"
                                                        type="radio" class="other_insurance-0" name="deffects"
                                                        id="radioSuccess2" value="0" @if($page->defect_image == null || $page->defect_comment == null) checked
                                                        @endif >
                                                    <label for="radioSuccess2">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess2="" class="col-md-12" @if(!$page->defect_comment || !$page->defect_image) style="display: none;"
                                    @endif >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group other_insurance_info-0">
                                                <label>Комментарий</label>
                                                <input class="form-control @if($errors->has('defect_comment')) is-invalid @endif" type="text" name="defect_comment"
                                                       value="{{$page->defect_comment}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group other_insurance_info-0">
                                                <label>Прикрепите фотографии</label>
                                                <input id="defect_image" name="defect_image"
                                                       value="{{$page->defect_image}}"
                                                       type="file" @if($errors->has('defect_image'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                                @if($page->defect_image)  <a
                                                    href="/storage/{{$page->defect_image}}">Скачать</a> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей
                                            анкеты? </label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($page->strtahovka_comment || !empty(old('strtahovka_comment'))) checked @endif
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')"
                                                           type="radio" class="other_insurance-0" name="strtahovka"
                                                           id="radioSuccess1-0" @if($page->strtahovka_comment == null) value="1"
                                                           @else   value="2" @endif>
                                                    <label for="radioSuccess1-0">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input
                                                        onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)"
                                                        type="radio" class="other_insurance-0" name="strtahovka"
                                                        id="radioSuccess2-0" value="0" @if($page->strtahovka_comment == null) checked
                                                        @endif>
                                                    <label for="radioSuccess2-0">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-radiosuccess1="" class="form-group other_insurance_info"
                                         @if(!$page->strtahovka_comment) style="display: none;"
                                        @endif>
                                        <label for="strtahovka_info">Комментарий</label>
                                        <input id="strtahovka_info" class="form-control @if($errors->has('strtahovka_comment')) is-invalid @endif" type="text"
                                               name="strtahovka_comment" value="{{$page->strtahovka_comment}}">
                                    </div>
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
                            <div id="transh-payment-schedule"
                                 @if($page->payment_term == 1) class="d-none" @endif>
                                <div class="form-group">
                                    <button type="button" id="transh-payment-schedule-button" class="btn btn-primary ">
                                        Добавить
                                    </button>
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
                                        @if($page->strahPremiya->count() > 0)
                                            @foreach($page->strahPremiya as $prem)
                                                <tr id="{{$prem->id}}" data-field-number="0">
                                                    <td><input type="text" class="
                                                        @if($errors->has('payment_sum.'.$loop->index))
                                                            is-invalid
                                                        @endif form-control" name="payment_sum[]" value="{{$prem->payment_sum}}">
                                                    </td>
                                                    <td><input type="date"
                                                               class="@if($errors->has('payment_from.'.$loop->index))
                                                                   is-invalid
                                                    @endif form-control" name="payment_from[]" value="{{$prem->payment_from}}">
                                                    </td>
                                                    <td>
                                                        <input type="button" value="Удалить" data-action="delete"
                                                               class="btn btn-warning"
                                                               onclick="removeEl({{$prem->id}})">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input type="text" class="@if($errors->has('payment_sum.*'))
                                                        is-invalid
                                            @endif form-control" name="payment_sum[]" value="">
                                                </td>
                                                <td><input type="date" class="@if($errors->has('payment_from.*'))
                                                        is-invalid
                                                @endif form-control" name="payment_from[]" value="">
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Загрузка документов</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @if($page->application_form_file)<a href="/storage/{{$page->application_form_file}}"
                                                                        target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input id="anketa_img" name="application_form_file"
                                               value="{{$page->application_form_file}}"
                                               type="file" @if($errors->has('application_form_file'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->contract_file)<a href="/storage/{{$page->contract_file}}"
                                                                target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input id="dogovor_img" name="contract_file" value="{{$page->contract_file}}"
                                               type="file" @if($errors->has('contract_file'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->policy_file)<a href="/storage/{{$page->policy_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input id="polis_img" name="policy_file" value="{{$page->policy_file}}"
                                               type="file" @if($errors->has('policy_file'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
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

@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
