@extends('admin.form-layout')

@section('form-content')
    <form method="post" action="{{ route('bank.update', $bank->id) }}" id="bank-form">
        @csrf
        @method('PUT')
        @include('admin.spravochniki.bank.form')
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить
                </button>
            </div>
        </div>
    </form>
@endsection
