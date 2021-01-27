@extends('layouts.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Каско</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active">Каско</li>
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
                <a class="btn btn-success" href="{{ route('kasko.create') }}">Создать</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Номер полиса</th>
                  <th>Серия полиса</th>
                  <th>Тип</th>
                  <th>Цель</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($kaskos as $key => $kasko)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $kasko->policy->number }}</td>
                  <td>{{ $kasko->policySeries->code }}</td>
                  <td>{{ $kasko->kasko[$key]->type  == 1 ? 'Юр. лицо' : 'Физ. лицо'}}</td>
                  <td>{{ $kasko->kasko[$key]->purpose  }}</td>
                  <td>
                    <form action="{{ route('kasko.destroy',$kasko->kasko[$key]->id) }}" method="POST">

                      <a class="btn btn-info disabled" href="{{ route('kasko.show',$kasko->kasko[$key]->id) }}">Посмотреть</a>

                      <a class="btn btn-primary disabled"
                         href="{{ route('kasko.edit',$kasko->kasko[$key]->id) }}">Изменить</a>
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                </tbody>

              </table>
              {!! $kaskos->links() !!}
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