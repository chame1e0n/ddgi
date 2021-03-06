@extends('layouts.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
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
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('product.update', $product->id) }}" id="product-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Изменить продукт</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tarif" class="col-form-label">Наименование</label>
                                            <input id="name" type="text" class="form-control"
                                                   name="name" value="{{$product->name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="klass_id" class="col-form-label">Класс</label>
                                            <select id="klass" name="klass_id" class="form-control select2"
                                                    style="width: 100%;"
                                                    required>
                                            <option selected value="{{$product->klass_id}}">{{$product->klass->name}}</option>
                                            @foreach($klasses as $klass)
                                                @if($klass->id == $product->klass_id)
                                                    @php
                                                        continue;
                                                    @endphp
                                                @endif
                                            <option value="{{$klass->id}}">{{$klass->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tarif" class="col-form-label">Тарифная ставка</label>
                                            <input id="tarif" type="number" class="form-control"
                                                   name="tarif" value="{{$product->tarif}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="max_acceptable_amount" class="col-form-label">Максимально
                                                допустимая сумма</label>
                                            <input id="max_acceptable_amount" type="number" class="form-control"
                                                   name="max_acceptable_amount" value="{{$product->max_acceptable_amount}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content -->
@endsection