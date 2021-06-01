@extends('admin.layouts.form-layout')

@section('form-content')
    <form method="post" action="{{ route(strtolower(class_basename($object)) . '.store') }}" id="{{ strtolower(class_basename($object)) }}-form">
        @csrf
        @include($form_path)
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить</button>
            </div>
        </div>
    </form>
@endsection
