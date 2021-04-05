@extends('layouts.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Запросы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item">Справочники</li>
                            <li class="breadcrumb-item active">Запросы</li>
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
                                    <a class="btn btn-success" href="{{ route('perestrahovaniya.create') }}">Создать</a>

                                </div>
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">От кого</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Дата запроса</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($requestModel as $req)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{
                                                    $req->user->name
                                                }}
                                            </td>
                                            <td>{{ $req->created_at }}</td>
                                            <td>
                                                <form action="{{ route('perestrahovaniya.destroy',$req->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('perestrahovaniya.show',$req->id) }}"><i class="fas fa-eye"></i></a>

                                                    <a class="btn btn-primary"
                                                       href="{{ route('perestrahovaniya.edit',$req->id) }}"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" onclick="return confirm('Вы уверены?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <!--  -->
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
        $(document).ready(function() {

            $('#example').DataTable( {
                orderCellsTop: true,
                fixedHeader: true,
                "language": {
                    "info": "Показано с _START_ по _END_ из _TOTAL_ записей",
                    "search":"Поиск",
                    "lengthMenu":"Показать _MENU_ записи",
                    "paginate": {
                        "sFirst": "Первая:с", // This is the link to the first page
                        "sPrevious": "Предыдущая:с", // This is the link to the previous page
                        "sNext": "Следующая:с", // This is the link to the next page
                        "sLast": "Предыдущая:с" // This is the link to the last page
                    },
                },

                "pagingType": "full_numbers",
                "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
            } );
        } );
    </script>
@endsection