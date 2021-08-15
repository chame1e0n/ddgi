@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('otvetstvennost_notaries.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
          enctype="multipart/form-data"
          id="form-contract"
          method="POST">
        @csrf

        @if($contract->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6"></div>
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

                    @yield('includes.contract.block.1')

                    @include('includes.client')

                    @include('includes.policies', ['model' => 'PolicyNotary'])

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-notary">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные поля контракта</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contract-notary-geo-zone">
                                            Географическая зона
                                        </label>

                                        <input required
                                               class="form-control @error('contract_notary.geo_zone') is-invalid @enderror"
                                               id="contract-notary-geo-zone"
                                               name="contract_notary[geo_zone]"
                                               type="text"
                                               value="{{old('contract_notary.geo_zone', $contract_notary->geo_zone)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-notary-activity-period-from">
                                            Период деятельности оганизации
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control ddgi-calculate @error('contract_notary.activity_period_from') is-invalid @enderror"
                                                   id="contract-notary-activity-period-from"
                                                   name="contract_notary[activity_period_from]"
                                                   type="date"
                                                   value="{{old('contract_notary.activity_period_from', $contract_notary->activity_period_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-notary-activity-period-to">
                                            &nbsp;
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input class="form-control ddgi-calculate @error('contract_notary.activity_period_to') is-invalid @enderror"
                                                   id="contract-notary-activity-period-to"
                                                   name="contract_notary[activity_period_to]"
                                                   type="date"
                                                   value="{{old('contract_notary.activity_period_to', $contract_notary->activity_period_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-notary-activity-period">
                                            &nbsp;
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">всего:</span>
                                            </div>

                                            <input disabled
                                                   class="form-control"
                                                   id="contract-notary-activity-period"
                                                   type="text"
                                                   value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Состав</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12" id="notary-employees">
                                                    <label class="col-form-label">Сотрудники нотариуса</label>

                                                    <div class="table-responsive"
                                                         style="max-height: 300px;">
                                                        <table class="table table-hover table-head-fixed">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-nowrap">№</th>
                                                                    <th class="text-nowrap">Руководители и старший состав</th>
                                                                    <th class="text-nowrap">Квалифицированный состав</th>
                                                                    <th class="text-nowrap">Другие</th>
                                                                    <th>
                                                                        <div style="margin-bottom: -10px;">
                                                                            <button type="button" class="btn btn-primary ddgi-add-notary-employee">
                                                                                Добавить
                                                                            </button>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($contract_notary->notary_employees as $key => $notary_employee)
                                                                @include('includes.notary_employee_in_table')
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Информация о годовом обороте (за последние 2 года)</h3>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-head-fixed">
                                                <thead>
                                                    <tr>
                                                        <th class="text-nowrap">Год</th>
                                                        <th class="text-nowrap">Оборот</th>
                                                        <th class="text-nowrap">Чистая прибыль</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input required
                                                                   class="form-control @error('contract_notary.annual_turnover_first_year') is-invalid @enderror"
                                                                   id="contract-notary-annual-turnover-first-year"
                                                                   name="contract_notary[annual_turnover_first_year]"
                                                                   step="1"
                                                                   type="number"
                                                                   value="{{old('contract_notary.annual_turnover_first_year', $contract_notary->annual_turnover_first_year)}}" />
                                                        </td>
                                                        <td>
                                                            <input required
                                                                   class="form-control ddgi-calculate @error('contract_notary.annual_turnover_first_money') is-invalid @enderror"
                                                                   id="contract-notary-annual-turnover-first-money"
                                                                   name="contract_notary[annual_turnover_first_money]"
                                                                   step="0.01"
                                                                   type="number"
                                                                   value="{{old('contract_notary.annual_turnover_first_money', $contract_notary->annual_turnover_first_money)}}" />
                                                        </td>
                                                        <td>
                                                            <input required
                                                                   class="form-control ddgi-calculate @error('contract_notary.annual_turnover_first_earnings') is-invalid @enderror"
                                                                   id="contract-notary-annual-turnover-first-earnings"
                                                                   name="contract_notary[annual_turnover_first_earnings]"
                                                                   step="0.01"
                                                                   type="number"
                                                                   value="{{old('contract_notary.annual_turnover_first_earnings', $contract_notary->annual_turnover_first_earnings)}}" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input required
                                                                   class="form-control @error('contract_notary.annual_turnover_second_year') is-invalid @enderror"
                                                                   id="contract-notary-annual-turnover-second-year"
                                                                   name="contract_notary[annual_turnover_second_year]"
                                                                   step="1"
                                                                   type="number"
                                                                   value="{{old('contract_notary.annual_turnover_second_year', $contract_notary->annual_turnover_second_year)}}" />
                                                        </td>
                                                        <td>
                                                            <input required
                                                                   class="form-control ddgi-calculate @error('contract_notary.annual_turnover_second_money') is-invalid @enderror"
                                                                   id="contract-notary-annual-turnover-second-money"
                                                                   name="contract_notary[annual_turnover_second_money]"
                                                                   step="0.01"
                                                                   type="number"
                                                                   value="{{old('contract_notary.annual_turnover_second_money', $contract_notary->annual_turnover_second_money)}}" />
                                                        </td>
                                                        <td>
                                                            <input required
                                                                   class="form-control ddgi-calculate @error('contract_notary.annual_turnover_second_earnings') is-invalid @enderror"
                                                                   id="contract-notary-annual-turnover-second-earnings"
                                                                   name="contract_notary[annual_turnover_second_earnings]"
                                                                   step="0.01"
                                                                   type="number"
                                                                   value="{{old('contract_notary.annual_turnover_second_earnings', $contract_notary->annual_turnover_second_earnings)}}" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right">
                                                            <label class="text-bold">Итого:</label>
                                                        </td>
                                                        <td>
                                                            <input disabled
                                                                   class="form-control"
                                                                   id="annual-turnover-money"
                                                                   type="text"
                                                                   value="" />
                                                        </td>
                                                        <td>
                                                            <input disabled
                                                                   class="form-control"
                                                                   id="annual-turnover-earnings"
                                                                   type="text"
                                                                   value="" />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            Действовали ли Вы в такой или подобной деятельности под другим названием?
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_notary->activity_in_goverment_sector || $contract_notary->activity_in_private_sector) checked @endif
                                                           onclick="toggle('activity', true)"
                                                           type="radio"
                                                           id="radio-activity-yes"
                                                           name="radio_activity"
                                                           value="1" />

                                                    <label for="radio-activity-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!($contract_notary->activity_in_goverment_sector || $contract_notary->activity_in_private_sector)) checked @endif
                                                           onclick="toggle('activity', false)"
                                                           type="radio"
                                                           id="radio-activity-no"
                                                           name="radio_activity"
                                                           value="0" />

                                                    <label for="radio-activity-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="activity"
                                         @if(!($contract_notary->activity_in_goverment_sector || $contract_notary->activity_in_private_sector)) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">В государственном секторе</span>
                                                        </div>

                                                        <textarea class="form-control @if($errors->has('contract_notary.activity_in_goverment_sector')) is-invalid @endif"
                                                                  id="contract-notary-activity-in-goverment-sector"
                                                                  name="contract_notary[activity_in_goverment_sector]">{{old('contract_notary.activity_in_goverment_sector', $contract_notary->activity_in_goverment_sector)}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">В частном секторе</span>
                                                        </div>

                                                        <textarea class="form-control @if($errors->has('contract_notary.activity_in_private_sector')) is-invalid @endif"
                                                                  id="contract-notary-activity-in-private-sector"
                                                                  name="contract_notary[activity_in_private_sector]">{{old('contract_notary.activity_in_private_sector', $contract_notary->activity_in_private_sector)}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contract-notary-personal-activity-risk">
                                            Риски, связанные с вашей профессиональной деятельностью, которые Вы опасаетесь больше всего
                                        </label>

                                        <input class="form-control @error('contract_notary.personal_activity_risk') is-invalid @enderror"
                                               id="contract-notary-personal-activity-risk"
                                               name="contract_notary[personal_activity_risk]"
                                               type="text"
                                               value="{{old('contract_notary.personal_activity_risk', $contract_notary->personal_activity_risk)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contract-notary-claim-filing-reason">
                                            Были ли в Вашей практике случаи, когда Вам была предъявлена претензия или иск?
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_notary->claim_filing_reason) checked @endif
                                                           onclick="toggle('claim-filing-reason', true)"
                                                           type="radio"
                                                           id="radio-claim-filing-reason-yes"
                                                           name="radio_claim_filing_reason"
                                                           value="1" />

                                                    <label for="radio-claim-filing-reason-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_notary->claim_filing_reason) checked @endif
                                                           onclick="toggle('claim-filing-reason', false)"
                                                           type="radio"
                                                           id="radio-claim-filing-reason-no"
                                                           name="radio_claim_filing_reason"
                                                           value="0" />

                                                    <label for="radio-claim-filing-reason-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="claim-filing-reason"
                                         @if(!$contract_notary->claim_filing_reason) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Причина</span>
                                                        </div>

                                                        <textarea class="form-control @if($errors->has('contract_notary.claim_filing_reason')) is-invalid @endif"
                                                                  id="contract-notary-claim-filing-reason"
                                                                  name="contract_notary[claim_filing_reason]">{{old('contract_notary.claim_filing_reason', $contract_notary->claim_filing_reason)}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            Были ли в Вашей практике случаи, когда к Вам были применены административные взыскания?
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_notary->administrative_penalty_filing_reason) checked @endif
                                                           onclick="toggle('administrative-penalty-filing-reason', true)"
                                                           type="radio"
                                                           id="radio-administrative-penalty-filing-reason-yes"
                                                           name="radio_administrative_penalty_filing_reason"
                                                           value="1" />

                                                    <label for="radio-administrative-penalty-filing-reason-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_notary->administrative_penalty_filing_reason) checked @endif
                                                           onclick="toggle('administrative-penalty-filing-reason', false)"
                                                           type="radio"
                                                           id="radio-administrative-penalty-filing-reason-no"
                                                           name="radio_administrative_penalty_filing_reason"
                                                           value="0" />

                                                    <label for="radio-administrative-penalty-filing-reason-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="administrative-penalty-filing-reason"
                                         @if(!$contract_notary->administrative_penalty_filing_reason) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Причина</span>
                                                        </div>

                                                        <textarea class="form-control @if($errors->has('contract_notary.administrative_penalty_filing_reason')) is-invalid @endif"
                                                                  id="contract-notary-administrative-penalty-filing-reason"
                                                                  name="contract_notary[administrative_penalty_filing_reason]">{{old('contract_notary.administrative_penalty_filing_reason', $contract_notary->administrative_penalty_filing_reason)}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contract-notary-professional-activity-insurance">
                                            Сфера вашей профессиональной деятельности, в страховании которых, Вы нуждаетесь
                                        </label>

                                        <select class="form-control @error('contract_notary.professional_activity_insurance') is-invalid @enderror"
                                                id="contract-notary-professional-activity-insurance"
                                                name="contract_notary[professional_activity_insurance]">
                                            <option></option>

                                            @foreach(\App\Model\ContractNotary::$professional_activity_insurances as $value => $label)
                                                <option @if($value == old('contract_notary.professional_activity_insurance', $contract_notary->professional_activity_insurance)) selected="selected" @endif
                                                        value="{{$value}}">
                                                    {{$label}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contract-notary-required-responsibility-limit">
                                            Запрашиваемый лимит ответственности
                                        </label>

                                        <select class="form-control @error('contract_notary.required_responsibility_limit') is-invalid @enderror"
                                                id="contract-notary-required-responsibility-limit"
                                                name="contract_notary[required_responsibility_limit]">
                                            <option></option>

                                            @foreach(\App\Model\ContractNotary::$required_responsibility_limits as $value => $label)
                                                <option @if($value == old('contract_notary.required_responsibility_limit', $contract_notary->required_responsibility_limit)) selected="selected" @endif
                                                        value="{{$value}}">
                                                    {{$label}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="files-document" class="col-form-label">
                                            Загрузка необходимых документов
                                        </label>

                                        @foreach($contract_notary->getFiles(\App\Model\ContractNotary::FILE_DOCUMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.document') is-invalid @enderror"
                                               id="files-document"
                                               name="files[document][]"
                                               type="file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('includes.contract.block.3')

                    @yield('includes.contract.block.4')
                </section>
            </div>

            @if(!$block)
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" id="form-save-button">
                        {{$contract->exists ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            @endif
        </fieldset>
    </form>
@endsection