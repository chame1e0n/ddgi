@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-autozalog-mnogostoronniy.update', $page->id)}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
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
                    @include('includes.pledger')
                </div>
                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dogovor-num-strah" class="col-form-label">Номер договора
                                                страхования</label>
                                            <input type="text" id="unique_number" name="unique_number" class="form-control @if($errors->has('unique_number')) is-invalid @endif" value="{{$page->unique_number}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="date_dogovor_strah" class="col-form-label">Дата договора
                                                страхования</label>
                                            <input id="dogovor_zalog_date_to" name="insurance_from" type="date" value="{{$page->insurance_from}}"
                                                   class="form-control @if($errors->has('insurance_from')) is-invalid @endif">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dogovor-num" class="col-form-label">Номер кредитного
                                                договора</label>
                                            <input id="loan_reason" name="credit_dogovor_number" type="text"
                                                   class="form-control @if($errors->has('credit_dogovor_number')) is-invalid @endif" value="{{$page->credit_dogovor_number}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_kredit_dogovor_from">Период кредитного договора</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="credit_insurance_from" name="credit_insurance_from" type="date" value="{{$page->credit_insurance_from}}"
                                                       class="form-control @if($errors->has('credit_insurance_from')) is-invalid @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_kredit_dogovor_to">Период кредитного договора</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="credit_insurance_to" name="credit_insurance_to" type="date" value="{{$page->credit_insurance_to}}"
                                                       class="form-control @if($errors->has('credit_insurance_to')) is-invalid @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_strah_from">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                </div>
                                                <input id="object_from_date" name="object_from_date" type="date"
                                                       class="form-control @if($errors->has('object_from_date')) is-invalid @endif" value="{{$page->object_from_date}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                <div class="form-group">
                                            <label for="period_strah_to">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="object_to_date" name="object_to_date" type="date"
                                                       class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{$page->object_to_date}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="geographic-zone">Географическая зона:</label>
                                    <input id="loan_reason" name="geo_zone" type="text"
                                           class="form-control @if($errors->has('geo_zone')) is-invalid @endif" value="{{$page->geo_zone}}">
                                </div>
                                <div class="form-group">
                                    <label for="tsel_tc">Цель использования ТС:</label>
                                    <input id="loan_reason" name="loan_reason" type="text"
                                           class="form-control @if($errors->has('loan_reason')) is-invalid @endif" value="{{$page->loan_reason}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведение о тс</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
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
                                                    <input type="text" class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{$info->policy_number}}" name="policy_number[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('policy_series.0')) is-invalid @endif" value="{{$info->policy_series}}" name="policy_series[]" required >
                                                </td>
                                                <td>
                                                    <input disabled="" type="date" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('god_vipuska.0')) is-invalid @endif" value="{{$info->god_vipuska}}" name="god_vipuska[]" required>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control @if($errors->has('policy_insurance_from.0')) is-invalid @endif" value="{{$info->policy_insurance_from}}" name="policy_insurance_from[]" required>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control @if($errors->has('policy_insurance_to.0')) is-invalid @endif" value="{{$info->policy_insurance_to}}" name="policy_insurance_to[]" required>
                                                </td>
                                                <td>
                                                    <select class="form-control @if($errors->has('otvet_litso.0')) is-invalid @endif"  id="polise_agents" name="otvet_litso[]" style="width: 100%;" required>
                                                        @foreach($agents as $agent)
                                                            <option value="{{$agent->user_id}}" @if($agent->user_id === $info->otvet_litso)  selected="selected" @endif> {{$agent->name}} {{$agent->surname}} {{$agent->middle_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('marka.0')) is-invalid @endif" value="{{$info->marka}}" name="marka[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('model.0')) is-invalid @endif" value="{{$info->model}}" name="model[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('modification.0')) is-invalid @endif" value="{{$info->modification}}" name="modification[]" required>
                                                </td>


                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('gos_nomer.0')) is-invalid @endif" value="{{$info->gos_nomer}}" name="gos_nomer[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('tex_passport.0')) is-invalid @endif" value="{{$info->tex_passport}}" name="tex_passport[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('number_engine.0')) is-invalid @endif" value="{{$info->number_engine}}" name="number_engine[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('number_kuzov.0')) is-invalid @endif" value="{{$info->number_kuzov}}" name="number_kuzov[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('gryzopodemnost.0')) is-invalid @endif" value="{{$info->gryzopodemnost}}" name="gryzopodemnost[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" data-field="value" class="form-control @if($errors->has('strah_stoimost.0')) is-invalid @endif" value="{{$info->strah_stoimost}}" name="strah_stoimost[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0 @if($errors->has('strah_sum.0')) is-invalid @endif" value="{{$info->strah_sum}}" name="strah_sum[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" data-field="premiya" class="form-control insurance_premium-0 @if($errors->has('strah_prem.0')) is-invalid @endif" value="{{$info->strah_prem}}" name="strah_prem[]" required>
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
                                        <input type="text" id="all-summ" name="insurance_sum_prod" class="form-control @if($errors->has('insurance_sum_prod')) is-invalid @endif"
                                               value="{{$page->insurance_sum}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" class="form-control @if($errors->has('insurance_bonus')) is-invalid @endif"
                                               value="{{$page->insurance_bonus}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" class="form-control @if($errors->has('franchise')) is-invalid @endif"
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
