@extends('admin.layouts.form-layout')

@section('form-content')
    <form method="post" action="{{route(strtolower($route ?? class_basename($object)) . '.' . ($object->exists ? 'update' : 'store'), $object->id)}}" id="{{strtolower(class_basename($object))}}-form">
        @csrf

        @if($object->exists)
            @method('PUT')
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Добавить запрос</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="act_number" class="col-form-label">Наименование</label>
                                    <input required
                                           class="form-control @error(strtolower(class_basename($object)) . '.act_number') is-invalid @enderror"
                                           id="act_number"
                                           name="{{strtolower(class_basename($object))}}[act_number]"
                                           value="{{old(strtolower(class_basename($object)) . '.act_number', $object->act_number)}}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Статус</label>
                                    <select required
                                            class="form-control select2 @error(strtolower(class_basename($object)) . '.status') is-invalid @enderror"
                                            id="status"
                                            name="{{strtolower(class_basename($object))}}[status]">
                                    @foreach($statuses as $id => $value)
                                        <option @if($id == old(strtolower(class_basename($object)) . '.status', $object->status)) selected="selected" @endif
                                                value="{{$id}}">
                                            {{$value}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="policy_id" class="col-form-label">Полис</label>
                                    <select required
                                            class="form-control select2 @error(strtolower(class_basename($object)) . '.policy_id') is-invalid @enderror"
                                            id="policy_id"
                                            name="{{strtolower(class_basename($object))}}[policy_id]">
                                    @foreach($policies as $id => $value)
                                        <option @if($id == old(strtolower(class_basename($object)) . '.policy_id', $object->policy_id)) selected="selected" @endif
                                                value="{{$id}}">
                                            {{$value}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="limit_reason" class="col-form-label">Причина увеличения лимита</label>
                                    <input required
                                           class="form-control @error(strtolower(class_basename($object)) . '.limit_reason') is-invalid @enderror"
                                           id="limit_reason"
                                           name="{{strtolower(class_basename($object))}}[limit_reason]"
                                           value="{{old(strtolower(class_basename($object)) . '.limit_reason', $object->limit_reason)}}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="act_number" class="col-form-label">Номер акта</label>
                                    <input required
                                           class="form-control @error(strtolower(class_basename($object)) . '.act_number') is-invalid @enderror"
                                           id="act_number"
                                           name="{{strtolower(class_basename($object))}}[act_number]"
                                           value="{{old(strtolower(class_basename($object)) . '.act_number', $object->act_number)}}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="policy_amount" class="col-form-label">Количество полисов</label>
                                    <input required
                                           class="form-control @error(strtolower(class_basename($object)) . '.policy_amount') is-invalid @enderror"
                                           id="policy_amount"
                                           name="{{strtolower(class_basename($object))}}[policy_amount]"
                                           type="number"
                                           value="{{old(strtolower(class_basename($object)) . '.policy_amount', $object->policy_amount)}}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="file" class="col-form-label">Файл</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input @error(strtolower(class_basename($object)) . '.file') is-invalid @enderror"
                                                   id="file"
                                                   name="{{strtolower(class_basename($object))}}[file]"
                                                   type="file"
                                                   value="{{old(strtolower(class_basename($object)) . '.file', $object->file)}}" />
                                            <label class="custom-file-label" for="file">Выберите файл</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment" class="col-form-label">Коммент</label>
                                    <textarea required
                                              class="summernote form-control @error(strtolower(class_basename($object)) . '.comment') is-invalid @enderror"
                                              id="comment"
                                              name="{{strtolower(class_basename($object))}}[comment]">{{old(strtolower(class_basename($object)) . '.comment', $object->comment)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$object->exists ? 'Изменить' : 'Добавить'}}</button>
            </div>
        </div>
    </form>
@endsection
