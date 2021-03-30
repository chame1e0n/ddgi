@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="post" id="polis-transfer-form" enctype="multipart/form-data"
                      action="{{ route('policy_transfer.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Прикрепить полис</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                                data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="retransfer-num-akt">Номер
                                                    акта</label>
                                                <input type="text" value="{{old('act_number')}}" name="act_number"
                                                       @if($errors->has('act_number'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       id="retransfer-num-akt">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Дата
                                                    акта</label>
                                                <input id="pretensii-final-settlement-date" value="{{old('act_date')}}"
                                                       name="act_date" type="date"
                                                       @if($errors->has('act_date'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Серия
                                                    бланка</label>
                                                <select class="form-control polises" id="polises"
                                                        name="policy_series_id"
                                                        style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    @if(!empty($policySeries))
                                                        @foreach($policySeries as $policySer)
                                                            <option
                                                                value="{{$policySer->id}}">{{$policySer->code}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">С
                                                    номера бланка</label>
                                                <input type="text" value="{{old('policy_from')}}" name="policy_from"
                                                       @if($errors->has('policy_from'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       id="retransfer-num-akt">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">До
                                                    номера бланка</label>
                                                <input type="text" value="{{old('policy_to')}}" name="policy_to"
                                                       @if($errors->has('policy_to'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       id="retransfer-num-akt">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Кому
                                                    (филиал / офис)</label>
                                                <select class="form-control polises" id="polises" name="branch_id"
                                                        style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    @if(!empty($branches))
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Дата
                                                    распределения</label>
                                                <input id="pretensii-final-settlement-date"
                                                       value="{{old('retransfer_distribution')}}"
                                                       name="retransfer_distribution" type="date"
                                                       @if($errors->has('retransfer_distribution'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка
                                                    акта</label>
                                                <input class="form-control" type="file" multiple name="act_file">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Кто
                                                    выдал полис</label>
                                                <input type="text" name="transfer_given"
                                                       value="{{old('transfer_given')}}"
                                                       @if($errors->has('transfer_given'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       id="retransfer-num-akt">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">Распределить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
