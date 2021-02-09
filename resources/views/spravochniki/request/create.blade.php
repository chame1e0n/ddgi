@extends('layouts.index')

@section('content')

<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">

        </div>
      </div>

      <section class="content">
        <div class="card card-info">
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
            
          <div class="card-header">
            <h3 class="card-title">Запросы</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <form role="form" action="{{ route('request.store') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="form-group" id="act-number-form">
                <label for="act-number">От кого</label>
                <input type="text" id="act-number" value="{{ old('from_whom') }}" name="from_whom" class="form-control" placeholder="Полное имя">
              </div>

              <div class="row">
                <div class="col-sm-6">
              <div class="form-group">
                <label for="status-type">Статус</label>
                <select name="status" class="form-control select2" id="status-type">
                  @foreach($status as $key => $value)
                    @if(old('status') == $key)
                     <option  value="{{ $key }}" selected="">{{$value}}</option>
                    @else
                      <option  value="{{ $key }}">{{$value}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

              <div class="col-sm-6">
              <div class="form-group" id="file">
                <label for="file">Файл</label>
                  <div class="custom-file">
                    <input name="file" type="file" class="custom-file-input" id="file">
                    <label class="custom-file-label" for="file">Выбирите файл</label>
                  </div>
                </div>
              </div>

              </div>

              <div class="row">
                <div class="col-sm-6" id="#series">
                  <div class="form-group">
                    <label for="series">Серия</label>
                    <input id="series" name="series" type="text" value=" {{old('series')}} " class="form-control" placeholder="Серия">
                  </div>
                </div>
                <div class="col-sm-6" id="polis-blank">
                  <div class="form-group">
                    <label for="polis_blank">Номер полиса</label>
                    <input id="polis_blank" name="polis_blank" value=" {{old('polis_blank')}} " type="text" class="form-control"
                      placeholder="Номер полиса">
                  </div>
                </div>
              </div>

              <!-- <div class="form-group" id="exceed-limits">
                <label for="limit-reason">Причина увелечения лимитов</label>
                <input type="text" id="limit-reason" name="limit_reason" class="form-control" placeholder="">
              </div> -->

              <div class="form-group" id="comments-form">
                <label for="comments">Комментарий</label><br>
                <textarea id="comments" name="comments" class="textarea" placeholder="Place some text here"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{old('comments')}} </textarea>
              </div>

              <div class="card-footer">
                <!-- <button type="save" style="margin-left: 10px" class="btn btn-primary float-right">Распечатать</button> -->
                <button type="submit" class="btn btn-primary float-right">Добавить</button>
              </div>

            </form>
          </div>
        </div>

      </section>
    </div>

@endsection