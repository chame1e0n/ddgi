@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">

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
                                            <input readonly id="title" class="form-control" value="{{$branch->name}}"
                                                   name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="series" class="col-form-label">Серии</label>
                                            <input readonly id="series" class="form-control" value="{{$branch->series}}"
                                                   name="series" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="founded_at" class="col-form-label">Основан</label>
                                            <input readonly type="date" id="founded_at"
                                                   value="{{$branch->founded_date}}"
                                                   class="form-control"
                                                   placeholder="yyyy-mm-dd" name="founded_date" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group" id="form-group-1">
                                            <label for="parent_id" class="col-form-label">Материнский офис</label>
                                            <select readonly id="parent_id" class="form-control" name="parent_id">
                                                <option readonly selected="selected">{{@$branch->parent->name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group" id="form-group-2">
                                            <label for="region_id" class="col-form-label">Регион</label>
                                            <select readonly id="region_id" class="form-control parent-region"
                                                    name="region_id"
                                                    data-depth="1">
                                                <option selected="selected">{{$branch->region->name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group" id="form-group-3">
                                            <label for="director" class="col-form-label">Директор</label>
                                            <select id="director" readonly class="form-control" name="user_id" required>
                                                <option selected="selected"
                                                        value="{{$branch->user_id}}">{{$branch->director->surname . ' ' .$branch->director->name . ' ' . $branch->director->middle_name}}</option>
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
                                                   readonly
                                                   @if($branch->is_center) checked @endif
                                            >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Местонахождение</label>
                                            <input id="address" class="form-control" readonly
                                                   value="{{$branch->address}}"
                                                   name="address" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone_number" class="col-form-label">Номер телефона</label>
                                            <input id="phone_number" class="form-control" readonly
                                                   value="{{$branch->phone_number}}" name="phone_number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="form-group">
                                            <label for="type" class="col-form-label">Тип</label>
                                            <select id="type" class="form-control parent-region" readonly name="type">
                                                <option selected="selected">{{$branch->type}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">

                                        <div class="form-group">
                                            <label for="code_by_office" class="col-form-label">Код по офису и
                                                региону</label>
                                            <input id="code_by_office" class="form-control"
                                                   value="{{$branch->code_by_office}}" readonly name="code_by_office"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">

                                        <div class="form-group">
                                            <label for="code_by_type" class="col-form-label">Код офиса</label>
                                            <input id="code_by_type" class="form-control"
                                                   value="{{$branch->code_by_type}}" readonly name="code_by_type"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">

                                        <div class="form-group">
                                            <label for="hierarchy" class="col-form-label">Иерархия</label>
                                            <input id="hierarchy" type="number" class="form-control"
                                                   value="{{$branch->hierarchy}}" readonly name="hierarchy"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список менеджеров</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Ф.И.О</th>
                                        <th>Место работы</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($managers as $manager)
                                        <tr>
                                            <td>{{ $manager->surname .' '. $manager->name .' '. $manager->middle_name}}</td>
                                            <td>{{ $manager->job }}</td>
                                            <td>{{ $manager->status > 0 ? 'Активный' : 'Неактивный' }}</td>
                                            <td>
                                                <form action="{{ route('agent.destroy',$manager->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('agent.show',$manager->id) }}"><i class="fas fa-eye"></i></a>

                                                    <a class="btn btn-primary"
                                                       href="{{ route('agent.edit',$manager->id) }}"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {!! $managers->links() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список агентов</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Ф.И.О</th>
                                        <th>Место работы</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($agents as $agent)
                                        <tr>
                                            <td>{{ $agent->surname .' '. $agent->name .' '. $agent->middle_name}}</td>
                                            <td>{{ $agent->job }}</td>
                                            <td>{{ $agent->status > 0 ? 'Активный' : 'Неактивный' }}</td>
                                            <td>
                                                <form action="{{ route('agent.destroy',$agent->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('agent.show',$agent->id) }}"><i class="fas fa-eye"></i></a>

                                                    <a class="btn btn-primary"
                                                       href="{{ route('agent.edit',$agent->id) }}"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {!! $agents->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection