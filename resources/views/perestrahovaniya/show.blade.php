@extends('layouts.index')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <table class="table {% comment %}table-bordered{% endcomment %} table-striped projects">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $perestrahovaniya->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>От кого</th>
                                        <td>{{ $perestrahovaniya->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Файл</th>
                                        <td>
                                            @if($filename)
                                                {{--										@dd("/storage/public/".$requestModel->file)--}}
                                                <img src="{{Storage::url($perestrahovaniya->file)}}" height="150" width="200">
                                            @else
                                                @if(!empty($perestrahovaniya->file))
                                                    <a
                                                            href="{{route('perestrahovaniya.upload', $perestrahovaniya->id)}}">
                                                        <img
                                                                src="explode('.', $perestrahovaniya->file)[1] }}.png" width="50" height="50">
                                                    </a>
                                                @else
                                                    Файл нет
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Серия</th>
                                        <td>{{ @$perestrahovaniya->policySeries->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Номер полиса</th>
                                        <td>{{ @$perestrahovaniya->policy->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Дата запроса</th>
                                        <td>{{ $perestrahovaniya->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Комментарий</th>
                                        <td> {{ $perestrahovaniya->comments }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection