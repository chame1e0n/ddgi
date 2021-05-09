@section('_dogovor_lizinga')
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-group">
                <label for="dogovor-dogovor_lizing_number-num" class="col-form-label">Договора лизинга
                    №</label>
                <input type="text" id="dogovor_lizing_number" name="dogovor_lizing_number"
                       value="{{old('dogovor_lizing_number') ?? $product->dogovor_lizing_number}}"
                       @if($errors->has('dogovor_lizing_number'))
                       class="form-control is-invalid"
                       @else
                       class="form-control"
                       @endif
                       required>
            </div>
        </div>
    </div>
@endsection


