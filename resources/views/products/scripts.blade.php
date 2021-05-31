@section('scripts')
    <script>
        @isset($ajax_data['banks'])
            $.ajax({
                url: '{{route('getBanks')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;

                    @foreach ($ajax_data['banks'] as $bank)
                        var banks_element = $('#{{ $bank['id'] }}');
                        banks_element.empty();
                        banks_element.append('<option></option>');

                        var selected_id = {{ $bank['value'] ?? 0 }};

                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var name = response[i]['name'];
                            // var mfo = response[i]['mfo'];

                            banks_element.append('<option value="' + id + '" ' + (selected_id == id ? 'selected' : '')  + '>' + name + '</option>');
                        }
                    @endforeach
                }
            });

            @foreach ($ajax_data['banks'] as $bank)
                // Initialize Select2 Elements
                $('#{{ $bank['id'] }}').select2({
                    theme: 'bootstrap4'
                });
            @endforeach
        @endisset
    </script>
@endsection
