@extends('layouts.index')

@section('content')
<form action="{{route('export.store')}}" method="post" enctype="multipart/form-data" id="mainFormKasko">
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
            @include('includes.contract')

            <div class="card-body">
                @include('includes.client')

                <div class="card card-info" id="clone-beneficiary">
                    <div class="card-header">
                        <h3 class="card-title">Покупатель</h3>
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
                                        <label for="beneficiary-name" class="col-form-label">Сфера деятельности</label>
                                        <input type="text" id="beneficiary-name" name="field_of_activity" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-address" class="col-form-label">Юр адрес</label>
                                        <input type="text" id="beneficiary-address" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-name" class="col-form-label">Почтовый адрес</label>
                                        <input type="text" id="beneficiary-name" name="email_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="beneficiary-tel" name="telephone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="beneficiary-schet" name="checking_account" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="beneficiary-inn" name="inn" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="beneficiary-mfo" name="mfo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="beneficiary-bank" name="bank" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="beneficiary-okonh" name="oked" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info" id="clone-beneficiary">
                    <div class="card-header">
                        <h3 class="card-title">Поручитель</h3>
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
                                        <label for="beneficiary-address" class="col-form-label">Юр адрес</label>
                                        <input type="text" id="beneficiary-address" name="legal_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="beneficiary-name" class="col-form-label">Почтовый адрес</label>
                                        <input type="text" id="beneficiary-name" name="email_guarantor" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="beneficiary-tel" name="telephone_guarantor" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="beneficiary-schet" name="guarantor_schet" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="beneficiary-inn" name="inn_guarantor" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="beneficiary-mfo" name="mfo_guarantor" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="beneficiary-bank" name="bank_guarantor" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="beneficiary-okonh" name="oked_guarantor" class="form-control">
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                                    <label for="dogovor-lizing-num" class="col-form-label">Номер договора страхования</label>
                                                    <input type="text" id="dogovor-lizing-num" name="unique_number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Дата договора страхования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Период договора страхования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="insurance_from" name="object_from_date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Период договора страхования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="insurance_from" name="object_to_date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="polises">Период ожидания</label>
                                            <select class="form-control polises" id="polises" name="period_expectation" style="width: 100%;">
                                                <option value="1" selected="selected">30 дней</option>
                                                <option value="2">180 дней</option>
                                                <option value="3">300 дней</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Товары по контракту</label>
                                                <input type="text" id="geographic-zone" name="products_by_contract" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="polises">Товары по контракту</label>
                                            <select class="form-control polises" id="polises" name="select_products_by_contract" style="width: 100%;">
                                                <option value="1" selected="selected">Стандартного производства </option>
                                                <option value="2" >Произведены на заказ </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Причина неисполнения обязательств покупателя перед страхователем</label>
                                                <input type="text" id="geographic-zone" name="reason" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="geographic-zone">Страна действия страхового покрытия</label>
                                                <input type="text" id="geographic-zone" name="country_insurance_coverings" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label">Дата отгрузки</label>
                                            <div class="input-group">
                                                <input id="insurance_from" name="date_shipment" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="n1">Стоимость отгруженного товара</label>
                                                <input type="text" id="n1" name="cost_of_shipment" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="n2">Из них оплачено покупателем</label>
                                                <input type="text" id="n2" name="payment_for_buyer" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="n3">Суммы задолженности покупателя перед страхователем</label>
                                                <input type="text" id="n3" name="debt" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="geographic-zone">Дата сводки</label>
                                                <input type="text" id="geographic-zone" name="date_summary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="n4">Суммы просроченные от 1 до 60 дней</label>
                                                <input type="text" id="n4" name="short_sum_overdue" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="n5">Суммы просроченные от 60 до 180 дней</label>
                                                <input type="text" id="n5" name="tall_sum_overdue" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="n6">Описание причины</label>
                                                <input type="text" id="n6" name="description_reason" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio" name="payed" id="s1" value="individual">
                                                <label for="s1">Оплаченная страховая премия</label>
                                                <input type="text" id="geographic-zone" name="payed_bonus" style="display: none;" class="form-control s1">
                                            </div>
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio" name="penalty" id="s2" value="individual">
                                                <label for="s2">Штрафы, пении</label>
                                                <input type="text" id="geographic-zone" name="penalties" style="display: none;" class="form-control s2">
                                            </div>
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio" name="sum_from_all" id="s3" value="individual">
                                                <label for="s3">Суммы полученные из любых источников в качестве платежа за надлежащие отгруженные товары, включая реализацию любой формы обеспечение</label>
                                                <input type="text" id="geographic-zone" name="payed_sum_shipment" style="display: none;" class="form-control s3">
                                            </div>
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio" name="cost_invoice" id="s4" value="individual">
                                                <label for="s4">Инвойсная стоимость товаров по контракту, которые не были отгружены или доставлены или акцептованных покупателем, или были возвращены покупателем страхователю или возмещены покупателем после предъявления претензии страхователем до возмещения убытка</label>
                                                <input type="text" id="geographic-zone" name="invoice_price" style="display: none;" class="form-control s4">
                                            </div>
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio" name="spends" id="s5" value="individual">
                                                <label for="s5">Прочие расходы</label>
                                                <input type="text" id="geographic-zone" name="spending" style="display: none;" class="form-control s5">
                                            </div>
                                            <div>Всего убыток <span id="summ"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Инвойсы</label>
                                                <input type="text" id="geographic-zone" name="invoices" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Опыт Компании с покупателем</label>
                                                <input type="text" id="geographic-zone" name="experience_with_buyer" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Накладные </label>
                                                <input type="file" multiple id="geographic-zone" name="overhead" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Выписка из банка</label>
                                                <input type="file" multiple id="geographic-zone" name="checkout_from_bank" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Платежные документы</label>
                                                <input type="file" multiple id="geographic-zone" name="payment_document" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Документы о платежном требовании cтрахователя по погашению долга</label>
                                                <input type="file" multiple id="geographic-zone" name="demand_document" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Корреспонденция с дебитором, покупателем, агентом </label>
                                                <input type="file" multiple id="geographic-zone" name="correspondence" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Бух. книга о продажи </label>
                                                <input type="file" multiple id="geographic-zone" name="book_sales" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Неоплаченные инвойсы </label>
                                                <input type="file" multiple id="geographic-zone" name="unpaid_invoices" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Детали гарантии </label>
                                                <input type="file" multiple id="geographic-zone" name="details_warranty" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Другие убытки </label>
                                                <input type="file" multiple id="geographic-zone" name="damages" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Бух. книга о продажи </label>
                                                <input type="file" multiple id="geographic-zone" name="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="disputes" id="r-1" value="individual">
                                                <label for="r-1">Не имеется неразрешенных споров или вопросов между Страхователем и Покупателем</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="problems" id="r-2" value="individual">
                                                <label for="r-2">За исключением скидок Покупатель не предоставлял или платил, не допускал возможных в будущем обязательств производить оплату любой скидки, комиссии, гонорара или других платежей Страхователю, предоставляющему отсрочку оплаты за товар</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" id="r-3" name="period_condition" value="individual">
                                                <label for="r-3">Страхователь/Покупатель осуществлял деятельность в соответствии со сроками и условиями Договора страхования, по которому предъявляется требование по возмещению Убытка</label>
                                            </div>

                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="warranty_of_trust" id="r-4" value="individual">
                                                <label for="r-4">Страхователь гарантирует и заявляет, что информация, представленная здесь, достоверна и что существенные факты, касающиеся данного Убытка, не были утеряны</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="reimbursement" id="r-5" value="individual">
                                                <label for="r-5">Страховое возмещение в сумме выплачивается Страхователю</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="claim" id="r-6" value="individual">
                                                <label for="r-6">Существует действительное и имеющее исковую силу обязательство Покупателя, получившего Товар</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="agree_with" id="r-7" value="individual">
                                                <label for="r-7">В случае необходимости, Страхователь согласен предоставить дополнительную информацию по первому требованию Страховщика</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="carried_out" id="o1" value="individual">
                                                <label for="o1">Осуществлялись ли ранее продажи данному Покупателю на условиях отсрочки платежа</label>
                                                <input type="text" id="geographic-zone" name="carried_out_info" style="display: none;" placeholder="Опишите причину" class="form-control o1">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="changes_on_date" id="r-8" value="individual">
                                                <label for="r-8">Расширялся или изменялся ли график даты платежа поставляемого товара  для Покупателей (в том числе и для данного Покупателя) и, изменились ли условия платежа после отгрузки товаров Покупателям и в частности данному Покупателю</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="dispose_changes" id="r-9" value="individual">
                                                <label for="r-9">Располагаете ли Вы информацией о невыполнении обязательств Покупателем, изменении графика поставок или переговорах о долгах со стороны Покупателя в связи с другими поставщиками</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="securing_data" id="r-10" value="individual">
                                                <label for="r-10">Располагаете или планируете использовать любые формы обеспечения в связи с данным Покупателем: (гарантия правительства, государственной организации, банка, аккредитив, поручительства третьих лиц, право ареста имущества в связи с долгами Покупателя, личные гарантии и т.д.)</label>
                                                <div class="icheck-success">
                                                    <input type="checkbox" name="requested" class="form-check-input" id="r-11" value="individual">
                                                    <label for="r-11">Были ли они запрошены?</label>
                                                </div>
                                                <div class="icheck-success">
                                                    <input type="checkbox" name="received" class="form-check-input" id="r-12" value="individual">
                                                    <label for="r-12">Были ли они получены?</label>
                                                </div>
                                            </div>

                                            <div class="icheck-success">
                                                <input type="checkbox" name="insurer_warranty" class="form-check-input" id="r-13" value="individual">
                                                <label for="r-13">Страхователь гарантирует и заявляет, что информация, представленная здесь, достоверна и что существенные факты, касающиеся данного Убытка, не были утеряны</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" id="r-14" name="reimbursement_insurer" value="individual">
                                                <label for="r-14">Страховое возмещение в сумме выплачивается Страхователю</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" id="r-15" name="claim_of_buyer" value="individual">
                                                <label for="r-15">Существует действительное и имеющее исковую силу обязательство Покупателя, получившего Товар</label>
                                            </div>
                                            <div class="icheck-success">
                                                <input type="checkbox" class="form-check-input" name="agree_with" id="r-16" value="individual">
                                                <label for="r-16">В случае необходимости, Страхователь согласен предоставить дополнительную информацию по первому требованию Страховщика</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Если предполагается использовать в качестве гарантии аккредитив, укажите</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="polis-series" class="col-form-label">Банк, открывающий аккредитив</label>
                                                <input type="text" id="polis-series" name="bank_of_credit" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="polis-series" class="col-form-label">Банк, подтверждающий аккредитив</label>
                                                <input type="text" id="polis-series" name="bank_confirm" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="polis-series" class="col-form-label">Сумма аккредитива</label>
                                                <input type="text" id="polis-series" name="sum_of_credit" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="polis-series" class="col-form-label">Форма аккредитива</label>
                                                <input type="text" id="polis-series" name="form_of_credit" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="polis-series" class="col-form-label">Вид аккредитива</label>
                                                <input type="text" id="polis-series" name="type_of_credit" class="form-control">
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
                                    <input type="text" id="all-summ" name="insurance_sum" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="all-summ">Cтраховая премия</label>
                                    <input type="text" id="all-summ" name="insurance_bonus" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="all-summ">Франшиза</label>
                                    <input type="text" id="all-summ" name="franchise" class="form-control">
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
                                        <td><input type="text" class="form-control" name="payment_sum_main"></td>
                                        <td><input type="date" class="form-control" name="payment_from_main">
                                        </td>
                                    </tr>
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
                                        <input type="text" id="polis-series" name="policy_series" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Дата выдачи страхового полиса </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input id="insurance_from" name="policy_insurance_from" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="otvet-litso">Ответственное лицо</label>
                                        <select class="form-control polises" id="otvet-litso" name="otvet_litso" style="width: 100%;">
                                            @foreach($agents as $agent)
                                                <option value="{{$agent->id}}" selected="selected">{{$agent->name}}</option>
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
                                    <input type="file" id="geographic-zone" name="application_form_file" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="polis-series" class="col-form-label">Договор</label>
                                    <input type="file" id="geographic-zone" name="contract_file" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="polis-series" class="col-form-label">Полис</label>
                                    <input type="file" id="geographic-zone" name="policy_file" class="form-control">
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
    <script src="/assets/custom/js/form/form-actions.js"></script>

    <script>
        // $('#addLitso').on('click', function() {
        //     let clone = $('#cloneLitso').clone();
        //     clone.insertAfter('#cloneLitso:last');
        //     clone.find('#addLitso').val('Удалить').addClass('removeLitso').addClass('btn-warning')
        //     $('.removeLitso').on('click', function() {
        //         $(this).parent().parent().remove();

        //     })
        // });
        $('#o1').on('change', function() {
            if ($(this).prop('checked', true)) {
                $('.o1').show();
            }
        })
        $('#s1').on('change', function() {
            if ($(this).prop('checked', true)) {
                $('.s1').show();
            }
        })
        $('#s2').on('change', function() {
            if ($(this).prop('checked', true)) {
                $('.s2').show();
            }
        })
        $('#s3').on('change', function() {
            if ($(this).prop('checked', true)) {
                $('.s3').show();
            }
        })
        $('#s4').on('change', function() {
            if ($(this).prop('checked', true)) {
                $('.s4').show();
            }
        })
        $('#s5').on('change', function() {
            if ($(this).prop('checked', true)) {
                $('.s5').show();
            }
        })
        $(document).on('keyup', function() {
            var s1 = Number($('.s1').val()),
                s2 = Number($('.s2').val()),
                s3 = Number($('.s3').val()),
                s4 = Number($('.s4').val()),
                s5 = Number($('.s5').val()),
                n1 = Number($('#n1').val()),
                n2 = Number($('#n2').val()),
                n3 = Number($('#n3').val()),
                n4 = Number($('#n4').val()),
                n5 = Number($('#n5').val()),
                summ = s1 + s2 + s3 + s4 + s5 + n1 + n2 + n3 + n4 + n5;
            $('span#summ').html(summ);
        });
    </script>
@endsection
