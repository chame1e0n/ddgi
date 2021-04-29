@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-ipoteka.store')}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
        @csrf
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
                    <div class="card card-info" id="clone-insurance">
                        <div class="card-header">
                            <h3 class="card-title">Общие сведения</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-name" class="col-form-label">Наименование страхователя</label>
                                        <input required type="text" id="insurer-name" name="fio_insurer"
                                               value="{{old('fio_insurer')}}" @if($errors->has('fio_insurer'))
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
                                        <input required value="{{old('address_insurer')}}" type="text" id="insurer-address"
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
                                        <input required value="{{old('tel_insurer')}}" type="text" id="insurer-tel"
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
                                        <input required value="{{old('checking_account')}}" type="text" id="insurer-schet"
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
                                        <input required value="{{old('inn_insurer')}}" type="text" id="insurer-inn"
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
                                        <input required value="{{old('mfo_insurer')}}"  type="text" id="insurer-mfo" name="mfo_insurer" @if($errors->has('mfo_insurer'))
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
                                            @foreach($banks as $bank)
                                                @if(old('bank_insurer') == $bank->id)
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
                                        <input required value="{{old('oked')}}" type="text" id="oked" name="oked"
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
                                        <input type="text" id="insurer-okonh"  name="okonx" value="{{old('okonx')}}" @if($errors->has('okonh'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-info" id="clone-beneficiary">
                                <div class="card-header">
                                    <h3 class="card-title">Выгодоприобретатель</h3>
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
                                                    <label for="beneficiary-name" class="col-form-label">ФИО
                                                        выгодоприобретателя</label>
                                                    <input required value="{{old('fio_beneficiary')}}" type="text"
                                                           id="beneficiary-name" name="fio_beneficiary"
                                                           @if($errors->has('fio_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Адрес
                                                        выгодоприобретателя</label>
                                                    <input required value="{{old('address_beneficiary')}}" type="text"
                                                           id="beneficiary-address"
                                                           name="address_beneficiary"
                                                           @if($errors->has('address_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                    <input required value="{{old('tel_beneficiary')}}" type="text"
                                                           id="beneficiary-tel" name="tel_beneficiary"
                                                           @if($errors->has('tel_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                    <input required value="{{old('beneficiary_schet')}}" type="text" id="beneficiary_schet"
                                                           name="beneficiary_schet"
                                                           @if($errors->has('beneficiary_schet'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input required value="{{old('inn_beneficiary')}}" type="number" id="inn_beneficiary"
                                                           name="inn_beneficiary"
                                                           @if($errors->has('inn_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input required value="{{old('mfo_beneficiary')}}" type="text" id="mfo_beneficiary"
                                                           name="mfo_beneficiary"
                                                           @if($errors->has('mfo_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="insurer-bank" class="col-form-label">Банк</label>
                                                    <select @if($errors->has('bank_beneficiary'))
                                                            class="form-control is-invalid"
                                                            @else
                                                            class="form-control"
                                                            @endif id="bank_beneficiary" name="bank_beneficiary"
                                                            style="width: 100%;" required>
                                                        <option>Выберите банк</option>
                                                        @foreach($banks as $bank)
                                                            @if(old('bank_beneficiary') == $bank->id)
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
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                    <input required value="{{old('oked_beneficiary')}}" type="text" id="oked_beneficiary"
                                                           name="oked_beneficiary"
                                                           @if($errors->has('oked_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                                    <input type="text" id="beneficiary-okonh" name="okonx_beneficiary" value="{{old('okonx_beneficiary')}}" required @if($errors->has('okonx_beneficiary'))
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
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor_num" class="col-form-label">Номер договора</label>
                                    <input type="text" id="dogovor_num" name="unique_number" value="{{old('unique_number')}}" @if($errors->has('unique_number'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="dogovor_date" class="col-form-label">Дата договора</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input id="dogovor_date" name="insurance_from" value="{{old('insurance_from')}}" type="date" @if($errors->has('insurance_from'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor-strah-vigod-num" class="col-form-label">Номер договора между страхователем и выгодоприобритателем</label>
                                    <input required type="text" id="dogovor-lizing-num" name="nomer_dogovor_strah_vigod" value="{{old('nomer_dogovor_strah_vigod')}}" @if($errors->has('nomer_dogovor_strah_vigod'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor-strah-vigod-date" class="col-form-label">Дата договора между страхователем и выгодоприобритателем</label>
                                    <input required type="date" id="dogovor-lizing-date" name="date_dogovor_strah_vigod" value="{{old('date_dogovor_strah_vigod')}}" @if($errors->has('date_dogovor_strah_vigod'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="period_date" class="col-form-label">Период страхования</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input required id="period_date" name="object_from_date" value="{{old('object_from_date')}}" type="date" @if($errors->has('object_from_date'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="period_date" class="col-form-label">Период страхования</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">до</span>
                                    </div>
                                    <input required id="period_date" name="object_to_date" value="{{old('object_to_date')}}" type="date" @if($errors->has('object_to_date'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="osnovanie_otsenki" class="col-form-label">Основание для оценки</label>
                                    <input required type="text" id="osnovanie_otsenki" name="ocenka_osnovaniya" value="{{old('ocenka_osnovaniya')}}" @if($errors->has('ocenka_osnovaniya'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="geo" class="col-form-label">Местонахождение</label>
                                    <input required type="text" id="geo" name="location" value="{{old('location')}}" @if($errors->has('location'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведения о имуществе</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                    <tr>
                                        <td>
                                            <input required type="text" @if($errors->has('name_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="name_property[]" value="{{old('name_property.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" @if($errors->has('place_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="place_property[]" value="{{old('place_property.0')}}">
                                        </td>
                                        <td>
                                            <input required type="date" @if($errors->has('date_of_issue_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="date_of_issue_property[]" value="{{old('date_of_issue_property.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" @if($errors->has('count_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="count_property[]" value="{{old('count_property.0')}}">
                                        </td>
                                        <td>
                                            <select @if($errors->has('units_property.0'))
                                                    class="form-control polises is-invalid"
                                                    @else
                                                    class="form-control polises"
                                                    @endif id="polises" name="units_property[]" style="width: 100%;">
                                                <option selected="selected" value="1">Кв.м</option>
                                                <option value="2">Кв.см</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input required type="text" data-field="value" @if($errors->has('insurance_cost.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="insurance_cost[]" value="{{old('insurance_cost.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" data-field="sum" @if($errors->has('insurance_sum.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="insurance_sum[]" value="{{old('insurance_sum.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" data-field="premiya" @if($errors->has('insurance_premium.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="insurance_premium[]" value="{{old('insurance_premium.0')}}">
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="5" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input required readonly data-insurance-stoimost type="text" class="form-control overall-sum" /></td>
                                        <td><input required readonly data-insurance-sum type="text" class="form-control overall-sum4" /></td>
                                        <td><input required readonly data-insurance-award type="text" class="form-control overall-sum3" /></td>
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
                                                <input onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')" type="radio" class="other_insurance-0" name="fire_alarm_file"  @if(old('fire_alarm_file')) checked @endif id="radioSuccess1">
                                                <label for="radioSuccess1">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)" type="radio" class="other_insurance-0" name="fire_alarm_file"  id="radioSuccess2" value="0">
                                                <label for="radioSuccess2">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess2="" style="display: none;" class="form-group other_insurance_info-0">
                                    <label>Прикрепите сертификат</label>
                                    <input @if($errors->has('fire_alarm_file'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif type="file" name="fire_alarm_file" value="{{old('fire_alarm_file')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие охранной сигнализации и средств защиты/охраны</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')" type="radio" class="other_insurance-0" @if(old('security_file')) checked @endif name="security_file" id="radioSuccess1-0" >
                                                <label for="radioSuccess1-0">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)" type="radio" class="other_insurance-0"  name="security_file"   id="radioSuccess2-0">
                                                <label for="radioSuccess2-0">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess1="" style="display: none;" class="form-group other_insurance_info">
                                    <label>Прикрепите сертификат</label>
                                    <input @if($errors->has('security_file'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif type="file" name="security_file" value="{{old('security_file')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Франшиза</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="summ-1">% от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                        <input required type="text" id="summ-1" name="franshize_percent_1" @if($errors->has('franshize_percent_1'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif value="{{old('franshize_percent_1')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="summ-2">% от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                        <input required type="text" id="summ-2" name="franshize_percent_2" @if($errors->has('franshize_percent_2'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif value="{{old('franshize_percent_2')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">% от страховой суммы по другим рискам по каждому <br> убытку и/или по всем убыткам в результате каждого <br> страхового случая</label>
                                        <input required type="text" id="geographic-zone" name="franshize_percent_3" @if($errors->has('franshize_percent_3'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif value="{{old('franshize_percent_3')}}">
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                        <input type="text" id="all-summ" name="insurance_sum_prod" value="{{old('insurance_sum_prod')}}" @if($errors->has('insurance_sum_prod'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" value="{{old('insurance_bonus')}}" @if($errors->has('insurance_bonus'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" value="{{old('franchise')}}" @if($errors->has('franchise'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select @if($errors->has('insurance_premium_currency'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="walletNames" style="width: 100%; text-align: center">
                                            <option selected="selected" value="{{old('insurance_premium_currency')}}" name="insurance_premium_currency">{{old('insurance_premium_currency', "UZS")}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition"  @if($errors->has('payment_term'))
                                        class="form-control is-invalid payment-schedule"
                                                @else
                                                class="form-control payment-schedule"
                                                @endif name="payment_term" style="width: 100%; text-align: center">
                                            <option value="1">Единовременно</option>
                                            <option value="transh">Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select @if($errors->has('payment_term'))
                                                class="form-control is-invalid payment-schedule"
                                                @else
                                                class="form-control payment-schedule"
                                                @endif name="payment_term" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1" @if(old('payment_term') === "1") selected @endif>Сумах</option>
                                            <option value="2" @if(old('payment_term') === "2") selected @endif>Сумах В ин. валюте</option>
                                            <option value="3" @if(old('payment_term') === "3") selected @endif>В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option value="4" @if(old('payment_term') === "4") selected @endif>В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="5" @if(old('payment_term') === "5") selected @endif>В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule" class="d-none">
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
                                        <tr id="payment-term-tr-0" data-field-number="0">
                                            <td><input type="text" @if($errors->has('payment_sum.0'))
                                                class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif name="payment_sum[]" value="{{old('payment_sum.0')}}"></td>
                                            <td><input type="date" @if($errors->has('payment_from.0'))
                                                class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif name="payment_from[]" value="{{old('payment_from.0')}}">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="tarif" id="tarif">
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr style="display: none">
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input @if($errors->has('tarif_other'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif id="descrTarif" type="number" name="tarif_other" value="{{old('tarif_other')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')" class="form-check-input client-type-radio" type="checkbox" name="preim" id="preim">
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr style="display: none">
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input @if($errors->has('premiya_other'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif id="descrPreim" type="number" name="premiya_other" value="{{old('premiya_other')}}">
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input  id="anketa_img" name="application_form_file" value="{{old('application_form_file')}}"
                                                type="file" @if($errors->has('application_form_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input  id="dogovor_img" name="contract_file" value="{{old('contract_file')}}"
                                                type="file" @if($errors->has('contract_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input  id="polis_img" name="policy_file" value="{{old('policy_file')}}"
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
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Копии документов</h3>
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
                                            <label for="polis-series" class="col-form-label">Паспорт</label>
                                            <input  id="copy_passport" name="passport_copy" value="{{old('passport_copy')}}"
                                                    type="file" @if($errors->has('passport_copy'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            <input  id="copy_dogovor" name="dogovor_copy" value="{{old('dogovor_copy')}}"
                                                    type="file" @if($errors->has('dogovor_copy'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Справки</label>
                                            <input  id="copy_spravki" name="spravka_copy" value="{{old('spravka_copy')}}"
                                                    type="file" @if($errors->has('spravka_copy'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Другие</label>
                                            <input  id="copy_drugie" name="other_copy" value="{{old('other_copy')}}"
                                                    type="file" @if($errors->has('other_copy'))
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
