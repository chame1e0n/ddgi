@extends('layouts.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active"><a href="/form">Претензии</a></li>
              <li class="breadcrumb-item active">Создать Претензию</li>
            </ol>
          </div>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-info">Назад</a>
      </div>
    </div>

    <section class="content">

      <div class="card card-info pretenziya" id="form-container">
        <div class="card-header">
          <h3 class="card-title">Претензия</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="card-body">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="col-form-label" for="pretensii-state">Состояние</label>
                  <select readonly id="pretensii-state" class="form-control">
                    <option selected="selected">Состояние1</option>
                    <option>Состояние2</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-3">
                <label class="col-form-label" for="pretensii-number">№ дела</label>
                <input type="text" readonly name="case_number" class=" form-control client-type-text"
                       id="pretensii-number" value="{{$pretensiiOverview->pretensii->case_number}}">
              </div>

              <div class="form-group col-sm-3">
                <label class="col-form-label" for="pretensii-insured">Страхователь</label>
                <input type="text" readonly name="insurer" class="form-control client-type-text"
                       id="pretensii-insured" value="{{$pretensiiOverview->pretensii->insurer}}">
              </div>


              <div class="form-group col-sm-3">
                <label class="col-form-label" for="pretensii-subsidiary">Филиал</label>
                <select readonly id="pretensii-subsidiary" class="form-control" name="branch_id">
                  <option selected="selected"
                          value="{{$pretensiiOverview->pretensii->branch_id}}">{{$pretensiiOverview->pretensii->branch->name}}</option>
                </select>
              </div>

              <div class="form-group col-sm-3">
                <label class="col-form-label" for="pretensii-insurance-contract">Договор
                  страхования</label>
                <input type="text" readonly name="insurance_contract"
                       class=" form-control client-type-text" id="pretensii-insurance-contract"
                       value="{{$pretensiiOverview->pretensii->insurance_contract}}">
              </div>
            </div>

            <div class="form-group">
              <label>Тип клиента</label>
              <div class="row">
                <div class="col-sm-4">
                  <div class="icheck-success">
                    <input type="radio" class="other_insurance-0" name="client_type"
                           id="pretensiiClientType1" value="1" disabled
                           @if ($pretensiiOverview->pretensii->client_type)
                           checked
                            @endif
                    >
                    <label for="pretensiiClientType1">Юр. лицо</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="icheck-success">
                    <input type="radio" class="other_insurance-0" disabled name="client_type"
                           id="pretensiiClientType2" value="0"
                           @if (!$pretensiiOverview->pretensii->client_type)
                           checked
                            @endif

                    >
                    <label for="pretensiiClientType2">Физ. лицо</label>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label" for="pretensii-insurance-type">Вид страхования</label>
                  <select id="pretensii-insurance-type" class="form-control"
                          name="insurence_type" readonly>
                    <option selected="selected">{{$pretensiiOverview->pretensii->insurence_type}}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label" for="pretensii-insurance-period-under-the-policy">Период
                    страхования по полису</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">с</span>
                    </div>
                    <input id="pretensii-insurance-period-under-the-policy"
                           name="insurence_period" type="date"
                           class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="row">
                    <label class="col-form-label" for="pretensii-sum-insured">Страховая
                      сумма</label>
                    <div class="input-group mb-4">
                      <input type="number" class="form-control r-3-one-1-0"
                             name="insured_sum" value="{{$pretensiiOverview->pretensii->insured_sum}}" readonly>
                      <div class="input-group-append">
                        <select class="form-control success"
                                style="width: 100%;" readonly>
                          <option selected="selected">UZS</option>
                          <option>USD</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>


            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Страховая премия</h3>

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
                      <label class="col-form-label" for="pretensii-payable-by-agreement">Подлежит
                        оплате по договору</label>
                      <div class="input-group mb-4">
                        <input type="number" class="form-control r-3-one-1-0"
                               name="payable_by_agreement"
                               value="{{$pretensiiOverview->pretensii->payable_by_agreement}}"
                               readonly>
                        <div class="input-group-append">
                          <select class="form-control success"
                                  style="width: 100%;"
                                  readonly>
                            <option selected="selected">UZS</option>
                            <option>USD</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label" for="pretensii-actually-paid">Фактически
                        оплаченная</label>
                      <input type="text" name="actually_paid"
                             class="form-control client-type-text" id="pretensii-actually-paid"
                             value="{{$pretensiiOverview->pretensii->actually_paid}}"
                             readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label" for="pretensii-last-payment-date">Дата
                        последней
                        оплаты</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Дата</span>
                        </div>
                        <input id="pretensii-last-payment-date" name="last_payment_date"
                               type="date" class="form-control"
                               readonly
                               value="{{$pretensiiOverview->pretensii->last_payment_date}}">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Франшиза</h3>

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
                      <div class=" col-mb-3">
                        <label class="col-form-label" for="pretensii-franchise-type">вид</label>
                        <select class="form-control success" readonly name="franchise_type_id"
                                style="width: 100%;">
                          <option selected="selected"
                                  value="{{$pretensiiOverview->pretensii->franchise_type_id}}">{{$pretensiiOverview->pretensii->franchise_type->type}}</option>
                        </select>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label"
                             for="pretensii-deductible-amount">Сумма </label>
                      <input type="text" readonly name="deductible_amount"
                             class="form-control client-type-text"
                             id="pretensii-deductible-amount"
                             value="{{$pretensiiOverview->pretensii->deductible_amount}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="col-form-label"
                             for="pretensii-franchise-percentage">Процент</label>
                      <div class="input-group mb-4">
                        <input type="text" size="3" name="franchise_percentage"
                               readonly
                               class="form-control client-type-text r-3-one-1-0"
                               id="pretensii-franchise-percentage"
                               value="{{$pretensiiOverview->pretensii->franchise_percentage}}">
                        <div class="input-group-append">
                          <i class="form-control success">%</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label" for="pretensii-reinsurance">Перестрахования</label>
                  <input type="text" name="reinsurance" readonly class="form-control client-type-text"
                         id="pretensii-reinsurance" value="{{$pretensiiOverview->pretensii->reinsurance}}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label" for="pretensii-date-applications">Дата поступления
                    Заявления</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Дата</span>
                    </div>
                    <input id="pretensii-date-applications" name="date_applications" readonly
                           type="date" class="form-control"
                           value="{{$pretensiiOverview->pretensii->date_applications}}">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label"
                         for="pretensii-date-of-occurrence-of-the-insured-event">Дата
                    наступления страхового события</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Дата</span>
                    </div>
                    <input id="pretensii-date-of-occurrence-of-the-insured-event"
                           name="date_of_the_insured_event" type="date"
                           readonly
                           class="form-control" value="{{$pretensiiOverview->pretensii->date_of_the_insured_event}}">
                  </div>
                </div>

              </div>
            </div>


            <div class="form-group">
              <label class="col-form-label" for="pretensii-description-of-the-insured-event">Описание
                страхового события</label>
              <input type="text" name="event_description" readonly
                     class="form-control client-type-text" id="pretensii-description-of-the-insured-event"
                     value="{{$pretensiiOverview->pretensii->event_description}}">
            </div>

            <div class="form-group">
              <label class="col-form-label" for="pretensii-description-of-the-insurance-object">Описание
                страхового объекта</label>
              <input type="text" name="object_description" readonly
                     class="form-control client-type-text"
                     id="pretensii-description-of-the-insurance-object"
                     value="{{$pretensiiOverview->pretensii->object_description}}">
            </div>


            <div class="card-body">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Итоговая</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class=" col-md-6">
                      <label class="col-form-label" for="pretensii-insurable-value">Страховая
                        стоимость</label>
                      <input type="text" readonly
                             class="form-control client-type-text" id="pretensii-insurable-value"
                             value="1000">
                    </div>
                    <div class=" col-md-6">
                      <label class="col-form-label" for="pretensii-sum-insured">Страховая
                        сумма</label>
                      <input type="text" readonly
                             class="form-control client-type-text" id="pretensii-sum-insured"
                             value="1000">
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Место происшествия</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-6">
                      <label class="col-form-label" for="pretensii-region">Область</label>
                      <select id="pretensii-region" class="form-control" name="region" readonly>
                        <option selected="selected">{{$pretensiiOverview->pretensii->region}}</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="col-form-label" for="pretensii-district">Район</label>
                      <select id="pretensii-district" class="form-control" name="district"
                              readonly>
                        <option selected="selected">{{$pretensiiOverview->pretensii->district}}</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Заявленный убыток</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">

                  <div class="row">
                    <label class="col-form-label" for="pretensii-claimed-loss-summ">Сумма</label>
                    <div class="input-group mb-4">
                      <input type="number" class="form-control r-3-one-1-0" readonly
                             name="claimed_loss_sum" value="{{$pretensiiOverview->pretensii->claimed_loss_sum}}">
                      <div class="input-group-append">
                        <select class="form-control success" readonly
                                style="width: 100%;">
                          <option selected="selected">UZS</option>
                          <option>USD</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Урегулирование претензии Выплаченное возмещение</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">

                    <div class="row">
                      <div class="col-md-6">
                        <label class="col-form-label"
                               for="pretensii-refund-paid-summ">Сумма</label>
                        <div class="input-group mb-4">
                          <input type="number" class="form-control r-3-one-1-0"
                                 name="refund_paid_sum"
                                 readonly
                                 value="{{$pretensiiOverview->pretensii->refund_paid_sum}}">
                          <div class="input-group-append">
                            <select class="form-control success"
                                    style="width: 100%;" readonly>
                              <option selected="selected">UZS</option>
                              <option>USD</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class=" col-md-6">
                        <div><label class="col-form-label"
                                    for="pretensii-currency-exchange-rate-as-of-the-date-of-payment">курс
                            на момент возмещения</label></div>
                        <input type="text"
                               name="currency_exchange_rate"
                               class="form-control client-type-text"
                               id="pretensii-currency-exchange-rate-as-of-the-date-of-payment"
                               value="{{$pretensiiOverview->pretensii->currency_exchange_rate}}"
                               readonly>
                      </div>
                      <div class=" col-md-6">
                        <div><label class="col-form-label"
                                    for="pretensii-total-amount-in-soums">Итого
                            сумма в сумах</label></div>
                        <input type="text" name="total_amount_in_sums"
                               class="form-control client-type-text"
                               id="pretensii-pretensii-total-amount-in-soums"
                               readonly
                               value="{{$pretensiiOverview->pretensii->total_amount_in_sums}}">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label"
                                 for="pretensii-date-of-payment-of-compensation">Дата выплаты
                            компенсации</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Дата</span>
                            </div>
                            <input id="pretensii-date-of-payment-of-compensation"
                                   name="date_of_payment_compensation" type="date"
                                   value="{{$pretensiiOverview->pretensii->date_of_payment_compensation}}"
                                   readonly
                                   class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label" for="pretensii-final-settlement-date">Дата окончательного
                урегулирования</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Дата</span>
                </div>
                <input id="pretensii-final-settlement-date" name="final_settlement_date"
                       value="{{$pretensiiOverview->pretensii->final_settlement_date}}"
                       readonly
                       type="date" class="form-control">
              </div>
            </div>


          </div>

          @foreach($pretensii_overviews as $pretensii_overview)

            @if($pretensiiOverview->id == $pretensii_overview->id)
            @php
            continue;
            @endphp
            @endif
            <div class="form-group">
              <label>Статус претензии</label>
              <div class="row">
                <div class="col-sm-4">
                  <div class="icheck-success">
                    <input type="radio" class="other_insurance-0" name="passed"
                           id="checked{{$pretensii_overview->id}}" value="1"
                           @if ($pretensii_overview->passed)
                           checked
                           @endif
                           disabled
                    >
                    <label for="checked{{$pretensii_overview->id}}">Принять</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="icheck-success">
                    <input type="radio" class="other_insurance-0" name="passed"
                           id="checked{{$pretensii_overview->id}}-2" value="0"
                           @if (!$pretensii_overview->passed)
                           checked
                           @endif
                           disabled
                    >
                    <label for="checked{{$pretensii_overview->id}}-2">Отказать</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label" for="pretensii-final-settlement-date">Комментарий</label>
              <div class="input-group mb-3">
                <input id="pretensii-final-settlement-date" name="comment"
                       value="{{$pretensii_overview->comment}}"
                       readonly
                       type="text" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label" for="pretensii-final-settlement-date">Пользователь</label>
              <div class="input-group mb-3">
                <input id="pretensii-final-settlement-date" name="comment"
                       value="{{$pretensii_overview->user->name}}"
                       readonly
                       type="text" class="form-control">
              </div>
            </div>
          @endforeach

          <form method="post" action="{{ route('pretensii_overview.update', $pretensiiOverview->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Статус претензии</label>
              <div class="row">
                <div class="col-sm-4">
                  <div class="icheck-success">
                    <input type="radio" class="other_insurance-0" name="passed"
                           id="check1" value="1"
                           @if ($pretensiiOverview->passed)
                           checked
                            @endif
                    >
                    <label for="check1">Принять</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="icheck-success">
                    <input type="radio" class="other_insurance-0" name="passed"
                           id="check2" value="0"
                           @if (!$pretensiiOverview->passed)
                           checked
                            @endif
                    >
                    <label for="check2">Отказать</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label" for="pretensii-final-settlement-date">Комментарий</label>
              <div class="input-group mb-3">
                <input id="pretensii-final-settlement-date" name="comment"
                       value="{{$pretensiiOverview->comment}}"
                       type="text" class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>


  </div>
  <!-- /.content -->
@endsection