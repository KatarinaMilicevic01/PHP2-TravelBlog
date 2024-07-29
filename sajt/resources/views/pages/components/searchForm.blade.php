<div class="row">
    <div class="col-8">
        <div class="row d-flex">
            <div class="col-3">
                <select data-action="{{route('blogovi')}}" class="form-select form-control mb-5" name="idKategorija[]" id="ddlKat" aria-label=".form-select-lg example">>
                    <option selected value="0">Filtriraj po kategoriji</option>
                    @foreach($kategorije as $kat)

                        <option value="{{$kat->idKategorija}}">{{$kat->kategorija}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <select data-action="{{route('blogovi')}}" class="form-select form-control mb-5" name="sortBy" id="ddlSort" aria-label=".form-select-lg example">>
                    <option selected value="0">Sortiraj po...</option>
                    <option value="nazivASC">Po nazivu rastuce</option>
                    <option value="nazivDESC">Po nazivu opadajuce</option>
                    <option value="datumASC">Po datumu rastuce</option>
                    <option value="datumDESC">Po datumu opadajuce</option>
                </select>
            </div>
{{--            <input class="col-3 btn btn-outline-success" data-action="{{route('blogovi')}}" style="height: 7vh;" type="button" value="Primeni filtere" id="filter">--}}
        </div>
    </div>
    <div class="col-4">
        <form class="d-flex">
            <input data-action="{{route('blogovi')}}" class="form-control me-2" type="search" id="keyword" name="keyword" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success btn-sm" type="button" id="search">Search</button>
        </form>
    </div>
</div>
