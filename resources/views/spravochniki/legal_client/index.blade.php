@extends('layouts.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Юр. лица</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Главная</a></li>
              <li class="breadcrumb-item">Справочники</li>
              <li class="breadcrumb-item active">Юр. лица</li>
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
                  <a class="btn btn-success" href="{{ route('individual_client.create') }}">Создать</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Наименование</th>
                    <th>Адрес</th>
                    <th>Номер телефона</th>
                    <th>Действия</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($legalClients as $legalClient)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $legalClient->name }} </td>
                      <td>{{ $legalClient->address }}</td>
                      <td>{{ $legalClient->phone_number }}</td>
                      <td>
                        <form action="{{ route('legal_client.destroy',$legalClient->id) }}" method="POST">

                          <a class="btn btn-info" href="{{ route('legal_client.show',$legalClient->id) }}"><i class="fas fa-eye"></i></a>

                          <a class="btn btn-primary"
                             href="{{ route('legal_client.edit',$legalClient->id) }}"><i class="fas fa-edit"></i></a>
                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>

                </table>
                {!! $legalClients->links() !!}
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
