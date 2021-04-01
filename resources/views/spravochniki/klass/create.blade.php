@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
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
            <div class="container-fluid">
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="post" action="{{ route('klass.store') }}" id="klass-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Добавить класс</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Группа</label>
                                            <select id="status" name="group_id" class="form-control select2"
                                                    style="width: 100%;"
                                                    required>
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="code" class="col-form-label">Код</label>
                                                <input
                                                        id="code"
                                                        @if($errors->has('code'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif
                                                        name="code"
                                                        value="{{ old('code') }}"
                                                        required
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">Название</label>
                                                <input
                                                        id="name"
                                                        @if($errors->has('name'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif
                                                        name="name"
                                                        value="{{ old('name') }}"
                                                        required
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description" class="col-form-label">Описание</label>
                                                <textarea
                                                        id="description"
                                                        @if($errors->has('description'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif
                                                        name="description"
                                                        value="{{ old('description') }}"
                                                        required
                                                ></textarea>
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
