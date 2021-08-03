<tr id="tranche-row-{{$key}}">
    <td>
        <input required
               class="form-control @error('tranches.' . $key . '.sum') is-invalid @enderror"
               id="tranches-{{$key}}-sum"
               name="tranches[{{$key}}][sum]"
               step="0.01"
               type="number"
               value="{{old('tranches.' . $key . '.sum', $tranche->sum)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('tranches.' . $key . '.from') is-invalid @enderror"
               id="tranches-{{$key}}-from"
               name="tranches[{{$key}}][from]"
               type="date"
               value="{{old('tranches.' . $key . '.from', $tranche->from)}}" />
    </td>
    <td>
        <input type="button" value="Удалить" class="btn btn-warning ddgi-remove-tranche" />
    </td>
</tr>