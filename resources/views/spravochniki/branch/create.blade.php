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
                <form method="post" action="{{ route('branch.store') }}" id="branch-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Добавить офис</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="title" class="col-form-label">Название</label>
                                                <input id="title"
                                                       @if($errors->has('name'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       value="{{old('name')}}"
                                                       name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="founded_date" class="col-form-label">Основан</label>
                                                <input type="date" id="founded_date" value="{{old('founded_date')}}"
                                                       @if($errors->has('founded_date'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       placeholder="yyyy-mm-dd" name="founded_date" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group" id="form-group-1">
                                                <label for="parent_id" class="col-form-label">Материнский офис</label>
                                                <select id="parent_id" class="form-control" name="parent_id">
                                                    <option selected="selected"></option>
                                                    @if(isset($branches))
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group" id="form-group-2">
                                                <label for="region_id" class="col-form-label">Регион</label>
                                                <select id="region_id" class="form-control parent-region"
                                                        name="region_id"
                                                        data-depth="1">
                                                    @foreach($regions as $region)
                                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group" id="form-group-3">
                                                <label for="director" class="col-form-label">Директор</label>
                                                <select id="director" class="form-control" name="user_id" required>
                                                    <option selected="selected"></option>
                                                    @if(isset($directors))
                                                        @foreach($directors as $director)
                                                            <option value="{{$director->user_id}}">{{$director->surname}}{{$director->name}}{{$director->middle_name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="role-center">Центр
                                                    страхования</label>
                                                <input type="checkbox" id="is_center" name="is_center"
                                                       data-bootstrap-switch
                                                       data-off-color="danger"
                                                       data-on-color="success"
                                                       data-on-text="Да"
                                                       data-off-text="Нет"
                                                       @if($errors->has('is_center'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address" class="col-form-label">Местонахождение</label>
                                                <input id="address"
                                                       @if($errors->has('address'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       value="{{old('address')}}"
                                                       name="address" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone_number" class="col-form-label">Номер телефона</label>
                                                <input id="phone_number"
                                                       @if($errors->has('phone_number'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       value="{{old('phone_number')}}" name="phone_number" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
