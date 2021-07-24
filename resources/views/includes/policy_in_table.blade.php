<tr id="policy-row-{{$key}}">
    <td>
        <input required
               @if($policy->contract_id) disabled @endif
               class="form-control ddgi-policy-name @error('policies.' . $key . '.name') is-invalid @enderror"
               id="policies-{{$key}}-name"
               name="policies[{{$key}}][name]"
               type="text"
               value="{{old('policies.' . $key . '.name', $policy->name)}}" />
    </td>
    <td>
        <select required
                @if($policy->contract_id) disabled @endif
                class="form-control ddgi-policy-series @error('policies.' . $key . '.series') is-invalid @enderror"
                id="policies-{{$key}}-series"
                name="policies[{{$key}}][series]">
            <option></option>

            @foreach(\App\Model\Policy::all() as $policy_series)
                <option @if($policy_series->series == old('policies.' . $key . '.series', $policy->series)) selected="selected" @endif
                        value="{{$policy_series->series}}">
                    {{$policy_series->series}}
                </option>
            @endforeach
        </select>
    </td>
    <td>
        <input disabled="disabled"
               class="form-control"
               id="policies-{{$key}}-responsible-person"
               type="text"
               value="" />
    </td>
    <td>
        <input required
               class="form-control @error('policies.' . $key . '.date_of_issue') is-invalid @enderror"
               id="policies-{{$key}}-date-of-issue"
               name="policies[{{$key}}][date_of_issue]"
               type="date"
               value="{{old('policies.' . $key . '.date_of_issue', $policy->date_of_issue)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('policies.' . $key . '.polis_from_date') is-invalid @enderror"
               id="policies-{{$key}}-polis-from-date"
               name="policies[{{$key}}][polis_from_date]"
               type="date"
               value="{{old('policies.' . $key . '.polis_from_date', $policy->polis_from_date)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('policies.' . $key . '.polis_to_date') is-invalid @enderror"
               id="policies-{{$key}}-polis-to-date"
               name="policies[{{$key}}][polis_to_date]"
               type="date"
               value="{{old('policies.' . $key . '.polis_to_date', $policy->polis_to_date)}}" />
    </td>
    <td>
        <div class="input-group">
            <input required
                   class="form-control ddgi-calculate @error('policies.' . $key . '.insurance_sum') is-invalid @enderror"
                   id="policies-{{$key}}-insurance-sum"
                   name="policies[{{$key}}][insurance_sum]"
                   step="0.01"
                   type="number"
                   value="{{old('policies.' . $key . '.insurance_sum', $policy->insurance_sum)}}" />
            <div class="input-group-append">
                <span class="input-group-text"
                      id="policies-{{$key}}-insurance-sum-plus">
                    + 0
                </span>
            </div>
        </div>
    </td>
    <td>
        <div class="input-group">
            <input disabled="disabled"
                   class="form-control"
                   id="policies-{{$key}}-insurance-premium"
                   type="text"
                   value="" />
            <div class="input-group-append">
                <span class="input-group-text"
                      id="policies-{{$key}}-insurance-premium-plus">
                    + 0
                </span>
            </div>
        </div>
    </td>
    <td>
        <input required
               class="form-control ddgi-calculate @error('policies.' . $key . '.franchise') is-invalid @enderror"
               id="policies-{{$key}}-franchise"
               name="policies[{{$key}}][franchise]"
               step="0.01"
               type="number"
               value="{{old('policies.' . $key . '.franchise', $policy->franchise)}}" />
    </td>
    <td>
        @include('includes.modals.' . \Illuminate\Support\Str::snake(lcfirst(basename(get_class($policy_model)))))

        <button class="btn btn-success"
                data-target="#policy-modal-{{$key}}"
                data-toggle="modal"
                type="button">Заполнить</button>
    </td>
    <td>
        <input type="button"
               value="Удалить"
               class="btn btn-warning ddgi-remove-policy ddgi-calculate" />
    </td>
</tr>