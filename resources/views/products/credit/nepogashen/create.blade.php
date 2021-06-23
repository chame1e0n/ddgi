@extends('layouts.index')

@section('content')

<!-- Content Wrapper. Contains page content -->
        <form method="POST" action="{{route('credit-nepogashen.store')}}" id="mainFormKasko">
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
                            @include('includes.borrower')

                        </div>


                        <div class="card-body">
                            <div id="anketa-fields">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="dogovor-lizing-num" class="col-form-label">Кредитный договор</label>
                                                        <input type="text" id="dogovor_credit_num" name="dogovor_credit_num" required
                                                               @if($errors->has('dogovor_credit_num'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="col-form-label">Срок кредитования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="credit_from" name="credit_from" type="date" required
                                                           @if($errors->has('credit_from'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Срок кредитования</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="credit_to" name="credit_to" type="date" required
                                                               @if($errors->has('credit_to'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Сумма кредита</label>
                                                    <input type="text" id="credit_sum" name="credit_sum" required
                                                           @if($errors->has('credit_sum'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Цель получения кредита</label>
                                                    <input type="text" id="credit_purpose" name="credit_purpose"
                                                    @if($errors->has('credit_purpose'))
                                                        class="form-control is-invalid"
                                                    @else
                                                        class="form-control"
                                                    @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Срок действия договора страхования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="credit_validity_period" name="credit_validity_period" type="date"
                                                           @if($errors->has('credit_validity_period'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Другие формы обеспечения обязательств по кредитному договору</label>
                                                    <input type="text" id="other_forms" name="other_forms"
                                                           @if($errors->has('other_forms'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Общая cтраховая сумма</label>
                                                        <input type="text" name="total_sum"
                                                               @if($errors->has('total_sum'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Общая страховая премия</label>
                                                        <input type="text" name="total_award"
                                                               @if($errors->has('total_award'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="payment">Условия оплаты</label>
                                                <select id="payment_terms" name="payment_terms" style="width: 100%;"
                                                        @if($errors->has('payment_terms'))
                                                        class="form-control polises is-invalid"
                                                        @else
                                                        class="form-control polises"
                                                    @endif>
                                                    <option selected="selected" value="Единовременно">Единовременно</option>
                                                </select>
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
                                                    <input type="text" id="polis-series" name="polis_series"
                                                           @if($errors->has('polis_series'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="col-form-label">Дата выдачи страхового полиса </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                    <input id="insurance_from" name="date_issue_policy" type="date"
                                                           @if($errors->has('date_issue_policy'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="otvet-litso">Ответственное лицо</label>
                                                    <select @if($errors->has('litso'))
                                                            class="form-control is-invalid"
                                                            @else
                                                            class="form-control"
                                                            @endif id="otvet-litso" name="litso"
                                                            style="width: 100%;" required>
                                                        <option></option>
                                                        @foreach($agents as $agent)
                                                            <option @if(old('litso') == $agent->user_id) selected
                                                                    @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                        @endforeach
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
@endsection
