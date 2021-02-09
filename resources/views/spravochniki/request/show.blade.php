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
	                        	<td>{{ $requestModel->id }}</td>
	                        </tr>
	                        <tr>
	                        	<th>От кого</th>
	                        	<td>{{ $requestModel->from_whom }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Статус</th>
	                        	<td>{{ $status }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Файл</th>
	                        	<td>
	                        		@if($filename)
	                        			<img src="/storage/{{$requestModel->file}}" height="150" width="200">
	                        		@else
	                        			<a href=" {{ ($requestModel->file == '') ? '#' :  route('request.upload', $requestModel->id)}} "> <img  src="{{asset('temp/img/')}}/{{ explode('.', $requestModel->file)[1] }}.png" width="50" height="50"> </a>
	                        		@endif
	                        	</td>
	                        </tr>
	                        <tr>
	                        	<th>Серия</th>
	                        	<td>{{ $requestModel->series }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Номер полиса</th>
	                        	<td>{{ $requestModel->policy_blank }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Дата запроса</th>
	                        	<td>{{ $requestModel->data_of_request }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Комментарий</th>
	                        	<td> {{ $requestModel->comments }}</td>
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