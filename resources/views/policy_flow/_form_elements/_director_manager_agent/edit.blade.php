@section('_director_manager_agent_content')
    <div class="col-md-3">
        <div class="form-group">
            <label class="col-form-label" for="akt_filial">Филиал</label>
            <select required class="form-control polises" id="branch" name="branch_id" style="width: 100%;">
                <option></option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="col-form-label" for="akt_kto_vidal">Кому</label>
            <select class="form-control polises" id="employee" name="to_user_id" style="width: 100%;">
                <option></option>
            </select>
        </div>
    </div>
@endsection

@section('_director_manager_agent_scripts')
    <script>
        //Get employee by branch id
        $(document).ready(function () {
            GetToUserList({{$policy->branch_id ?? 0}});

            $.ajax({
                url: '{{route('branches')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    response = response.data;
                    var len = response.length;

                    let branch = $("#branch");
                    branch.empty();
                    branch.append("<option> </option>");
                    var selected = {{$policy->branch_id ?? 0}};
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        branch.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + name + "</option>");
                    }
                }
            });

            $("#branch").change(function () {
                var id = $(this).val();
                GetToUserList(id);
            });
            
            function GetToUserList(id) {
                if (id) {
                    $.ajax({
                        url: '{{route('getBranchEmployees')}}',
                        type: 'get',
                        data: {branch_id: id},
                        dataType: 'json',
                        success: function (response) {

                            var len = response.length;
                            let employee = $("#employee");

                            employee.empty();
                            employee.append("<option> </option>");
                            var selected = {{$policy->to_user_id ?? 0}};
                            for (var i = 0; i < len; i++) {
                                var id = response[i]['user_id'];
                                var name = response[i]['name'];

                                if (id === 0) {
                                    employee.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                                } else {
                                    employee.append("<option value='" + id + "' " + (selected == id ? 'selected' : '') + ">" + response[i]['surname'] + " " + name + " " + response[i]['middle_name'] + "</option>");
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
@endsection