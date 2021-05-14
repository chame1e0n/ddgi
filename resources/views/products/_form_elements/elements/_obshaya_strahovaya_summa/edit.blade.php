@section('_obshaya_strahovaya_summa_content')
    <div class="col-md-12">
        <div class="form-group">
            <label for="obshaya_strahovaya_summa">Общая страховая сумма</label>
            <input type="text" readonly id="obshaya_strahovaya_summa" class="form-control calcSumm">
        </div>
    </div>
@endsection

@section('_obshaya_strahovaya_summa_scripts')
    <script>
        sumElements();

        // Need to add calcElelement to necessary input fields
        $(".calcElement").change(function() {
            sumElements();
        });

        function sumElements() {
            var collection = $(".calcElement");
            var sum = 0;

            collection.each(function(index, number) {
                sum += Number(number.value);
            });

            $('.calcSumm').val(sum)
        }
    </script>
@endsection