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

            <div class="card card-info" id="report-regions">
                <div class="card-header">
                    <h3 class="card-title">Количество договоров страхования (шт.)</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('report.regions')}}"
                          id="report"
                          method="GET">
                        <div class="row">
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
                            <div class="col-sm-2">
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
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button class="btn btn-success float-right"
                                            name="regions[action]"
                                            style="margin-top: 32px;"
                                            type="submit"
                                            value="download">
                                        Скачать
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

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
                                        @php $active_legal = isset($report['active'][$region->id][\App\Model\Contract::TYPE_LEGAL]) ? count($report['active'][$region->id][\App\Model\Contract::TYPE_LEGAL]) : 0 @endphp
                                        @php $active_individual = isset($report['active'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) ? count($report['active'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) : 0 @endphp
                                        @php $signed_legal = isset($report['signed'][$region->id][\App\Model\Contract::TYPE_LEGAL]) ? count($report['signed'][$region->id][\App\Model\Contract::TYPE_LEGAL]) : 0 @endphp
                                        @php $signed_individual = isset($report['signed'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) ? count($report['signed'][$region->id][\App\Model\Contract::TYPE_INDIVIDUAL]) : 0 @endphp

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
        </section>
    </div>
@endsection