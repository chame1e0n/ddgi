@extends('admin.layouts.form-layout')

@section('form-content')
    <form action="{{route('requests.' . ($request->exists ? 'update' : 'store'), $request->id)}}"
          id="form-request"
          method="post">
        @csrf

        @if($request->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
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
                                        <label for="request-act-number" class="col-form-label">Наименование</label>
                                        <input class="form-control @error('request.act_number') is-invalid @enderror"
                                               id="request-act-number"
                                               name="request[act_number]"
                                               value="{{old('request.act_number', $request->act_number)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="request-status" class="col-form-label">Статус</label>
                                        <select class="form-control select2 @error('request.status') is-invalid @enderror"
                                                id="request-status"
                                                name="request[status]">
                                        @foreach(\App\Model\Request::$statuses as $id => $value)
                                            <option @if($id == old('request.status', $request->status)) selected="selected" @endif
                                                    value="{{$id}}">
                                                {{$value}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="request-policy-id" class="col-form-label">Полис</label>
                                        <select class="form-control select2 @error('request.policy_id') is-invalid @enderror"
                                                id="request-policy-id"
                                                name="request[policy_id]">
                                        @foreach(\App\Model\Policy::all() as $policy)
                                            <option @if($policy->id == old('request.policy_id', $request->policy_id)) selected="selected" @endif
                                                    value="{{$policy->id}}">
                                                {{$policy->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="request-limit-reason" class="col-form-label">Причина увеличения лимита</label>
                                        <input class="form-control @error('request.limit_reason') is-invalid @enderror"
                                               id="request-limit_reason"
                                               name="request[limit-reason]"
                                               value="{{old('request.limit_reason', $request->limit_reason)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="request-act-number" class="col-form-label">Номер акта</label>
                                        <input class="form-control @error('request.act_number') is-invalid @enderror"
                                               id="request-act-number"
                                               name="request[act_number]"
                                               value="{{old('request.act_number', $request->act_number)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="request-policy-amount" class="col-form-label">Количество полисов</label>
                                        <input class="form-control @error('request.policy_amount') is-invalid @enderror"
                                               id="request-policy-amount"
                                               name="request[policy_amount]"
                                               type="number"
                                               value="{{old('request.policy_amount', $request->policy_amount)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="file" class="col-form-label">Файл</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input required
                                                       class="form-control custom-file-input @error('request.file') is-invalid @enderror"
                                                       id="request-file"
                                                       name="request[file]"
                                                       type="file"
                                                       value="{{old('request.file', $request->file)}}" />
                                                <label class="custom-file-label" for="request-file">Выберите файл</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="request-comment" class="col-form-label">Коммент</label>
                                        <textarea required
                                                  class="summernote form-control @error('request.comment') is-invalid @enderror"
                                                  id="request-comment"
                                                  name="request[comment]">{{old('request.comment', $request->comment)}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!$block)
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$request->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
