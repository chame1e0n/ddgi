@extends('layouts.index')

@section('content')
    <form action="{{route('cargo.update' , $cargo->id)}}" method="POST" id="mainFormKasko"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
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
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-1" value="individual"
                                                   @if($cargo->client_type_radio == "individual") checked @endif>
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-2" value="legal"
                                                   @if($cargo->client_type_radio == "legal") checked @endif>
                                            <label for="client-type-radio-2">юр. лицо</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2" name="product_id"
                                        style="width: 100%;">
                                    <option value="1" @if($cargo->product_id == 1) selected @endif>type 1</option>
                                    <option value="2" @if($cargo->product_id == 2) selected @endif>type 2</option>
                                    <option value="3" @if($cargo->product_id == 3) selected @endif>type 3</option>
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-name" class="col-form-label">Наименование
                                            страхователя</label>
                                        <input type="text" id="insurer-name" name="fio_insurer"
                                               value="{{$cargo->policyHolder->FIO}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес
                                            страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer"
                                               value="{{$cargo->policyHolder->address}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-tel" name="tel_insurer"
                                               value="{{$cargo->policyHolder->phone_number}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Почтовый адрес</label>
                                        <input type="email" id="insurer-tel" name="email_address"
                                               value="{{$cargo->policyHolder->email_address}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address_schet"
                                               value="{{$cargo->policyHolder->checking_account}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-inn" name="inn_insurer"
                                               value="{{$cargo->policyHolder->inn}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer"
                                               value="{{$cargo->policyHolder->mfo}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="insurer-bank" name="bank_insurer"
                                               value="{{$cargo->policyHolder->bank_id}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-okonh" name="okonh_insurer"
                                               value="{{$cargo->policyHolder->okonx}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-info" id="clone-beneficiary">
                                <div class="card-header">
                                    <h3 class="card-title">Выгодоприобретатель</h3>
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
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">Наименование
                                                        выгодоприобретателя</label>
                                                    <input type="text" id="beneficiary-name" name="fio_beneficiary"
                                                           value="{{$cargo->policyBeneficiaries->FIO}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Юр адрес
                                                        выгодоприобретателя</label>
                                                    <input type="text" id="beneficiary-address"
                                                           name="address_beneficiary"
                                                           value="{{$cargo->policyBeneficiaries->address}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                    <input type="text" id="beneficiary-tel" name="tel_beneficiary"
                                                           value="{{$cargo->policyBeneficiaries->phone_number}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Почтовый
                                                        адрес</label>
                                                    <input type="email" id="beneficiary-tel" name="email_beneficiary"
                                                           value="{{$cargo->policyBeneficiaries->email_beneficiary}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                        счет</label>
                                                    <input type="text" id="beneficiary-schet" name="checking_account"
                                                           value="{{$cargo->policyBeneficiaries->checking_account}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input type="text" id="beneficiary-inn"
                                                           value="{{$cargo->policyBeneficiaries->inn}}"
                                                           name="inn_beneficiary"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input type="text" id="beneficiary-mfo" name="mfo_beneficiary"
                                                           value="{{$cargo->policyBeneficiaries->mfo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                                    <input type="text" id="beneficiary-bank" name="bank_beneficiary"
                                                           value="{{$cargo->policyBeneficiaries->bank_id}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                    <input type="text" id="beneficiary-okonh" name="okonh_beneficiary"
                                                           value="{{$cargo->policyBeneficiaries->okonx}}"
                                                           class="form-control">
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
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведения об объекте</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="anketa-fields">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="dogovor-lizing-num" class="col-form-label">Номер
                                                            поставки</label>
                                                        <input type="text" id="dogovor-lizing-num"
                                                               name="dogovor_lizing_num"
                                                               value="{{$cargo->dogovor_lizing_num}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Дата поставки</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="insurance_from" type="date"
                                                           value="{{$cargo->insurance_from}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Пункт отправителя</label>
                                                    <input type="text" id="geographic-zone" name="steamer_point"
                                                           value="{{$cargo->steamer_point}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Пункт назначения</label>
                                                    <input type="text" id="geographic-zone" name="appointment_point"
                                                           value="{{$cargo->appointment_point}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Географическая зона</label>
                                                    <input type="text" id="geographic-zone" name="geo_zone"
                                                           value="{{$cargo->geo_zone}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Места перегрузок, перевалок</label>
                                                    <input type="text" id="geographic-zone" name="overloads_place"
                                                           value="{{$cargo->overloads_place}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Страны действия страхования</label>
                                                    <input type="text" id="geographic-zone" name="country_of_insurance"
                                                           value="{{$cargo->country_of_insurance}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Местонахождение груза</label>
                                                    <input type="text" id="geographic-zone" name="location_of_cargo"
                                                           value="{{$cargo->location_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Наименование груза</label>
                                                    <input type="text" id="geographic-zone" name="name_of_cargo"
                                                           value="{{$cargo->name_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вид груза</label>
                                                    <input type="text" id="geographic-zone" name="type_of_cargo"
                                                           value="{{$cargo->type_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вид упаковки</label>
                                                    <input type="text" id="geographic-zone" name="type_packaging"
                                                           value="{{$cargo->type_packaging}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вес груза</label>
                                                    <input type="text" id="geographic-zone" name="weight_of_cargo"
                                                           value="{{$cargo->weight_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Количество единиц груза</label>
                                                    <input type="text" id="geographic-zone" name="amount_of_cargo"
                                                           value="{{$cargo->amount_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вид транспорта</label>
                                                    <input type="text" id="geographic-zone" name="type_of_transport"
                                                           value="{{$cargo->type_of_transport}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">Особенности
                                                        груза</label>
                                                    <textarea id="beneficiary-name" name="qualities_of_cargo"
                                                              class="form-control">{{$cargo->qualities_of_cargo}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Cопровождающие лица</label>
                                                    <div class="row" id="cloneLitso">
                                                        <div class="col-md-11">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>ФИО</label>
                                                                        <input id="fio_input"
                                                                               name="fio_accompanying_main" type="text"
                                                                               value="{{$cargo->fio_accompanying}}"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Должность</label>
                                                                        <input id="position_input"
                                                                               name="position_accompanying_main"
                                                                               type="text"
                                                                               value="{{$cargo->position_accompanying}}"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input style="margin-top: 32px;" type="button" id="addLitso"
                                                                   value="Добавить"
                                                                   class="btn btn-success product-fields-button">
                                                        </div>
                                                    </div>
                                                    @if(!empty($cargo->cargoAccompanyingPerson[0]))
                                                        @foreach($cargo->cargoAccompanyingPerson[0]->fio_accompanying as $key => $item)
                                                            <div class="row" id="cloneLitso">
                                                                <div class="col-md-11">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>ФИО</label>
                                                                                <input id="fio_input"
                                                                                       name="fio_accompanying[]" type="text"
                                                                                       value="{{$cargo->cargoAccompanyingPerson[0]->fio_accompanying[$key]}}"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Должность</label>
                                                                                <input id="position_input"
                                                                                       name="position_accompanying[]"
                                                                                       type="text"
                                                                                       value="{{$cargo->cargoAccompanyingPerson[0]->position_accompanying[$key]}}"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input style="margin-top: 32px;" type="button"
                                                                           id="addLitso"
                                                                           value="Удалить"
                                                                           class="btn btn-success product-fields-button removeLitso btn-warning">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Количество грузовых мест</label>
                                                    <input type="text" id="geographic-zone" name="amount_of_cargo_place"
                                                           value="{{$cargo->amount_of_cargo_place}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Грузаперевозчик</label>
                                                    <input type="text" id="geographic-zone" name="transporter"
                                                           value="{{$cargo->transporter}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Наименование грузоотправителя</label>
                                                    <input type="text" id="geographic-zone" name="name_of_shipper"
                                                           value="{{$cargo->name_of_shipper}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Адрес грузоотправителя</label>
                                                    <input type="text" id="geographic-zone" name="address_shipper"
                                                           value="{{$cargo->address_shipper}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Наименование грузополучателя</label>
                                                    <input type="text" id="geographic-zone" name="name_consignee"
                                                           value="{{$cargo->name_consignee}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Адрес грузополучателя</label>
                                                    <input type="text" id="geographic-zone" name="address_consignee"
                                                           value="{{$cargo->address_consignee}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период страхования </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="insurance_period_from" type="date"
                                                           value="{{$cargo->insurance_period_from}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период страхования </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_from" name="insurance_to" type="date"
                                                           value="{{$cargo->insurance_to}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период упаковки </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="packaging_period_from" type="date"
                                                           value="{{$cargo->packaging_period_from}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период упаковки </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_from" name="packaging_period_to" type="date"
                                                           value="{{$cargo->packaging_period_to}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Условия страхования груза</label>
                                                    <div class="col-sm-12">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   class="client-type-radio" id="radio-1"
                                                                   value="1"
                                                                   @if($cargo->condition_insurance == "1") checked @endif>
                                                            <label for="radio-1">Не имеются</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   class="client-type-radio" id="radio-2"
                                                                   value="2"
                                                                   @if($cargo->condition_insurance == "2") checked @endif>
                                                            <label for="radio-2">С ответственностью за все
                                                                риски </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   class="client-type-radio" id="radio-3" value="3"
                                                                   @if($cargo->condition_insurance == "3") checked @endif>
                                                            <label for="radio-3">С ответственностью за частную
                                                                аварию </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   class="client-type-radio" id="radio-4" value="4"
                                                                   @if($cargo->condition_insurance == "4") checked @endif>
                                                            <label for="radio-4">Без ответственности за повреждения,
                                                                кроме случаев крушения</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="geographic-zone">Сопровождающие документы</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="file" multiple id="geographic-zone"
                                                                   name="accompanying_file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                        <input type="text" id="all-summ" name="insurance_sum" value="{{$cargo->insurance_sum}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" value="{{$cargo->insurance_bonus}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" value="{{$cargo->franchise}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames"
                                                name="insurance_premium_currency"
                                                style="width: 100%; text-align: center">
                                            <option selected="selected">UZS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select class="form-control payment-schedule" name="payment_term"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option value="1" @if($cargo->payment_term == "1") selected @endif>Единовременно</option>
                                            <option value="other" @if($cargo->payment_term == "other") selected @endif>Другое</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="other-payment-schedule" @if($cargo->payment_term == "1") style="display: none;" @endif>
                                <div class="form-group">
                                    <button type="button" onclick="addRow3()" class="btn btn-primary ">
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
                                            <td><input type="text" class="form-control" name="payment_sum_main" value="{{ $cargo->payment_sum_main }}"></td>
                                            <td><input type="date" class="form-control" name="payment_from_main" value="{{ $cargo->payment_from_main }}"></td>
                                        </tr>
                                        @if(!empty($cargo->cargoPaymentTerms[0]))
                                            @foreach($cargo->cargoPaymentTerms[0]->payment_sum as $key => $item)
                                                <tr>
                                                    <td><input type="text" class="form-control" value="{{$cargo->cargoPaymentTerms[0]->payment_sum[$key]}}" name="payment_sum[]"></td>
                                                    <td><input type="text" class="form-control" value="{{$cargo->cargoPaymentTerms[0]->payment_from[$key]}}" name="payment_from[]"></td>
                                                    <td><input type="button" class="btn btn-warning" value="Удалить" onclick="removeRow3(this)"></td>
                                                </tr>
                                            @endforeach
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
                            <h3 class="card-title">Сведения о страховом полисе</h3>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <input type="text" id="polis-series" name="policy_series"
                                                   value="{{$cargo->policy_series}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="date_giving_insurance" type="date"
                                                   value="{{$cargo->date_giving_insurance}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso"
                                                    name="responsible_person"
                                                    style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option
                                                            @if($cargo->responsible_person == $agent->id)selected="selected" @endif
                                                            value="{{$agent->id}}">{{$agent->name}}</option>
                                                @endforeach
                                            </select>
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
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input type="file" id="geographic-zone" name="application_form"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="contract" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="policy" class="form-control">
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
    <form method="post" action="{{route("cargo.destroy", $cargo->id)}}">
        <div class="card-footer">
            @csrf
            @method("delete")
            <button type="submit" class="btn btn-danger float-right">Удалить</button>
        </div>
    </form>
@endsection
@section('scripts')
    {{--    <script src="/assets/custom/js/form/form-actions.js"></script>--}}
    <script>
        $('#addLitso').on('click', function () {
            let clone = $('#cloneLitso').clone();
            clone.find('#fio_input').attr('name', 'fio_accompanying[]');
            clone.find('#position_input').attr('name', 'position_accompanying[]');
            clone.insertAfter('#cloneLitso:last');
            clone.find('#addLitso').val('Удалить').addClass('removeLitso').addClass('btn-warning')
            $('.removeLitso').on('click', function () {
                $(this).parent().parent().remove();
            })
        });
    </script>
@endsection