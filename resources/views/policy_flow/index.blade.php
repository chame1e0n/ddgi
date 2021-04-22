@extends('layouts.index')
@php
    $statusRoute = [
    'registered' => 'policy_registration',
    'transferred' => 'policy_transfer',
    'retransferred' => 'policy_retransfer'
    ];
@endphp
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Полисы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Полисы</li>
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
                                <div class="row mb-4">
                                    <div class="col-sm-2">
                                        <a class="btn btn-outline-info"
                                           href="{{ route('policy_registration.create') }}">Регистрация</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <a class="btn btn-outline-success"
                                           href="{{ route('policy_transfer.create') }}">Распределение</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <a class="btn btn-outline-secondary"
                                           href="{{ route('policy_retransfer.create') }}">Перераспределение</a>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Серии</th>
                                        <th>Статус</th>
                                        <th>Номер акта</th>
                                        <th>От</th>
                                        <th>Кому</th>
                                        <th>Дата распределения</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($policyFlow as $policy)
                                        <tr>
                                            <td>{{ $policy->policy_from }} - {{ $policy->policy_to }}</td>
                                            <td>{{ $policy->status }}</td>
                                            <td>{{ @$policy->act_number }}</td>
                                            <td>{{ !is_null($policy->fromUser) ? $policy->fromUser->getFullNameAndPosition() : '' }}</td>
                                            <td>{{ !is_null($policy->toUser) ? $policy->toUser->getFullNameAndPosition() : '' }}</td>
                                            <td>{{ date('d.m.Y', strtotime($policy->created_at)) }}</td>
                                            <td>
                                                <form action="{{ route($statusRoute[$policy->status].'.destroy',$policy->id)}}"
                                                      method="POST">

                                                    <a class="btn btn-info"
                                                       href="{{ route($statusRoute[$policy->status].'.edit',$policy->id) }}"><i
                                                                class="fas fa-eye"></i></a>


                                                    <a class="btn btn-primary"
                                                       href="{{ route($statusRoute[$policy->status].'.edit',$policy->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {!! $policyFlow->links() !!}
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
