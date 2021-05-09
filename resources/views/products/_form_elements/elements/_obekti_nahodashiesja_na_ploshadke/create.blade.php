@section('_obekti_nahodashiesja_na_ploshadke_content')
    <div class="col-12">
        <h3 class="card-title">Объекты находящиеся на площадке строительства
        </h3>
    </div>
    <div class="col-md-4">
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" name="highways" value="highways" id="highways">
            <label class="form-check-label" for="highways">
                Автомагистрали
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" name="bridgesAndOverpasses" value="bridgesAndOverpasses" id="bridgesAndOverpasses">
            <label class="form-check-label" for="bridgesAndOverpasses">
                Мосты, путепроводы
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="pipelines" name="pipelines" id="pipelines">
            <label class="form-check-label" for="pipelines">
                Трубопроводы
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="railways" name="railways" id="railways">
            <label class="form-check-label" for="railways">
                Железные дороги
            </label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="damsAndEmbankments" name="damsAndEmbankments" id="damsAndEmbankments">
            <label class="form-check-label" for="damsAndEmbankments">
                Дамбы, набережные
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="groundWays" name="groundWays" id="groundWays">
            <label class="form-check-label" for="groundWays">
                Наземные пути
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="waterways" name="waterways" id="waterways">
            <label class="form-check-label" for="waterways">
                Водные пути
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="carParks" name="carParks" id="carParks">
            <label class="form-check-label" for="carParks">
                Автопарковки
            </label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="lep" name="lep" id="lep">
            <label class="form-check-label" for="lep">
                ЛЭП
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="groundLines" name="groundLines" id="groundLines">
            <label class="form-check-label" for="groundLines">
                Наземные линии
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="undergroundLines" name="undergroundLines" id="undergroundLines">
            <label class="form-check-label" for="undergroundLines">
                Подземные линии
            </label>
        </div>
        <div class="form-check icheck-success ">
            <input class="form-check-input" type="checkbox" value="undergroundCables" name="undergroundCables" id="undergroundCables">
            <label class="form-check-label" for="undergroundCables">
                Подземные кабели
            </label>
        </div>
    </div>
@endsection