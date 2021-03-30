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
                <form method="post" action="{{ route('branch.update', $branch->id) }}" id="branch-form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Редактировать офис</h3>
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
                                                <input id="title" class="form-control" value="{{$branch->name}}"
                                                       name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="series" class="col-form-label">Серии</label>
                                                <input id="series" class="form-control" value="{{$branch->series}}"
                                                       name="series" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="founded_at" class="col-form-label">Основан</label>
                                                <input type="date" id="founded_at" value="{{$branch->founded_date}}"
                                                       class="form-control"
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
                                                        @foreach($branches as $parent_branch)
                                                            @if($branch->id == $parent_branch->id)
                                                                <option value="{{$parent_branch->id}}"
                                                                        selected>{{$parent_branch->name}}</option>
                                                            @else
                                                                <option value="{{$parent_branch->id}}">{{$parent_branch->name}}</option>
                                                            @endif
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
                                                    <option selected="selected"></option>
                                                    @foreach($regions as $region)
                                                        @if($branch->region_id == $region->id)
                                                            <option value="{{$region->id}}"
                                                                    selected>{{$region->name}}</option>
                                                        @else
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group" id="form-group-3">
                                                <label for="director" class="col-form-label">Директор</label>
                                                <select id="director" class="form-control" name="user_id" required>
                                                    @if(isset($directors))
                                                        <option value=""></option>
                                                        @foreach($directors as $director)
                                                            @if($branch->user_id == $director->user_id)
                                                                <option selected
                                                                        value="{{$director->user_id}}">{{$director->surname}} {{$director->name}} {{$director->middle_name}}</option>
                                                            @else
                                                                <option value="{{$director->user_id}}">{{$director->surname}} {{$director->name}} {{$director->middle_name}}</option>
                                                            @endif
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
                                                @if($branch->is_center) checked @endif
                                                >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address" class="col-form-label">Местонахождение</label>
                                                <input id="address" class="form-control" value="{{$branch->address}}"
                                                       name="address" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone_number" class="col-form-label">Номер телефона</label>
                                                <input id="phone_number" class="form-control"
                                                       value="{{$branch->phone_number}}" name="phone_number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">

                                            <div class="form-group">
                                                <label for="type" class="col-form-label">Тип</label>
                                                <select id="type" class="form-control parent-region" name="type">
                                                    <option selected="selected">{{$branch->type}}</option>
                                                    <option>Тип 1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">

                                            <div class="form-group">
                                                <label for="code_by_office" class="col-form-label">Код по офису и
                                                    региону</label>
                                                <input id="code_by_office" class="form-control"
                                                       value="{{$branch->code_by_office}}" name="code_by_office"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">

                                            <div class="form-group">
                                                <label for="code_by_type" class="col-form-label">Код офиса</label>
                                                <input id="code_by_type" class="form-control"
                                                       value="{{$branch->code_by_type}}" name="code_by_type" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">

                                            <div class="form-group">
                                                <label for="hierarchy" class="col-form-label">Иерархия</label>
                                                <input id="hierarchy" type="number" class="form-control"
                                                       value="{{$branch->hierarchy}}" name="hierarchy"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
