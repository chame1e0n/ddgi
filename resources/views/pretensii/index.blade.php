@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Претензии</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Претензии</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-info pretenziya" id="form-container">
                <div class="card-header">
                    <h3 class="card-title">Найти договор</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <form>
                    <div class="card-body">
                            @include('includes.messages')
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a class="btn btn-success" href="{{ route('pretensii.create') }}">Создать</a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a class="btn btn-success" href="#">Обновить</a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a class="btn btn-success" href="#">Export</a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a class="btn btn-success" href="#">Import</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="card card-success product-type">
                            <div class="card-header">
                                <h3 class="card-title">Фильтры</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_filial" class="col-form-label">Филиал</label>
                                                <select id="filter_filial" class="form-control select2" name="filter_filial">
                                                    <option value="1">asdc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_class" class="col-form-label">Класс</label>
                                                <select id="filter_class" class="form-control select2" name="filter_class">
                                                    <option value="1">asdc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_stat" class="col-form-label">Статусы</label>
                                                <select id="filter_stat" class="form-control select2" name="filter_stat">
                                                    <option value="1">asdc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_data_zayav" class="col-form-label">Дата заявления</label>
                                                <input type="date" id="filter_data_zayav" name="filter_data_zayav" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_data" class="col-form-label">Дата договора</label>
                                                <input type="date" id="filter_data" name="filter_data" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_number_dogovor" class="col-form-label">Номер договора</label>
                                                <input type="text" id="filter_number_dogovor" name="unique_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_num" class="col-form-label">Номер дело</label>
                                                <input type="text" id="filter_num" name="filter_num" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="filter_number_ot" class="col-form-label">Номер полиса</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="filter_sings" style="width: 100%;">
                                                        <option selected="selected">=</option>
                                                        <option><</option>
                                                        <option><=</option>
                                                        <option>></option>
                                                        <option>>=</option>
                                                    </select>
                                                </div>
                                                <input type="text" id="filter_number_ot" class="form-control" name="filter_number_ot">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="filter_number_do" class="col-form-label">Номер полиса</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="filter_sings" style="width: 100%;">
                                                        <option selected="selected">=</option>
                                                        <option><</option>
                                                        <option><=</option>
                                                        <option>></option>
                                                        <option>>=</option>
                                                    </select>
                                                </div>
                                                <input type="text" id="filter_number_do" name="filter_number_do" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_data_ot" class="col-form-label">Период от</label>
                                                <input type="date" id="filter_data_ot" name="filter_data_ot" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_data_do" class="col-form-label">Период до</label>
                                                <input type="date" id="filter_data_do" name="filter_data_do" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_name_strah" class="col-form-label">Страхователь</label>
                                                <input type="text" id="filter_name_strah" name="filter_name_strah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_name_vigod" class="col-form-label">Выгодоприобритатель</label>
                                                <input type="text" id="filter_name_vigod" name="filter_name_vigod" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_name_zalog" class="col-form-label">Залогодатель</label>
                                                <input type="text" id="filter_name_zalog" name="filter_name_zalog" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter_comment" class="col-form-label">Поиск по комментариям</label>
                                                <input type="text" id="filter_comment" name="filter_comment" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button style="margin: 38px 0 0 auto; display: block;" class="btn btn-success" type="submit">Найти</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right" id="form-search-button">Найти
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if(count($pretensiis))
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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Номер</th>
                                            <th>Стархователь</th>
                                            <th>Номер документа</th>
                                            <th>Филиал</th>
                                            <th>Статус</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                         <tbody>
                                        @foreach ($pretensiis as $pretensii)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $pretensii->insurer }}</td>
                                                <td>{{ $pretensii->case_number }}</td>
                                                <td>{{ $pretensii->branch->name }}</td>
                                                <td>{{ $pretensii->status->status }}</td>
                                                <td>


                                                    <form action="{{ route('pretensii.destroy',$pretensii->id) }}"
                                                          method="POST">

                                                        <a class="btn btn-info"
                                                           href="{{ route('pretensii.show',$pretensii->id) }}"><i class="fas fa-eye"></i></a>

                                                        <a class="btn btn-primary"
                                                           href="{{ route('pretensii.edit',$pretensii->id) }}"><i class="fas fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {!! $pretensiis->links() !!}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
        @endif
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
