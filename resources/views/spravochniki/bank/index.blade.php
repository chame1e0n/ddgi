@extends('layouts.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Банки</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item">Справочники</li>
                            <li class="breadcrumb-item active">Банки</li>
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
                                     <i class="bi bi-arrow-down"></i> <i class="bi bi-arrow-up"></i>
                                    <a class="btn btn-success" href="{{ route('bank.create') }}">Создать</a>
                                   
                                </div>
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Наименование</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Код</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Статус</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($banks as $bank)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $bank->name }}</td>
                                            <td>{{ $bank->code }}</td>
                                            <td>{{ $bank->status > 0 ? 'Активный' : 'Неактивный' }}</td>
                                            <td>
                                                <form action="{{ route('bank.destroy',$bank->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('bank.show',$bank->id) }}">Посмотреть</a>

                                                    <a class="btn btn-primary"
                                                       href="{{ route('bank.edit',$bank->id) }}">Изменить</a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {!! $banks->links() !!}
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

@section('scripts')

<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>





<script type="text/javascript">
    $(function () {
    $("#example").DataTable({
      "bPaginate": false,
      "bInfo": false,
    });
  });
</script>
@endsection