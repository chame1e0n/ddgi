@extends('layouts.index')

@section('content')
    <form action="{{route('broker.update', $all_product->id)}}" method="post" enctype="multipart/form-data"
          id="formBrokers">
        @csrf
        @method('put')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                                <li class="breadcrumb-item active">Создать Анкету</li>
                            </ol>
                        </div>
                    </div>

                        @if ($all_product->allProductInformations->count() > 0)
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    @foreach($all_product->allProductInformations as $item)
                                        <a target="_blank" href="{{route('broker.download', ['id' => $all_product->id, 'info_id' => $item->id])}}" class="btn btn-warning">
                                            <i class="fa fa-download" aria-hidden="true"></i> Скачать {{ $item->policy_series }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                </div>
            </div>

            @include('products.otvetstvennost.broker.form', ['all_product' => $all_product, 'create' => false])

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
    <form action="{{route('broker.destroy', $all_product->id)}}" method="post">
        @csrf
        @method('delete')
        <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right">Удалить</button>
        </div>
    </form>
@endsection

@include('products.scripts', [
    'ajax_data' => [
        'banks' => [
            [
                'id' => 'insurer-bank',
                'name' => 'bank_insurer',
                'value' => $all_product->policyHolder->bank_id ?? ''
            ]
        ]
    ]
])
