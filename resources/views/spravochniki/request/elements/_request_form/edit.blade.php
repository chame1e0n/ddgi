@php
    $status = App\Models\Spravochniki\RequestModel::STATUS;
@endphp
@section('_request_form_content')
    <form role="form" action="{{ route('request.update', $requestModel->id) }}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="status-type">Статус</label>
                    <select name="status" class="form-control select2"
                            @if(app('request')->input('status')) readonly @endif id="status-type">
                        @foreach($status as $key => $value)
                            @if($requestModel->status == $key)
                                <option value="{{ $key }}" selected="">{{$value}}</option>
                            @else
                                <option value="{{ $key }}">{{$value}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4" id="#series">
                <div class="form-group">
                    <label for="series">Серия</label>
                    <select id="policy" name="policy_series_id" @if(app('request')->input('status')) readonly
                            @endif  class="form-control select2" id="policy_series">
                        <option value="" selected=""></option>
                        <option value="0">без серии</option>
                        @foreach($policySeries as $value)
                            @if(old('polis_blank') == $value->id or app('request')->input('policySeries') == $value->id)
                                <option value="{{ $value->id }}" selected="">{{$value->code}}</option>
                            @else
                                <option value="{{ $value->id }}">{{$value->code}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4" id="policy-number">
                <div class="form-group">
                    <label for="polis_number">Номер полиса</label>
                    <input id="polis_number" @if(app('request')->input('status')) readonly
                           @endif name="policy_number" type="text" class="form-control"
                           placeholder="Номер полиса" value="{{$requestModel->policy->number}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" id="policy-amount">
                    <label for="polis_quantity">Количество полисов</label>
                    <input id="polis_quantity" name="polis_quantity" value="{{ $requestModel->polis_quantity  }}"
                           type="number"
                           @if($errors->has('polis_quantity'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                           @endif placeholder="100">
                </div>
                <div class="form-group" id="exceed-limits">
                    <label for="limit-reason">Причина увелечения лимитов</label>
                    <input type="text" id="limit-reason" name="limit_reason"
                           value="{{ $requestModel->limit_reason }}"
                           @if($errors->has('limit_reason'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                           @endif
                           placeholder="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="act-number-form">
                    <label for="act-number">Номер акта</label>
                    <input type="text" id="act-number" name="act_number" value="{{ $requestModel->act_number }}"
                           @if($errors->has('act_number'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                           @endif placeholder="ADV100023">
                </div>
                <div class="form-group" id="file">
                    <label for="file">Файл (<a href="{{url('/storage/'.$requestModel->file)}}">скачать файл</a>)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="file" type="file" value="{{url('/storage/'.$requestModel->file)}}"
                                   @if($errors->has('file'))
                                   class="custom-file-input is-invalid"
                                   @else
                                   class="custom-file-input"
                                   @endif
                                   id="file">
                            <label class="custom-file-label" for="file">Выбирите файл</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group" id="comments-form">
            <label for="comments">Комментарий</label>
            <textarea id="comments" name="comments" class="textarea" placeholder="Place some text here"
                      style="width: 80%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                {{$requestModel->comments}}
            </textarea>
        </div>
        <div class="card-footer">
            <button type="save" style="margin-left: 10px" class="btn btn-primary float-right">
                Распечатать
            </button>
            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </div>
    </form>
@endsection

@section('_request_form_scripts')
    <script type="text/javascript">
        //Get policy by policy id
        $(document).ready(function () {
            getPolicies({{$requestModel->policy_series_id}});

            $("#policy_series").change(function () {
                getPolicies($(this).val());
            });
        });

        function getPolicies(policySeriesId) {
            $.ajax({
                url: '{{route('getPolicies')}}',
                type: 'get',
                data: {policy_series_id: policySeriesId},
                dataType: 'json',
                success: function (response) {

                    var len = response.length;

                    $("#policy").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['number'];

                        $("#policy").append("<option value='" + id + "'>" + name + "</option>");

                    }
                }
            });
        }
    </script>
    <script>
        $(function () {
            $('.textarea').summernote();
        });

        $(document).ready(function () {
            $('#status-type').on('change', function () {
                if (this.value === 'policy_transfer') {
                    $("#policy-number").hide();
                    $("#exeed-limits").hide();
                    $("#policy-amount").show();
                    $("#act-number-form").show();
                } else if (this.value === 'underwritting') {
                    $("#exeed-limits").show();
                    $("#policy-number").show();
                    $("#policy-amount").hide();
                    $("#act-number-form").hide();
                } else {
                    $("#policy-number").show();
                    $("#exeed-limits").hide();
                    $("#policy-amount").hide();
                    $("#act-number-form").hide();
                }
            });

            $('#status-type').trigger('change');
        });
    </script>
@endsection