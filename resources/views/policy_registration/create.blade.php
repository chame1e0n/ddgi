@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ url()->previous() }}" class="btn btn-info">Назад</a>
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
                <form method="post" id="polis-registration-form" action="{{ route('policy_registration.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Зарегистроровать полис</h3>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="act_number" class="col-form-label">Номер акта</label>
                                                <input id="act_number" class="form-control" name="act_number" value="{{ old('act_number') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="act_date" class="col-form-label">Дата акта</label>
                                                <div class="input-group">
                                                    <input id="act_date" type="date" class="form-control"
                                                           placeholder="yyyy-mm-dd" name="act_date" value="{{ old('act_date') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="polis_number_from" class="col-form-label">Номер полиса
                                                    с:</label>
                                                <input id="polis_number_from" type="number"  class="form-control"
                                                       name="from_number" value="{{ old('from_number') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="polis_number_to" class="col-form-label">Номер полиса
                                                    до:</label>
                                                <input id="polis_number_to" type="number" class="form-control"
                                                       name="to_number" value="{{ old('to_number') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="polis_series" class="col-form-label">Тип клиента:</label>
                                                <select id="polis_series" class="form-control" name="client_type"
                                                        required>
                                                    <option selected></option>
                                                    <option value="0">физ. лицо</option>
                                                    <option value="1">юр. лицо</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="polis_series" class="col-form-label">Серия полиса:</label>
                                                <select id="polis_series" name="policy_series_id" class="form-control">
                                                    <option selected value="0"></option>
                                                    @foreach($policySeries as $policySer)
                                                        <option value="{{ $policySer->id }}">{{ $policySer->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="file-loading" class="col-form-label">Документ:</label>
                                                <div class="file-loading">
                                                    <input id="file-input" class="file" type="file" name="document"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
