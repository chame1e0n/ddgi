@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Список договоров</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Список договоров</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('includes.messages')

                                <div class=" mb-4">
                                    <a class="btn btn-success"
                                       href="{{route('contracts.create')}}">
                                        Создать
                                    </a>
                                </div>
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <form action="{{route('contracts.index')}}"
                                              method="GET">
                                            @csrf

                                            <tr>
                                                <th>
                                                    Наименование продукта
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               name="filter[types.name]"
                                                               type="text"
                                                               value="{{request('filter') ? request('filter')['types.name'] : ''}}" />
                                                    </div>
                                                </th>
                                                <th>
                                                    Номер договора
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               name="filter[number]"
                                                               type="text"
                                                               value="{{request('filter.number')}}" />
                                                    </div>
                                                </th>
                                                <th>
                                                    Наименование полиса
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               name="filter[policies.name]"
                                                               type="text"
                                                               value="{{request('filter') ? request('filter')['policies.name'] : ''}}" />
                                                    </div>
                                                </th>
                                                <th>
                                                    Серия полиса
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               name="filter[policies.series]"
                                                               type="text"
                                                               value="{{request('filter') ? request('filter')['policies.series'] : ''}}" />
                                                    </div>
                                                </th>
                                                <th>
                                                    Имя агента
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               name="filter[employees.name]"
                                                               type="text"
                                                               value="{{request('filter') ? request('filter')['employees.name'] : ''}}" />
                                                    </div>
                                                </th>
                                                <th>
                                                    Действия
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Найти</button>
                                                    </div>
                                                </th>
                                            </tr>
                                        </form>
                                    </thead>
                                    <tbody>
                                    @foreach($contracts as $contract)
                                        <tr>
                                            <td>{{$contract->specification->type->name}}</td>
                                            <td>{{$contract->number}}</td>
                                            <td>{!! join('<br />', $contract->getPolicyNames()) !!}</td>
                                            <td>{!! join('<br />', $contract->getPolicySeries()) !!}</td>
                                            <td>{!! join('<br />', $contract->getAgentFullNames()) !!}</td>
                                            <td>
                                                <form action="{{route('contracts.destroy', $contract->id)}}"
                                                      method="POST">
                                                    <a class="btn btn-info"
                                                       href="{{route('contracts.show', $contract->id)}}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary"
                                                       href="{{route('contracts.edit', $contract->id)}}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
@endsection
