@extends('layouts.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Менеджеры</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item">Справочники</li>
                        <li class="breadcrumb-item active">Менеджеры</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class=" mb-4">
                                <a class="btn btn-success" href="{{ route('manager.create') }}">Создать</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ф.И.О</th>
                                    <th>Место работы</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($managers as $manager)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $manager->surname .' '. $manager->name .' '. $manager->middle_name}}</td>
                                    <td>{{ $manager->job }}</td>
                                    <td>{{ $manager->status > 0 ? 'Активный' : 'Неактивный' }}</td>
                                    <td>
                                        <form action="{{ route('agent.destroy',$manager->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('agent.show',$manager->id) }}">Посмотреть</a>

                                            <a class="btn btn-primary"
                                               href="{{ route('agent.edit',$manager->id) }}">Изменить</a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {!! $managers->links() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
