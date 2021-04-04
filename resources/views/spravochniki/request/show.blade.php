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
	                        	<td>{{ $requestModel->user->name }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Статус</th>
	                        	<td>{{ $status }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Файл</th>
	                        	<td>
	                        		@if($filename)
{{--										@dd("/storage/public/".$requestModel->file)--}}
	                        			<img src="{{Storage::url($requestModel->file)}}" height="150" width="200">
	                        		@else
	                        			@if(!empty($requestModel->file))
	                        			<a 
	                        			href="{{route('request.upload', $requestModel->id)}}"> 
	                        				<img  
	                        				src="{{asset('temp/img/')}}/{{ explode('.', $requestModel->file)[1] }}.png" width="50" height="50">
	                        			 </a>
	                        			@else 
	                        				Файл нет
	                        			@endif
	                        		@endif
	                        	</td>
	                        </tr>
	                        <tr>
	                        	<th>Серия</th>
	                        	<td>{{ @$requestModel->policySeries->code }}</td>
	                        </tr>
	                        <tr>
	                        	<th>Номер полиса</th>
	                        	<td>{{ @$requestModel->policy->number }}</td>
	                        </tr>
	                        @if($requestModel->status == 'policy_transfer')
		                        <tr>
		                        	<th>Количество полисов</th>
		                        	<td>{{ $requestModel->polis_quantity }}</td>
		                        </tr>


		                        <tr>
		                        	<th>Номер акта</th>
		                        	<td>{{ $requestModel->act_number }}</td>
		                        </tr>
	                        @endif

	                        @if($requestModel->status == 'underwritting')
		                        <tr>
		                        	<th>Причина увелечения лимитов</th>
		                        	<td>{{ $requestModel->limit_reason }}</td>
		                        </tr>
	                        @endif
	                        <tr>
	                        	<th>Дата запроса</th>
	                        	<td>{{ $requestModel->created_at }}</td>
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