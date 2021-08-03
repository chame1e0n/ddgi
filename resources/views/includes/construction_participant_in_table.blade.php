<tr id="construction-participant-row-{{$key}}">
    <td>
        <input required
               class="form-control @error('construction_participants.' . $key . '.name') is-invalid @enderror"
               id="construction-participants-{{$key}}-name"
               name="construction_participants[{{$key}}][name]"
               type="text"
               value="{{old('construction_participants.' . $key . '.name', $construction_participant->name)}}" />
    </td>
    <td>
        <input type="button" value="Удалить" class="btn btn-warning ddgi-remove-construction-participant" />
    </td>
</tr>