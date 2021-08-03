@extends('layouts.index')

@section('content')
    <form action="{{route('singular_export.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @include('includes.contract')

                    @include('includes.client')

                    @include('includes.customer')

                    @include('includes.guarantor')

                    <div class="card card-info" id="contract-singular-export-cargo">
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
                                <div class="col-md-3">
                                    <label for="contract-singular-export-cargo-waiting-period" class="col-form-label">
                                        Период ожидания
                                    </label>

                                    <select required
                                            class="form-control @error('contract_singular_export_cargo.waiting_period') is-invalid @enderror"
                                            id="contract-singular-export-cargo-waiting-period"
                                            name="contract_singular_export_cargo[waiting_period]"
                                            style="width: 100%;">
                                        @foreach(\App\Model\ContractSingularExportCargo::$waiting_periods as $key => $value)
                                            <option @if($key == old('contract_singular_export_cargo.waiting_period', $contract_singular_export_cargo->waiting_period)) selected @endif
                                                    value="{{$key}}">
                                                {{$value}}
                                            </option> 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-agreement-goods-list" class="col-form-label">
                                            Товары по контракту
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.agreement_goods_list') is-invalid @enderror"
                                               id="contract-singular-export-cargo-agreement-goods-list"
                                               name="contract_singular_export_cargo[agreement_goods_list]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.agreement_goods_list', $contract_singular_export_cargo->agreement_goods_list)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="contract-singular-export-cargo-agreement-goods-type" class="col-form-label">
                                        Тип товаров по контракту
                                    </label>

                                    <select required
                                            class="form-control @error('contract_singular_export_cargo.agreement_goods_type') is-invalid @enderror"
                                            id="contract-singular-export-cargo-agreement-goods-type"
                                            name="contract_singular_export_cargo[agreement_goods_type]"
                                            style="width: 100%;">
                                        @foreach(\App\Model\ContractSingularExportCargo::$agreement_goods_types as $key => $value)
                                            <option @if($key == old('contract_singular_export_cargo.agreement_goods_type', $contract_singular_export_cargo->agreement_goods_type)) selected @endif
                                                    value="{{$key}}">
                                                {{$value}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-shipping-date" class="col-form-label">
                                            Дата отгрузки
                                        </label>

                                        <input required
                                               class="form-control @error('contract_singular_export_cargo.shipping_date') is-invalid @enderror"
                                               id="contract-singular-export-cargo-shipping-date"
                                               name="contract_singular_export_cargo[shipping_date]"
                                               type="date"
                                               value="{{old('contract_singular_export_cargo.shipping_date', $contract_singular_export_cargo->shipping_date)}}" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-failuer-reason" class="col-form-label">
                                            Причина неисполнения обязательств покупателя перед страхователем
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.failuer_reason') is-invalid @enderror"
                                               id="contract-singular-export-cargo-failuer-reason"
                                               name="contract_singular_export_cargo[failuer_reason]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.failuer_reason', $contract_singular_export_cargo->failuer_reason)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-insurance-country" class="col-form-label">
                                            Страна действия страхового покрытия
                                        </label>

                                        <input required
                                               class="form-control @error('contract_singular_export_cargo.insurance_country') is-invalid @enderror"
                                               id="contract-singular-export-cargo-insurance-country"
                                               name="contract_singular_export_cargo[insurance_country]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.insurance_country', $contract_singular_export_cargo->insurance_country)}}" />
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-reason-description" class="col-form-label">
                                            Описание причины
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.reason_description') is-invalid @enderror"
                                               id="contract-singular-export-cargo-reason-description"
                                               name="contract_singular_export_cargo[reason_description]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.reason_description', $contract_singular_export_cargo->reason_description)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-summary-date" class="col-form-label">
                                            Дата сводки
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.summary_date') is-invalid @enderror"
                                               id="contract-singular-export-cargo-summary-date"
                                               name="contract_singular_export_cargo[summary_date]"
                                               type="date"
                                               value="{{old('contract_singular_export_cargo.summary_date', $contract_singular_export_cargo->summary_date)}}" />
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-shipped-goods-value" class="col-form-label">
                                            Стоимость отгруженного товара
                                        </label>

                                        <input required
                                               class="form-control ddgi-calculate @error('contract_singular_export_cargo.shipped_goods_value') is-invalid @enderror"
                                               id="contract-singular-export-cargo-shipped-goods-value"
                                               name="contract_singular_export_cargo[shipped_goods_value]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.shipped_goods_value', $contract_singular_export_cargo->shipped_goods_value)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-shipped-goods-paid" class="col-form-label">
                                            Из них оплачено покупателем
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.shipped_goods_paid') is-invalid @enderror"
                                               id="contract-singular-export-cargo-shipped-goods-paid"
                                               name="contract_singular_export_cargo[shipped_goods_paid]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.shipped_goods_paid', $contract_singular_export_cargo->shipped_goods_paid)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-buyer-debt" class="col-form-label">
                                            Суммы задолженности покупателя перед страхователем
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.buyer_debt') is-invalid @enderror"
                                               id="contract-singular-export-cargo-buyer-debt"
                                               name="contract_singular_export_cargo[buyer_debt]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.buyer_debt', $contract_singular_export_cargo->buyer_debt)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-overdue-amount-1-60" class="col-form-label">
                                            Суммы просроченные от 1 до 60 дней
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.overdue_amount_1_60') is-invalid @enderror"
                                               id="contract-singular-export-cargo-overdue-amount-1-60"
                                               name="contract_singular_export_cargo[overdue_amount_1_60]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.overdue_amount_1_60', $contract_singular_export_cargo->overdue_amount_1_60)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-overdue-amount-60-180" class="col-form-label">
                                            Суммы просроченные от 60 до 180 дней
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.overdue_amount_60_180') is-invalid @enderror"
                                               id="contract-singular-export-cargo-overdue-amount-60-180"
                                               name="contract_singular_export_cargo[overdue_amount_60_180]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.overdue_amount_60_180', $contract_singular_export_cargo->overdue_amount_60_180)}}" />
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-paid-insurance-premium" class="col-form-label">
                                            Оплаченная страховая премия
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.paid_insurance_premium') is-invalid @enderror"
                                               id="contract-singular-export-cargo-paid-insurance-premium"
                                               name="contract_singular_export_cargo[paid_insurance_premium]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.paid_insurance_premium', $contract_singular_export_cargo->paid_insurance_premium)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-penalty" class="col-form-label">
                                            Штрафы, пении
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.penalty') is-invalid @enderror"
                                               id="contract-singular-export-cargo-penalty"
                                               name="contract_singular_export_cargo[penalty]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.penalty', $contract_singular_export_cargo->penalty)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-other-expenses" class="col-form-label">
                                            Прочие расходы
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.other_expenses') is-invalid @enderror"
                                               id="contract-singular-export-cargo-other-expenses"
                                               name="contract_singular_export_cargo[other_expenses]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.other_expenses', $contract_singular_export_cargo->other_expenses)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-shipped-goods-payment" class="col-form-label">
                                            Суммы полученные из любых источников в качестве платежа за надлежащие отгруженные товары, включая реализацию любой формы обеспечения
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.shipped_goods_payment') is-invalid @enderror"
                                               id="contract-singular-export-cargo-shipped-goods-payment"
                                               name="contract_singular_export_cargo[shipped_goods_payment]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.shipped_goods_payment', $contract_singular_export_cargo->shipped_goods_payment)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-unshipped-goods-payment" class="col-form-label">
                                            Инвойсная стоимость товаров по контракту, которые не были отгружены или доставлены или приняты покупателем, или были возвращены покупателем страхователю или возмещены покупателем после предъявления претензии страхователем до возмещения убытка
                                        </label>

                                        <input class="form-control ddgi-calculate @error('contract_singular_export_cargo.unshipped_goods_payment') is-invalid @enderror"
                                               id="contract-singular-export-cargo-unshipped-goods-payment"
                                               name="contract_singular_export_cargo[unshipped_goods_payment]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.unshipped_goods_payment', $contract_singular_export_cargo->unshipped_goods_payment)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <strong>Всего убыток</strong>: <span id="contract-export-cargo-total"></span>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-invoices" class="col-form-label">
                                            Инвойсы
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.invoices') is-invalid @enderror"
                                               id="contract-singular-export-cargo-invoices"
                                               name="contract_singular_export_cargo[invoices]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.invoices', $contract_singular_export_cargo->invoices)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-company-experience" class="col-form-label">
                                            Опыт компании с покупателем
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.company_experience') is-invalid @enderror"
                                               id="contract-singular-export-cargo-company-experience"
                                               name="contract_singular_export_cargo[company_experience]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.company_experience', $contract_singular_export_cargo->company_experience)}}" />
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="files-invoice" class="col-form-label">
                                            Накладные
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_INVOICE) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.invoice') is-invalid @enderror"
                                               id="files-invoice"
                                               name="files[invoice][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="files-bank-statement" class="col-form-label">
                                            Выписки из банка
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_BANK_STATEMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.bank_statement') is-invalid @enderror"
                                               id="files-bank-statement"
                                               name="files[bank_statement][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="files-payment-document" class="col-form-label">
                                            Платежные документы
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_PAYMENT_DOCUMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.payment_document') is-invalid @enderror"
                                               id="files-payment-document"
                                               name="files[payment_document][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="files-payment-request-document" class="col-form-label">
                                            Документы о платежном требовании cтрахователя по погашению долга
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_PAYMENT_REQUEST_DOCUMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.payment_request_document') is-invalid @enderror"
                                               id="files-payment-request-document"
                                               name="files[payment_request_document][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="files-correspondence" class="col-form-label">
                                            Корреспонденция с дебитором, покупателем, агентом
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_CORRESPONDENCE) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.correspondence') is-invalid @enderror"
                                               id="files-correspondence"
                                               name="files[correspondence][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-sales-ledger" class="col-form-label">
                                            Бух. книги о продажи
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_SALES_LEDGER) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.sales_ledger') is-invalid @enderror"
                                               id="files-sales-ledger"
                                               name="files[sales_ledger][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-unpaid-invoice" class="col-form-label">
                                            Неоплаченные инвойсы
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_UNPAID_INVOICE) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.unpaid_invoice') is-invalid @enderror"
                                               id="files-unpaid-invoice"
                                               name="files[unpaid_invoice][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-warranty-document" class="col-form-label">
                                            Детали гарантии
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_WARRANTY_DOCUMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.warranty_document') is-invalid @enderror"
                                               id="files-warranty-document"
                                               name="files[warranty_document][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-another-loss-document" class="col-form-label">
                                            Другие убытки
                                        </label>

                                        @foreach($contract_singular_export_cargo->getFiles(\App\Model\ContractSingularExportCargo::FILE_ANOTHER_LOSS_DOCUMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.another_loss_document') is-invalid @enderror"
                                               id="files-another-loss-document"
                                               name="files[another_loss_document][]"
                                               type="file" />
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_no_disputes) checked @endif
                                               id="contract-singular-export-cargo-is-no-disputes"
                                               name="contract_singular_export_cargo[is_no_disputes]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-no-disputes">
                                            Не имеется неразрешенных споров или вопросов между Страхователем и Покупателем
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_no_commit) checked @endif
                                               id="contract-singular-export-cargo-is-no-commit"
                                               name="contract_singular_export_cargo[is_no_commit]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-no-commit">
                                            За исключением скидок покупатель не предоставлял или платил, не допускал возможных в будущем обязательств производить оплату любой скидки, комиссии, гонорара или других платежей страхователю, предоставляющему отсрочку оплаты за товар
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_follow) checked @endif
                                               id="contract-singular-export-cargo-is-follow"
                                               name="contract_singular_export_cargo[is_follow]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-follow">
                                            Страхователь/Покупатель осуществлял деятельность в соответствии со сроками и условиями договора страхования, по которому предъявляется требование по возмещению убытка
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_guarantee) checked @endif
                                               id="contract-singular-export-cargo-is-guarantee"
                                               name="contract_singular_export_cargo[is_guarantee]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-guarantee">
                                            Страхователь гарантирует и заявляет, что информация, представленная здесь, достоверна и что существенные факты, касающиеся данного убытка, не были утеряны
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_paid_to_policyholder) checked @endif
                                               id="contract-singular-export-cargo-is-paid-to-policyholder"
                                               name="contract_singular_export_cargo[is_paid_to_policyholder]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-paid-to-policyholder">
                                            Страховое возмещение в сумме выплачивается страхователю
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_an_obligation) checked @endif
                                               id="contract-singular-export-cargo-is-an-obligation"
                                               name="contract_singular_export_cargo[is_an_obligation]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-an-obligation">
                                            Существует действительное и имеющее исковую силу обязательство покупателя, получившего товар
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_agree_to_provide_info) checked @endif
                                               id="contract-singular-export-cargo-is-agree-to-provide-info"
                                               name="contract_singular_export_cargo[is_agree_to_provide_info]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-agree-to-provide-info">
                                            В случае необходимости, страхователь согласен предоставить дополнительную информацию по первому требованию страховщика
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_completed_sales) checked @endif
                                               id="contract-singular-export-cargo-is-completed-sales"
                                               name="contract_singular_export_cargo[is_completed_sales]"
                                               onchange="toggleSwitch(this, 'contract-singular-export-cargo-completed-sales-reason')"
                                               type="checkbox" />

                                        <label class="form-check-label" for="contract-singular-export-cargo-is-completed-sales">
                                            Осуществлялись ли ранее продажи данному покупателю на условиях отсрочки платежа?
                                        </label>
                                    </div>
                                    <div class="form-group"
                                         id="contract-singular-export-cargo-completed-sales-reason"
                                         @if(!$contract_singular_export_cargo->is_completed_sales) style="display: none;" @endif>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Опишите причину:</span>
                                            </div>

                                            <input class="form-control @error('contract_singular_export_cargo.completed_sales_reason') is-invalid @enderror"
                                                   id="contract-singular-export-cargo-completed-sales-reason"
                                                   name="contract_singular_export_cargo[completed_sales_reason]"
                                                   type="text"
                                                   value="{{old('contract_singular_export_cargo.completed_sales_reason', $contract_singular_export_cargo->completed_sales_reason)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_extended_changed) checked @endif
                                               id="contract-singular-export-cargo-is-extended-changed"
                                               name="contract_singular_export_cargo[is_extended_changed]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-extended-changed">
                                            Расширялся или изменялся ли график даты платежа поставляемого товара для покупателей (в том числе и для данного покупателя) и, изменились ли условия платежа после отгрузки товаров покупателям и в частности данному покупателю
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_have_info) checked @endif
                                               id="contract-singular-export-cargo-is-have-info"
                                               name="contract_singular_export_cargo[is_have_info]"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-have-info">
                                            Располагаете ли вы информацией о невыполнении обязательств покупателем, изменении графика поставок или переговорах о долгах со стороны покупателя в связи с другими поставщиками
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_singular_export_cargo->is_have_ensuring_forms) checked @endif
                                               id="contract-singular-export-cargo-is-have-ensuring-forms"
                                               name="contract_singular_export_cargo[is_have_ensuring_forms]"
                                               onchange="toggleSwitch(this, 'contract-singular-export-cargo-is')"
                                               type="checkbox" />

                                        <label for="contract-singular-export-cargo-is-have-ensuring-forms">
                                            Располагаете или планируете использовать любые формы обеспечения в связи с данным покупателем: гарантия правительства, государственной организации, банка, аккредитив, поручительства третьих лиц, право ареста имущества в связи с долгами покупателя, личные гарантии и т.д.
                                        </label>
                                    </div>
                                    <div class="form-group"
                                         id="contract-singular-export-cargo-is"
                                         @if(!$contract_singular_export_cargo->is_have_ensuring_forms) style="display: none;" @endif>
                                        <div class="offset-md-1 col-md-11">
                                            <div class="icheck-success ">
                                                <input @if($contract_singular_export_cargo->is_required) checked @endif
                                                       id="contract-singular-export-cargo-is-required"
                                                       name="contract_singular_export_cargo[is_required]"
                                                       type="checkbox" />

                                                <label for="contract-singular-export-cargo-is-required">
                                                    Были ли они запрошены?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="offset-md-1 col-md-11">
                                            <div class="icheck-success ">
                                                <input @if($contract_singular_export_cargo->is_received) checked @endif
                                                       id="contract-singular-export-cargo-is-received"
                                                       name="contract_singular_export_cargo[is_received]"
                                                       type="checkbox" />

                                                <label for="contract-singular-export-cargo-is-received">
                                                    Были ли они получены?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">
                                        Если предполагается использовать в качестве гарантии аккредитив, укажите
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-credit-letter-bank-open" class="col-form-label">
                                            Банк, открывающий аккредитив
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.credit_letter_bank_open') is-invalid @enderror"
                                               id="contract-singular-export-cargo-credit-letter-bank-open"
                                               name="contract_singular_export_cargo[credit_letter_bank_open]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.credit_letter_bank_open', $contract_singular_export_cargo->credit_letter_bank_open)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-credit-letter-bank-confirm" class="col-form-label">
                                            Банк, подтверждающий аккредитив
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.credit_letter_bank_confirm') is-invalid @enderror"
                                               id="contract-singular-export-cargo-credit-letter-bank-confirm"
                                               name="contract_singular_export_cargo[credit_letter_bank_confirm]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.credit_letter_bank_confirm', $contract_singular_export_cargo->credit_letter_bank_confirm)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-credit-letter-sum" class="col-form-label">
                                            Сумма аккредитива
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.credit_letter_sum') is-invalid @enderror"
                                               id="contract-singular-export-cargo-credit-letter-sum"
                                               name="contract_singular_export_cargo[credit_letter_sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_singular_export_cargo.credit_letter_sum', $contract_singular_export_cargo->credit_letter_sum)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-credit-letter-form" class="col-form-label">
                                            Форма аккредитива
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.credit_letter_form') is-invalid @enderror"
                                               id="contract-singular-export-cargo-credit-letter-form"
                                               name="contract_singular_export_cargo[credit_letter_form]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.credit_letter_form', $contract_singular_export_cargo->credit_letter_form)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-singular-export-cargo-credit-letter-view" class="col-form-label">
                                            Вид аккредитива
                                        </label>

                                        <input class="form-control @error('contract_singular_export_cargo.credit_letter_view') is-invalid @enderror"
                                               id="contract-singular-export-cargo-credit-letter-view"
                                               name="contract_singular_export_cargo[credit_letter_view]"
                                               type="text"
                                               value="{{old('contract_singular_export_cargo.credit_letter_view', $contract_singular_export_cargo->credit_letter_view)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policy_in_section')
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            function calculation() {
                let is_tariff = document.getElementById('contract-tariff-switch').checked;
                let is_premium = document.getElementById('contract-premium-switch').checked;

                let from = new Date($('#contract-from').val());
                let to = new Date($('#contract-to').val());
                let days = Math.round((to - from) / (24 * 60 * 60 * 1000)) + 1;

                let total_insurance_value = 0;
                let total_insurance_sum = 0;
                let total_insurance_premium = 0;
                let total_franchise = 0;

                // -- contract_(singular|singular)_export_cargo
                let contract_export_cargo_total = Number($('#contract-singular-export-cargo-shipped-goods-value').val()) +
                                                  Number($('#contract-singular-export-cargo-shipped-goods-paid').val()) +
                                                  Number($('#contract-singular-export-cargo-buyer-debt').val()) +
                                                  Number($('#contract-singular-export-cargo-overdue-amount-1-60').val()) +
                                                  Number($('#contract-singular-export-cargo-overdue-amount-60-180').val()) +
                                                  Number($('#contract-singular-export-cargo-paid-insurance-premium').val()) +
                                                  Number($('#contract-singular-export-cargo-penalty').val()) +
                                                  Number($('#contract-singular-export-cargo-other-expenses').val()) +
                                                  Number($('#contract-singular-export-cargo-shipped-goods-payment').val()) +
                                                  Number($('#contract-singular-export-cargo-unshipped-goods-payment').val())

                $('#contract-export-cargo-total').text(contract_export_cargo_total.toFixed(2));

                $('#policy').find('div.card-body').each(function (i, element) {
                    let insurance_premium = 0;
                    let policy_insurance_sum = Number($('#policy-insurance-sum').val());

                    if (!is_tariff && !is_premium) {
                        let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};

                        insurance_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_tariff) {
                        let tariff = $('#contract-tariff').val();

                        insurance_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_premium) {
                        insurance_premium = Number($('#contract-premium').val());
                    }

                    $('#insurance-premium').val(insurance_premium.toFixed(2));
                });
                $('#policies').find('tbody > tr[id^=policy-row-]').each(function (i, element) {
                    let number = element.id.replace('policy-row-', '');

                    if (number == 'total') {
                        $('#total-insurance-sum').val(total_insurance_sum.toFixed(2));
                        $('#total-insurance-premium').val(total_insurance_premium.toFixed(2));
                        $('#total-franchise').val(total_franchise.toFixed(2));

                        return;
                    }

                    let policy_insurance_sum = Number($('#policies-' + number + '-insurance-sum').val());
                    let policy_additional_sum = 0;
                    let policy_additional_premium = 0;

                    // -- policy_sportsman --
                    let policy_sportsman_sum = Number($('#policies-' + number + '-policy-sportsman-traumatic-sum').val()) + Number($('#policies-' + number + '-policy-sportsman-death-sum').val());

                    if (!window.isNaN(policy_sportsman_sum)) {
                        policy_additional_sum += policy_sportsman_sum;
                    }

                    $('#policies-' + number + '-policy-sportsman-total-sum').val(policy_additional_sum);

                    let policy_sportsman_premium = Number($('#policies-' + number + '-policy-sportsman-traumatic-premium').val()) + Number($('#policies-' + number + '-policy-sportsman-death-premium').val());

                    if (!window.isNaN(policy_sportsman_premium)) {
                        policy_additional_premium += policy_sportsman_premium;
                    }

                    $('#policies-' + number + '-policy-sportsman-total-premium').val(policy_additional_premium);

                    // -- policy_casco --
                    $('#policies-' + number + '-policy-casco-ec-driver-sum').val(Number($('#policies-' + number + '-policy-casco-ec-driver-amount').val()) * Number($('#policies-' + number + '-policy-casco-ec-driver-sum-for-person').val()));
                    $('#policies-' + number + '-policy-casco-ec-passenger-sum').val(Number($('#policies-' + number + '-policy-casco-ec-passenger-amount').val()) * Number($('#policies-' + number + '-policy-casco-ec-passenger-sum-for-person').val()));
                    $('#policies-' + number + '-policy-casco-ec-general-limit-sum').val(Number($('#policies-' + number + '-policy-casco-ec-general-limit-amount').val()) * Number($('#policies-' + number + '-policy-casco-ec-general-limit-sum-for-person').val()));

                    $('#policies-' + number + '-policy-casco-ec-total-sum').val(Number($('#policies-' + number + '-policy-casco-ec-driver-sum').val()) + Number($('#policies-' + number + '-policy-casco-ec-passenger-sum').val()) + Number($('#policies-' + number + '-policy-casco-ec-general-limit-sum').val()));
                    $('#policies-' + number + '-policy-casco-ec-total-premium').val(Number($('#policies-' + number + '-policy-casco-ec-driver-premium').val()) + Number($('#policies-' + number + '-policy-casco-ec-passenger-premium').val()) + Number($('#policies-' + number + '-policy-casco-ec-general-limit-premium').val()));

                    let policy_casco_ae_additional_insured_sum = Number($('#policies-' + number + '-policy-casco-ae-additional-insured-sum').val());
                    let policy_casco_ec_vehicle_death_recovery_sum = Number($('#policies-' + number + '-policy-casco-ec-vehicle-death-recovery-sum').val());
                    let policy_casco_ec_civil_liability_sum = Number($('#policies-' + number + '-policy-casco-ec-civil-liability-sum').val());
                    let policy_casco_ec_total_sum = Number($('#policies-' + number + '-policy-casco-ec-total-sum').val());

                    policy_casco_sum = policy_casco_ae_additional_insured_sum + policy_casco_ec_vehicle_death_recovery_sum + policy_casco_ec_civil_liability_sum + policy_casco_ec_total_sum;

                    $('#policies-' + number + '-policy-casco-total-sum').val(policy_casco_sum.toFixed(2));

                    if (!window.isNaN(policy_casco_sum)) {
                        policy_additional_sum += policy_casco_sum;
                    }

                    let policy_casco_ec_vehicle_death_recovery_premium = Number($('#policies-' + number + '-policy-casco-ec-vehicle-death-recovery-premium').val());
                    let policy_casco_ec_civil_liability_premium = Number($('#policies-' + number + '-policy-casco-ec-civil-liability-premium').val());
                    let policy_casco_ec_total_premium = Number($('#policies-' + number + '-policy-casco-ec-total-premium').val());

                    policy_casco_premium = policy_casco_ec_vehicle_death_recovery_premium + policy_casco_ec_civil_liability_premium + policy_casco_ec_total_premium;

                    $('#policies-' + number + '-policy-casco-total-premium').val(policy_casco_premium.toFixed(2));

                    if (!window.isNaN(policy_casco_premium)) {
                        policy_additional_premium += policy_casco_premium;
                    }

                    // -- policy --
                    $('#policies-' + number + '-insurance-sum-plus').text('+ ' + policy_additional_sum.toFixed(2));
                    $('#policies-' + number + '-insurance-premium-plus').text('+ ' + policy_additional_premium.toFixed(2));

                    let policy_premium = 0;

                    if (!is_tariff && !is_premium) {
                        let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};

                        policy_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_tariff) {
                        let tariff = $('#contract-tariff').val();

                        policy_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_premium) {
                        policy_premium = Number($('#contract-premium').val());
                    }

                    $('#policies-' + number + '-insurance-premium').val(policy_premium);

                    total_insurance_sum += policy_insurance_sum + policy_additional_sum;
                    total_insurance_premium += policy_premium + policy_additional_premium;
                    total_franchise += Number($('#policies-' + number + '-franchise').val());
                });
                $('#properties').find('tbody > tr[id^=property-row-]').each(function (i, element) {
                    let number = element.id.replace('property-row-', '');

                    if (number == 'total') {
                        $('#total-insurance-value').val(total_insurance_value.toFixed(2));
                        $('#total-insurance-sum').val(total_insurance_sum.toFixed(2));
                        $('#total-insurance-premium').val(total_insurance_premium.toFixed(2));

                        return;
                    }

                    let property_insurance_sum = Number($('#properties-' + number + '-insurance-sum').val());

                    let property_premium = 0;

                    if (!is_tariff && !is_premium) {
                        let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};

                        property_premium = (days * property_insurance_sum * tariff) / 365;
                    }
                    if (is_tariff) {
                        let tariff = $('#contract-tariff').val();

                        property_premium = (days * property_insurance_sum * tariff) / 365;
                    }
                    if (is_premium) {
                        property_premium = Number($('#contract-premium').val());
                    }

                    $('#properties-' + number + '-insurance-premium').val(property_premium);

                    total_insurance_value += Number($('#properties-' + number + '-insurance-value').val());
                    total_insurance_sum += property_insurance_sum;
                    total_insurance_premium += property_premium
                });
            }
            function addPolicy() {
                let counter = document.getElementById('policies').querySelector('tbody').childElementCount - 1;

                while(document.getElementById('policy-row-' + counter)) {
                    counter++;
                }

                $.ajax({
                    url: '{{route("get_policy_for_table")}}',
                    type: 'post',
                    data: { key: counter, model: null },
                    dataType: 'json',
                    success: function (response) {
                        document.getElementById('policy-row-total').insertAdjacentHTML('beforebegin', response.template);
                    },
                    error: function (data) {
                        console.log('get policy template error', data);
                    }
                });
            }
            function removePolicy(event) {
                if (event.target.classList.contains('ddgi-remove-policy')) {
                    event.target.parentElement.parentElement.remove();

                    calculation();
                }
            }
            function addProperty() {
                let counter = document.getElementById('properties').querySelector('tbody').childElementCount - 1;

                while(document.getElementById('property-row-' + counter)) {
                    counter++;
                }

                $.ajax({
                    url: '{{route("get_property_for_table")}}',
                    type: 'post',
                    data: { key: counter },
                    dataType: 'json',
                    success: function (response) {
                        document.getElementById('property-row-total').insertAdjacentHTML('beforebegin', response.template);
                    },
                    error: function (data) {
                        console.log('get property template error', data);
                    }
                });
            }
            function removeProperty(event) {
                if (event.target.classList.contains('ddgi-remove-property')) {
                    event.target.parentElement.parentElement.remove();

                    calculation();
                }
            }
            function definePolicySeries() {
                let series = document.getElementById(this.id.replace('name', 'series'));

                $.ajax({
                    url: '{{route("get_policies")}}',
                    type: 'get',
                    data: { name: $(this).val() },
                    dataType: 'json',
                    success: function (response) {
                        $(series).empty();
                        $(series).append('<option></option>');

                        for (var i = 0; i < response.length; i++) {
                            $(series).append('<option value="' + response[i]['series']+ '">' + response[i]['series'] + '</option>');
                        }
                    }
                });
            }
            function defineResponsiblePerson() {
                let name = document.getElementById(this.id.replace('series', 'name'));
                let responsible_person = document.getElementById(this.id.replace('series', 'responsible-person'));

                $.ajax({
                    url: '{{route("get_policy_employee")}}',
                    type: 'get',
                    data: { name: $(name).val(), series: $(this).val() },
                    dataType: 'json',
                    success: function (response) {
                        $(responsible_person).val(response.surname + ' ' + response.name + ' ' + response.middlename);
                    }
                });
            }

            $('#form-contract').delegate('.ddgi-calculate', 'change', calculation);

            $('#policies').delegate('.ddgi-add-policy', 'click', addPolicy);
            $('#policies').delegate('.ddgi-remove-policy', 'click', removePolicy);

            $('#policies, #policy').delegate('.ddgi-policy-name', 'change', definePolicySeries);
            $('#policies, #policy').delegate('.ddgi-policy-series', 'change', defineResponsiblePerson);

            $('.ddgi-policy-name').trigger('keyup');        // для show метода при загрузке страницы
            $('.ddgi-policy-series').trigger('change');     // для show метода при загрузке страницы
            $('.ddgi-calculate').trigger('change');         // для show метода при загрузке страницы

            $('#properties').delegate('.ddgi-add-property', 'click', addProperty);
            $('#properties').delegate('.ddgi-remove-property', 'click', removeProperty);

            $('form').submit(function(e) {
                $(':disabled').each(function(e) {
                    $(this).removeAttr('disabled');
                })
            });
        });
    </script>

    @yield('contract_js')
@endsection
