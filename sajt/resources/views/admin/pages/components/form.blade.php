<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Osnovni podaci</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('blogovi.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Naslov</label>
                            <input type="text"  name="naslov" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Opis</label>
                            <textarea id="inputDescription" class="form-control" rows="4" name="opis"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Dodaj sliku</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="slika">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                                </div>

                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputDescription">Alt</label>
                            <input type="text" id="inputName" name="alt" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kategorije</label>
                            <div class="row" id="kategorije">

                                <div class="col-md-6">
                                    @php $half = ceil(count($kategorije) / 2); @endphp
                                    @foreach($kategorije->take($half) as $k)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="kat[]" value="{{$k->idKategorija}}">
                                            <label class="form-check-label" for="exampleCheck1">{{$k->kategorija}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    @foreach($kategorije->skip($half) as $k)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="kat[]" value="{{$k->idKategorija}}">
                                            <label class="form-check-label" for="exampleCheck1">{{$k->kategorija}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Dodaj novu kategoriju
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Naziv kategorije</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{--                                                <form action="get" enctype="multipart/form-data">--}}
                                        <input type="text" id="kat" name="kategorija" class="form-control">
                                        {{--                                                </form>--}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="dodajKat" class="btn btn-primary">Sacuvaj</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 d-flex justify-content-between">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Sacuvaj" class="btn bg-success float-right">

                            </div>
                        </div>
                    </form>
                    @if($errors->any())
                        <ul class="bg-danger my-3 list-group list-group-flush">
                            @foreach($errors->all() as $e)
                                <li class="list-group-item bg-danger">{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>

</section>
