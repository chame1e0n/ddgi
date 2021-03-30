@extends('layouts.index')

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
                <div class=" mb-4">
                  <a class="btn btn-success" href="{{ route('policy_registration.create') }}">Создать</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Номер</th>
                    <th>Номер акта</th>
                    <th>Серия</th>
                    <th>Статус</th>
                    <th>Действия</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($policies as $policy)
                    <tr>
                      <td>{{ $policy->number }}</td>
                      <td>{{ $policy->act_number }}</td>
                      <td>{{ @$policy->policySeries->code }}</td>
                      <td>{{ $policy->status }}</td>
                      <td>
                        <form action="{{ route('policy.destroy',$policy->id) }}" method="POST">

                        <a class="btn btn-info"
                           href="{{ route('policy.edit',$policy->id) }}">Посмотреть</a>
                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>

                      </td>
                    </tr>
                  @endforeach
                  </tbody>

                </table>
                {!! $policies->links() !!}
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