@extends('admin.form-layout')

@section('form-content')
    <form method="post" action="{{ route('bank.store') }}" id="bank-form">
        @csrf
        @include('admin.spravochniki.bank.form')
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить</button>
            </div>
        </div>
    </form>
@endsection
