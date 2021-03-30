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
                <form method="post" id="polis-series-form"
                      >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Полис</h3>
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
                                                <label for="code" class="col-form-label">Номер</label>
                                                <input
                                                        id="code"
                                                        class="form-control"
                                                        name="code"
                                                        required
                                                        readonly
                                                        value="{{$policy->number}}"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="code" class="col-form-label">Номер акта</label>
                                                <input
                                                        id="code"
                                                        class="form-control"
                                                        name="code"
                                                        required
                                                        readonly
                                                        value="{{$policy->act_number}}"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="code" class="col-form-label">Серия полиса</label>
                                                <input
                                                        id="code"
                                                        class="form-control"
                                                        name="code"
                                                        required
                                                        readonly
                                                        value="{{$policy->policySeries->code}}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="code" class="col-form-label">Статус</label>
                                                <input
                                                        id="code"
                                                        class="form-control"
                                                        name="code"
                                                        required
                                                        readonly
                                                        value="{{$policy->status}}"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="code" class="col-form-label">Филиал</label>
                                                <input
                                                        id="code"
                                                        class="form-control"
                                                        name="code"
                                                        required
                                                        readonly
                                                        value="{{@$policy->branch->name}}"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection