@extends('layouts.index')

@php
    //ToDO optimize this code of getting routes depending on product id
    $routes = [
    1 => 'kasko',
    2 => 'tamojenniy-sklad',
    3 => 'cmp',
    4 => 'otvetstvennost-podryadchik',
    5 => 'tamozhnya-add-legal',
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
                        <h1>Список договоров</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Список договоров</li>
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
                                    <a class="btn btn-success" href="{{ route('all_products.create') }}">Создать</a>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Наименование продукта</th>
                                        <th>Номер договора</th>
                                        <th>Серия полиса</th>
                                        <th>Номер полиса</th>
                                        <th>Имя агента</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($allProducts as $product)
                                        <tr>

                                            <td>{{ $product->product->name }}</td>
                                            <td>{{ $product->unique_number }}</td>
                                            <td>{{ @$product->policySeries->code }}</td>
                                            <td>{{ @$product->policy->number }}</td>
                                            <td>{{ @$product->agent->surname }} {{ @$product->agent->name }} {{ @$product->agent->middle_name }}</td>
                                            <td>
                                                <form action="{{ route($routes[$product->product_id].'.destroy',$product->id)}}"
                                                      method="POST">

                                                    <a class="btn btn-info"
                                                       href="{{ route($routes[$product->product_id].'.edit',$product->id) }}"><i class="fas fa-eye"></i></a>

                                                    <a class="btn btn-primary"
                                                       href="{{ route($routes[$product->product_id].'.edit',$product->id) }}"><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
{{--                                {!! $allProducts->links() !!}--}}
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

            $('#example1').DataTable( {
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
