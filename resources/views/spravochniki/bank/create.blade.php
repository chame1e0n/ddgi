@extends('layouts.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
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
            <form method="post" action="{{ route('bank.store') }}" id="bank-form">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Добавить банк</h3>
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
                                        <div class="form-group">
                                            <label for="code" class="col-form-label">Код банка</label>
                                            <input
                                                    id="code"
                                                    class="form-control"
                                                    name="code"
                                                    required
                                                    value="{{old('code')}}"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_name" class="col-form-label">Наименование банка</label>
                                            <input
                                                    id="bank_name"
                                                    class="form-control"
                                                    name="name"
                                                    required
                                                    value="{{old('name')}}"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="branch_name" class="col-form-label">Наименование филиала</label>
                                            <input
                                                    id="branch_name"
                                                    class="form-control"
                                                    name="filial"
                                                    required
                                                    value="{{old('filial')}}"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Адрес банка</label>
                                            <input
                                                    id="address"
                                                    class="form-control"
                                                    name="address"
                                                    required
                                                    value="{{old('address')}}"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inn" class="col-form-label">ИНН банка</label>
                                            <input
                                                    id="inn"
                                                    class="form-control"
                                                    name="inn"
                                                    required
                                                    value="{{old('inn')}}"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="account_number" class="col-form-label">Расчетный счет
                                                банка</label>
                                            <input
                                                    id="account_number"
                                                    class="form-control"
                                                    name="raschetniy_schet"
                                                    required
                                                    value="{{old('raschetniy_schet')}}"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status" class="col-form-label">Статус</label>
                                            <select
                                                    id="status"
                                                    class="form-control"
                                                    name="status"
                                            >
                                                <option value="1">Активный</option>
                                                <option value="0">Неактивный</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content -->
@endsection
