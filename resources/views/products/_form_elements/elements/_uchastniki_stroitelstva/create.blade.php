@section('_uchastniki_stroitelstva_content')
    <div class="col-12">
        <div class="d-flex flex-column">
            <label class="col-form-label">Участники строительства</label>
            <div class="form-group mb-20">
                <button type="button" id="add-costruct-participant" class="btn btn-primary ">Добавить
                </button>
            </div>
            <div id="builders">
                @if(!old('сonstruct_participants'))
                    <div class="form-group mb-20">
                        <input type="text" name="сonstruct_participants[]" class="form-control">
                    </div>
                @else
                    @foreach(old('сonstruct_participants', []) as $key => $item)
                        <div id="old_сonstruct_participants_{{$key}}" class="d-flex form-group mb-20">
                            <input type="text" name="сonstruct_participants[]"
                                   value="{{ $item }}" class="form-control mr-5">
                            @if($key)
                                <input onclick="removeEl('old_сonstruct_participants_{{$key}}')" type="button" value="Удалить"
                                       class="btn btn-warning">
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection