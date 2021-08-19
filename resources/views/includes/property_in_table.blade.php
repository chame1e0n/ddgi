<tr id="property-row-{{$key}}">
    <td>
        <input class="form-control @error('properties.' . $key . '.inventory_number') is-invalid @enderror"
               id="properties-{{$key}}-inventory-number"
               name="properties[{{$key}}][inventory_number]"
               type="text"
               value="{{old('properties.' . $key . '.inventory_number', $property->inventory_number)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('properties.' . $key . '.name') is-invalid @enderror"
               id="properties-{{$key}}-name"
               name="properties[{{$key}}][name]"
               type="text"
               value="{{old('properties.' . $key . '.name', $property->name)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('properties.' . $key . '.location') is-invalid @enderror"
               id="properties-{{$key}}-location"
               name="properties[{{$key}}][location]"
               type="text"
               value="{{old('properties.' . $key . '.location', $property->location)}}" />
    </td>
    <td>
        <input class="form-control @error('properties.' . $key . '.issue_date') is-invalid @enderror"
               id="properties-{{$key}}-issue-date"
               name="properties[{{$key}}][issue_date]"
               type="date"
               value="{{old('properties.' . $key . '.issue_date', $property->issue_date)}}" />
    </td>
    <td>
        <input class="form-control @error('properties.' . $key . '.quantity') is-invalid @enderror"
               id="properties-{{$key}}-quantity"
               min="0"
               name="properties[{{$key}}][quantity]"
               step="0.01"
               type="number"
               value="{{old('properties.' . $key . '.quantity', $property->quantity)}}" />
    </td>
    <td>
        <select class="form-control @error('properties.' . $key . '.measure') is-invalid @enderror"
                id="properties-{{$key}}-measure"
                name="properties[{{$key}}][measure]">
            <option></option>

            @foreach(\App\Model\Property::$measures as $value => $label)
                <option @if($value == old('properties.' . $key . '.measure', $property->measure)) selected="selected" @endif
                        value="{{$value}}">
                    {{$label}}
                </option>
            @endforeach
        </select>
    </td>
    <td>
        <input required
               class="form-control ddgi-calculate @error('properties.' . $key . '.insurance_value') is-invalid @enderror"
               id="properties-{{$key}}-insurance-value"
               min="0"
               name="properties[{{$key}}][insurance_value]"
               step="0.01"
               type="number"
               value="{{old('properties.' . $key . '.insurance_value', $property->insurance_value)}}" />
    </td>
    <td>
        <input required
               class="form-control ddgi-calculate @error('properties.' . $key . '.insurance_sum') is-invalid @enderror"
               id="properties-{{$key}}-insurance-sum"
               min="0"
               name="properties[{{$key}}][insurance_sum]"
               step="0.01"
               type="number"
               value="{{old('properties.' . $key . '.insurance_sum', $property->insurance_sum)}}" />
    </td>
    <td>
        <div class="input-group">
            <input disabled="disabled"
                   class="form-control"
                   id="properties-{{$key}}-insurance-premium"
                   type="text"
                   value="" />
        </div>
    </td>
    <td>
        <input type="button"
               value="Удалить"
               class="btn btn-warning ddgi-remove-property ddgi-calculate" />
    </td>
</tr>