@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('report.regions')}}">Отчеты</a></li>
                            <li class="breadcrumb-item active">Сведения по областям</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            @include('includes.messages')

            <form action="{{route('report.regions')}}"
                  id="report"
                  method="GET">
                <div class="card card-success" id="report-filter">
                    <div class="card-header">
                        <h3 class="card-title">Фильтр</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="regions-time">Отчетность за</label>

                                <select class="form-control"
                                        id="regions-time"
                                        onchange="defineRegionsTime(this)">
                                    <option value="nothing"></option>
                                    <option value="month">последний месяц</option>
                                    <option value="quarter">последний квартал</option>
                                    <option value="half">последнее полугодие</option>
                                    <option value="year">последний год</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="regions-from">Дата</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>

                                        <input required
                                               class="form-control @error('regions.from') is-invalid @enderror"
                                               id="regions-from"
                                               name="regions[from]"
                                               type="date"
                                               value="{{old('regions.from', $from)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="regions-to">Дата</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>

                                        <input required
                                               class="form-control @error('regions.to') is-invalid @enderror"
                                               id="regions-to"
                                               name="regions[to]"
                                               type="date"
                                               value="{{old('regions.to', $to)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <button class="btn btn-primary float-right"
                                            name="regions[action]"
                                            style="margin-top: 32px;"
                                            type="submit"
                                            value="filter">
                                        Фильтр
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-info" id="report-contracts">
                    <div class="card-header">
                        <h3 class="card-title">Количество договоров страхования (шт.)</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <div class="card-tools">
                            <button class="btn btn-success float-right"
                                    name="regions[action]"
                                    style="margin-right: 20px;"
                                    type="submit"
                                    value="report-1">
                                Скачать
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table small text-center table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col" rowspan="2">наименование регионов</th>
                                            <th scope="col" colspan="2">действующих на отчетную дату</th>
                                            <th scope="col" colspan="2">заключенных за отчетный период</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">юр. лица</th>
                                            <th scope="col">физ. лица</th>
                                            <th scope="col">юр. лица</th>
                                            <th scope="col">физ. лица</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $active_legal_total = 0 @endphp
                                        @php $active_individual_total = 0 @endphp
                                        @php $signed_legal_total = 0 @endphp
                                        @php $signed_individual_total = 0 @endphp

                                        @foreach($regions as $region)
                                            @php $active_legal = isset($report[1]['active'][$region->id][\App\Model\Contract::TYPE_LEGAL]) ? count($report[1]['active'][$region->id][\App\Model\Contract::TYPE_LEGAL]) : 0 @endphp
                                            @php $active_individual = isset($report[1]['active'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) ? count($report[1]['active'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) : 0 @endphp
                                            @php $signed_legal = isset($report[1]['signed'][$region->id][\App\Model\Contract::TYPE_LEGAL]) ? count($report[1]['signed'][$region->id][\App\Model\Contract::TYPE_LEGAL]) : 0 @endphp
                                            @php $signed_individual = isset($report[1]['signed'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) ? count($report[1]['signed'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) : 0 @endphp

                                            <tr>
                                                <th scope="row" class="text-left">{{$region->name}}</th>
                                                <td>{{$active_legal}}</td>
                                                <td>{{$active_individual}}</td>
                                                <td>{{$signed_legal}}</td>
                                                <td>{{$signed_individual}}</td>
                                            </tr>

                                            @php $active_legal_total += $active_legal @endphp
                                            @php $active_individual_total += $active_individual @endphp
                                            @php $signed_legal_total += $signed_legal @endphp
                                            @php $signed_individual_total += $signed_individual @endphp
                                        @endforeach

                                        <tr class="text-blue text-bold">
                                            <th scope="row" class="text-right text-dark">Всего:</th>
                                            <td>{{$active_legal_total}}</td>
                                            <td>{{$active_individual_total}}</td>
                                            <td>{{$signed_legal_total}}</td>
                                            <td>{{$signed_individual_total}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info" id="report-insurance-premiums">
                    <div class="card-header">
                        <h3 class="card-title">Объем поступившей страховой премии (тыс. сум)</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <div class="card-tools">
                            <button class="btn btn-success float-right"
                                    name="regions[action]"
                                    style="margin-right: 20px;"
                                    type="submit"
                                    value="report-2">
                                Скачать
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table small text-center table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col" rowspan="2">наименование регионов</th>
                                            <th scope="col" colspan="2">по действовавшим в отчетном периоде договорам страхования</th>
                                            <th scope="col" colspan="2">по заключенным за отчетный период договорам страхования</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">юр. лица</th>
                                            <th scope="col">физ. лица</th>
                                            <th scope="col">юр. лица</th>
                                            <th scope="col">физ. лица</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $active_legal_total = 0 @endphp
                                        @php $active_individual_total = 0 @endphp
                                        @php $signed_legal_total = 0 @endphp
                                        @php $signed_individual_total = 0 @endphp

                                        @foreach($regions as $region)
                                            @php $active_legal = isset($report[2]['active'][$region->id][\App\Model\Contract::TYPE_LEGAL]) ? $report[2]['active'][$region->id][\App\Model\Contract::TYPE_LEGAL] : 0 @endphp
                                            @php $active_individual = isset($report[2]['active'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) ? $report[2]['active'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL] : 0 @endphp
                                            @php $signed_legal = isset($report[2]['signed'][$region->id][\App\Model\Contract::TYPE_LEGAL]) ? $report[2]['signed'][$region->id][\App\Model\Contract::TYPE_LEGAL] : 0 @endphp
                                            @php $signed_individual = isset($report[2]['signed'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) ? $report[2]['signed'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL] : 0 @endphp

                                            <tr>
                                                <th scope="row" class="text-left">{{$region->name}}</th>
                                                <td>{{number_format($active_legal, 2, ".", "'")}}</td>
                                                <td>{{number_format($active_individual, 2, ".", "'")}}</td>
                                                <td>{{number_format($signed_legal, 2, ".", "'")}}</td>
                                                <td>{{number_format($signed_individual, 2, ".", "'")}}</td>
                                            </tr>

                                            @php $active_legal_total += $active_legal @endphp
                                            @php $active_individual_total += $active_individual @endphp
                                            @php $signed_legal_total += $signed_legal @endphp
                                            @php $signed_individual_total += $signed_individual @endphp
                                        @endforeach

                                        <tr class="text-blue text-bold">
                                            <th scope="row" class="text-right text-dark">Всего:</th>
                                            <td>{{number_format($active_legal_total, 2, ".", "'")}}</td>
                                            <td>{{number_format($active_individual_total, 2, ".", "'")}}</td>
                                            <td>{{number_format($signed_legal_total, 2, ".", "'")}}</td>
                                            <td>{{number_format($signed_individual_total, 2, ".", "'")}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function defineRegionsTime(element) {
            let periods = {
                nothing: 0,
                month: 1,
                quarter: 3,
                half: 6,
                year: 12
            };

            let to = new Date;
            let from = new Date();

            from.setMonth(to.getMonth() - periods[element.value]);

            if (element.value == 'nothing') {
                document.getElementById('regions-from').value = "{{request('regions.from')}}";
                document.getElementById('regions-to').value = "{{request('regions.to')}}";
            } else {
                document.getElementById('regions-from').value = from.getFullYear() + '-' + ((from.getMonth() + 1) < 10 ? '0' + (from.getMonth() + 1) : (from.getMonth() + 1)) + '-' + (from.getDate() < 10 ? '0' + from.getDate() : from.getDate());
                document.getElementById('regions-to').value = to.getFullYear() + '-' + ((to.getMonth() + 1) < 10 ? '0' + (to.getMonth() + 1) : (to.getMonth() + 1)) + '-' + (to.getDate() < 10 ? '0' + to.getDate() : to.getDate());
            }

            document.getElementById('regions-from').disabled = (element.value != 'nothing');
            document.getElementById('regions-to').disabled = (element.value != 'nothing');
        }

        window.addEventListener('load', function() {
            defineRegionsTime(document.getElementById('regions-time'));
        });
    </script>
@endsection