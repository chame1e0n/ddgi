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
                    <form method="post" action="{{ route('legal_client.store') }}" id="client-client-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Добавить клиента</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fas fa-times"></i>
                  </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Название</label>
                                                    <input id="name" class="form-control" name="name" value="{{ old('name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address" class="col-form-label">Адрес</label>
                                                    <input id="address" class="form-control" name="address" value="{{ old('address') }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone_number" class="col-form-label">Номер телефона</label>
                                                    <input id="phone_number" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_id" class="col-form-label">МФО</label>
                                                    <select id="bank_id" class="form-control" name="bank_id" required>
                                                        <option selected></option>
                                                        @foreach($banks as $bank)
                                                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="schet" class="col-form-label">Расчетный счет</label>
                                                    <input id="schet" class="form-control" name="raschetniy_schet" value="{{ old('raschetniy_schet') }}" required>
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
