@extends('layouts.index')

@section('content')
    <form action="{{route('broker.store')}}" method="post" enctype="multipart/form-data" id="formBrokers">
        @csrf
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
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
                </div>
            </div>
            @include('products.otvetstvennost.broker.form', ['all_product' => new \App\AllProduct(), 'create' => true])
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
@endsection

@include('products.scripts', [
    'ajax_data' => [
        'banks' => [
            [
                'id' => 'insurer-bank',
                'name' => 'bank_insurer'
            ]
        ]
    ]
])
