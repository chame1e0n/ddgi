<tr id="notary-employee-row-{{$key}}">
    <td>
        <input required
               class="form-control @error('notary_employees.' . $key . '.number') is-invalid @enderror"
               id="notary-employees-{{$key}}-number"
               name="notary_employees[{{$key}}][number]"
               step="1"
               type="number"
               value="{{old('notary_employees.' . $key . '.number', $notary_employee->number)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('notary_employees.' . $key . '.administrator') is-invalid @enderror"
               id="notary-employees-{{$key}}-administrator"
               name="notary_employees[{{$key}}][administrator]"
               type="text"
               value="{{old('notary_employees.' . $key . '.administrator', $notary_employee->administrator)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('notary_employees.' . $key . '.composition') is-invalid @enderror"
               id="notary-employees-{{$key}}-composition"
               name="notary_employees[{{$key}}][composition]"
               type="text"
               value="{{old('notary_employees.' . $key . '.composition', $notary_employee->composition)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('notary_employees.' . $key . '.other') is-invalid @enderror"
               id="notary-employees-{{$key}}-other"
               name="notary_employees[{{$key}}][other]"
               type="text"
               value="{{old('notary_employees.' . $key . '.other', $notary_employee->other)}}" />
    </td>
    <td>
        <input type="button" value="Удалить" class="btn btn-warning ddgi-remove-notary-employee" />
    </td>
</tr>