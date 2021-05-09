@section('_obekti_nahodashiesja_na_ploshadke_content')
    <div class="col-12">
        <h3 class="card-title">Объекты находящиеся на площадке строительства
        </h3>
    </div>
    @php
        $i = 0;
    @endphp

    @foreach(\App\AllProduct::OBJECTS_ON_CONSTRUCTION_SITE as $key => $value)
    @if(!($i%4))
    @if($i)
    </div>
    @endif

    <div class="col-md-4">
        @endif

        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" name="objekti_naxodyashiesya_na_ploshadke[]" value="{{$key}}" id="{{$key}}">
            <label class="form-check-label" for="{{$key}}">
                {{$value}}
            </label>
        </div>
        @php $i++; @endphp
    @endforeach
    </div>
@endsection