@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"><a href="/form">Продукты</a></li>
                                <li class="breadcrumb-item active">Создать Продукт</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                @include('products.select')

            </section>

        </div>
@endsection
