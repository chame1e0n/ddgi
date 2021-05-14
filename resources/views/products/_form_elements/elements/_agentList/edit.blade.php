@section('_agentList_content')
<div class="col-md-4">
    <div class="form-group">
        <label for="otvet_litso">Ответственное лицо</label>
        <select @if($errors->has('otvet_litso'))
                class="form-control is-invalid"
                @else
                class="form-control"
                @endif id="otvet_litso" name="otvet_litso"
                style="width: 100%;" required>
            <option></option>
        </select>
    </div>
</div>
@endsection

@section('_agentList_scripts')
<script>
    $.ajax({
        url: '{{route('getAgents')}}',
        type: 'get',
        dataType: 'json',
        success: function (response) {

            var len = response.length;
            let employee = $("#otvet_litso");

            employee.empty();
            employee.append("<option> </option>");
            var selected = {{$product->otvet_litso ?? 0}};
            for (var i = 0; i < len; i++) {
                var id = response[i]['user_id'];
                var name = response[i]['name'];

                if (id === 0) {
                    employee.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                } else {
                    employee.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + response[i]['surname'] + " " + name + " " + response[i]['middle_name'] + "</option>");
                }
            }
        }
    });
</script>
@endsection