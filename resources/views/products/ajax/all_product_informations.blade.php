<tr id="{{ $product_index }}">
    @if (!empty($item->id))
        <input type="hidden"
               name="all_product_informations[{{ $product_index }}][id]"
               value="{{ $item->id }}" />
    @endif
    <td>
        <input  type="date" name="all_product_informations[{{ $product_index }}][from_date_polis]" class="form-control" value="{{ $item->policy_insurance_from }}" required>
    </td>
    <td>
        <input type="date" class="form-control" name="all_product_informations[{{ $product_index }}][date_polis_from]" value="{{ $item->date_polis_from }}" required>
    </td>
    <td>
        <input type="date" class="form-control" name="all_product_informations[{{ $product_index }}][date_polis_to]" value="{{ $item->date_polis_to }}" required>
    </td>
    <td>
        <input type="text" class="form-control" name="all_product_informations[{{ $product_index }}][insurer_fio]" value="{{ $item->otvet_litso }}" required>
    </td>
    <td>
        <input type="text" class="form-control" name="all_product_informations[{{ $product_index }}][specialty]" value="Specialty" required>
    </td>
    <td>
        <input type="text" class="form-control" name="all_product_informations[{{ $product_index }}][experience]" value="work experience" required>
    </td>
    <td>
        <input type="text" class="form-control" name="all_product_informations[{{ $product_index }}][position]" required>
    </td>
    <td>
        <input type="text" class="form-control" name="all_product_informations[{{ $product_index }}][time_stay]" required>
    </td>
    <td>
        <input type="text" class="form-control" data-field="value" name="all_product_informations[{{ $product_index }}][insurer_price]" required>
    </td>
    <td>
        <input type="text" class="form-control" data-field="sum" name="all_product_informations[{{ $product_index }}][insurer_sum]" required>
    </td>
    <td>
        <input type="text" class="form-control" data-field="premiya" name="all_product_informations[{{ $product_index }}][insurer_premium]" required>
    </td>
    <td>
        <input onclick="removeAndCalc({{ $product_index }})" type="button" value="Удалить" data-action="delete" class="btn btn-warning">
    </td>
</tr>
