@extends('layouts.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Заказы с сайта ddgi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active">Заказы с сайта</li>
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
                  <a class="btn btn-warning" href="{{ route('site_order.refresh') }}">Обновить данные</a>
                </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Наименование Продукта</th>
                  <th>Ф.И.О.</th>
                  <th>Стоимость (UZS)</th>
                  <th>Статус</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $order->title }}</td>
                  <td>{{ $order->last_name }} {{ $order->first_name }} {{ $order->middle_name }}</td>
                  <td>{{ $order->amount }}</td>
                  <td>{{ $order->status }}</td>
                  <td>


                      <a class="btn btn-info" href="{{ route('site_order.show',$order->id) }}"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>

              </table>
{{--              {!! $orders->links() !!}--}}
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
