@section('_from_whom_content')
    <div class="col-md-3">
        <div class="form-group">
            <label class="col-form-label" for="akt_ot_kogo">От кого</label>
            <select class="form-control polises" id="akt_ot_kogo" name="from_user_id" style="width: 100%;">
                <option></option>
            </select>
        </div>
    </div>
@endsection

@section('_from_whom_scripts')
    <script>
        //Get employee by branch id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getEmployees')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;

                    let employees = $("#akt_ot_kogo");
                    employees.empty();
                    employees.append("<option> </option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['user_id'];
                        var name = response[i]['name'];
                        var surname = 'surname' in response[i] ? response[i]['surname'] : '';
                        var middle_name = 'middle_name' in response[i] ? response[i]['middle_name'] : '';

                        if (id === 0) {
                            employees.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                        } else {
                            employees.append("<option value='" + id + "'>" + surname + " " + name + " " + middle_name + "</option>");
                        }
                    }
                }
            });
        });
    </script>
@endsection