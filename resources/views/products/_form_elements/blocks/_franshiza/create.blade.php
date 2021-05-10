@section('_franshiza_content')
    <div class="card-body">
        <div class="card card-info" id="clone-beneficiary">
            <div class="card-header">
                <h3 class="card-title">Франшиза</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="beneficiary-card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="summ-1">% от страховой суммы по риску землетрясения и пожара по
                                каждому убытку и/или по всем убыткам в результате каждого страхового
                                случая</label>
                            <input type="text" id="summ-1" name="geo_zone" class="form-control">
                            <input type="text" id="zalog-address" name="address_zalog"
                                   value="{{old('address_zalog')}}" @if($errors->has('address_zalog'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                   @endif
                                   required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="summ-2">% от страховой суммы по риску противоправные действия
                                третьих лиц по каждому убытку и/или по всем убыткам в результате каждого
                                страхового случая</label>
                            <input type="text" id="summ-2" name="geo_zone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="geographic-zone">% от страховой суммы по другим рискам по каждому
                                <br> убытку и/или по всем убыткам в результате каждого <br> страхового
                                случая</label>
                            <input type="text" id="geographic-zone" name="geo_zone" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
