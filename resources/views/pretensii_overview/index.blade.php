@extends('layouts.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Рассмотр Претензии</h1>
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

              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
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


                      <a class="btn btn-info" href="{{ route('pretensii.show',$pretensii->id) }}"><i class="fas fa-eye"></i></a>

                      <a class="btn btn-primary"
                         href="{{ route('pretensii_overview.create')}}/{{$pretensii->id}}"><i class="fas fa-edit"></i></a>
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
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
