@extends('admin.layouts.form-layout')

@section('form-content')
    <form method="post" action="{{ route(strtolower($route ?? class_basename($object)) . '.update', $object->id) }}" id="{{ strtolower(class_basename($object)) }}-form">
        @csrf
        @method('PUT')
        @include($form_path)
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить
                </button>
            </div>
        </div>
    </form>
@endsection
