@section('_policySeries_by_policyName_content')

@endsection

@section('_policySeries_by_policyName_scripts')
    <script>
        //Get policy by policy id
        $(document).ready(function () {

            $("#policy_series").change(function () {
                var name = $(this).val();

                $.ajax({
                    url: '{{route('getPolicySeries')}}',
                    type: 'get',
                    data: {policy_name: name},
                    dataType: 'json',
                    success: function (response) {

                        var len = response.length;

                        $("#policy").empty();
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var name = response[i]['number'];

                            $("#policy").append("<option value='" + id + "'>" + name + "</option>");

                        }
                    }
                });
            });

        });
    </script>
@endsection