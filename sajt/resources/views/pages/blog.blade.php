@extends('layouts.layout')

@section('content')
    <div id="coverBlog">
        <img src="{{asset('assets/img/'.$blog -> slikaBlog -> putanja)}}" alt="">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 mx-auto my-5">
                <h1 class="text-center"><strong>{{$blog -> naslov }}</strong></h1>
                <p class="my-5">{{ $blog ->opis }}</p>
                @foreach($blog->blogPodnaslov as $podnaslov)
                    <h2 class="mt-5"><strong>{{ $podnaslov -> podnaslov }}</strong></h2>
                    <p class="my-3">{{ $podnaslov -> podnaslovOpis }}</p>
                    @if($podnaslov -> idSlika != NULL)

                        <div class="text-center">
                            <img src="{{asset('assets/img/'.$podnaslov->slikaPodnaslov->putanja)}}" alt="{{$podnaslov->slikaPodnaslov->alt}}" class="img-fluid">
                            <p class="fst-italic text-center">{{$podnaslov->slikaPodnaslov->alt}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    {{--    LAJKOVI     --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-5 ms-5 border-bottom border-secondary">
                <div class="row d-flex justify-content-between">
                    <div class="col-3">
                        <button type="button" class="btn btn-link my-3 ispisLajk col-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;{{$blog->lajkBlog->count()}}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade ispisLajk" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Osobe kojima se sviđa objava</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if($blog->lajkBlog->count() == 0)
                                            <h3 class="my-5">Još uvek niko nije označio da mu se objava sviđa.</h3>
                                        @endif
                                        @foreach($blog->lajkBlog as $like)
                                            <p>{{$like->lajkOsoba->ime}} {{$like->lajkOsoba->prezime}}</p>
                                        @endforeach

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-link my-3 ispisKomentar col-12" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;&nbsp;{{$blog->komBlog->count()}}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade ispisKomentar" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModal1Label">Osobe koje su komentarisale objavu</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if($blog->komBlog->count() == 0)
                                            <h3 class="my-5">Još uvek niko nije ostavio komentar.</h3>

                                        @endif
                                        @foreach($blog->komBlog as $komentar)
                                            <figure class="border-secondary border-bottom mb-5">

                                                <blockquote class="blockquote">
                                                    <h3>{{$komentar->komentar}}</h3>
                                                </blockquote>
                                                @if(session()->has('korisnik'))
                                                    @if(session()->get('korisnik.idUloga') == 1)
                                                        <figcaption class="blockquote-footer d-flex justify-content-between">
                                                            <div class="col-9">
                                                                {{$komentar->datum}} <cite title="Source Title">{{$komentar->komOsoba->ime}} {{$komentar->komOsoba->prezime}}</cite>
                                                            </div>
                                                        </figcaption>
                                                    @elseif(session()->get('korisnik.idOsoba') == $komentar->komOsoba->idOsoba && session()->get('korisnik.idUloga') == 2)
                                                            <figcaption class="blockquote-footer d-flex justify-content-between">
                                                                <div class="col-6">
                                                                    {{$komentar->datum}} <cite title="Source Title">{{$komentar->komOsoba->ime}} {{$komentar->komOsoba->prezime}}</cite>
                                                                </div>
                                                                <div class="col-2">
                                                                    <input type="button" value="Obriši" class="btn btn-outline-danger btn-lg col-12 my-3 deleteComm" data-id="{{$komentar -> idKomentar}}">
                                                                </div>
                                                                <div class="col-2">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-outline-primary col-12 my-3 editKom" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                                        Izmeni
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade editKom" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModal2Label">Izmeni komentar</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p class="visually-hidden" id="korisnikId">{{session()->get('korisnik.idOsoba')}}<p>
                                                                                    <p class="visually-hidden" id="postId">{{$blog->idBlog}}<p>
                                                                                    <p class="visually-hidden" id="idKom">{{$komentar->idKomentar}}<p>
                                                                                    <textarea name="tbKom" id="tbKom" rows="3" class="form-control">{{$komentar->komentar}}</textarea>
                                                                                    <p id="kom-err"></p>
                                                                                    <p id="editSuccess"></p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <form data-action="{{ route('editKom') }}" method="get" enctype="multipart/form-data" id="editKom">
                                                                                        @csrf
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary" id="editKom">Izmeni komentar</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
{{--                                                                    <input type="button" value="Izmeni" class="btn btn-info btn-sm col-12 editKom" data-id="'.$komentar -> idKomentar.'">--}}
                                                                </div>
                                                            </figcaption>
                                                        @else
                                                            <figcaption class="blockquote-footer">
                                                                {{$komentar->datum}} <cite title="Source Title">{{$komentar->komOsoba->ime}} {{$komentar->komOsoba->prezime}}</cite>
                                                            </figcaption>
                                                    @endif
                                                @else
                                                <figcaption class="blockquote-footer">
                                                    {{$komentar->datum}} <cite title="Source Title">{{$komentar->komOsoba->ime}} {{$komentar->komOsoba->prezime}}</cite>
                                                </figcaption>
                                                @endif
                                            </figure>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @if(session()->has('korisnik'))
        @if(session()->get('korisnik.idUloga') == 2)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5 ms-5">
                        <div class="row">
                            <div class="col-6">
                                <p class="visually-hidden" id="korisnikId">{{session()->get('korisnik.idOsoba')}}<p>
                                <p class="visually-hidden" id="postId">{{$blog->idBlog}}<p>

                                    @if(!$nizLajk->contains(session()->get('korisnik.idOsoba')))
                                        <form data-action="{{ route('like') }}" method="get" enctype="multipart/form-data" id="like">
                                            @csrf
                                            <button class="btn btn-outline-primary col-12 my-3" id="like">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;Sviđa mi se
                                            </button>
                                        </form>
                                @else
                                        <form data-action="{{ route('unlike') }}" method="get" enctype="multipart/form-data" id="unLike">
                                            @csrf
                                            <button class="btn btn-primary col-12 my-3" id="unlike">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;Ne sviđa mi se
                                            </button>
                                        </form>
                                    @endif
                            </div>



{{--                            DODAJ KOMENTAR--}}
                            <div class="col-6 my-3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary col-12 my-3 dodajKomentar" data-bs-toggle="modal" data-bs-target="#exampleModal22">
                                    <i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;&nbsp;Dodaj komentar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade dodajKomentar" id="exampleModal22" tabindex="-1" aria-labelledby="exampleModal22Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal22Label">Dodaj komentar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="visually-hidden" id="korisnikId">{{session()->get('korisnik.0.idOsoba')}}<p>
                                                <p class="visually-hidden" id="postId">{{$blog->idBlog}}<p>
                                                    <textarea placeholder="Komentar..." name="tbKom" id="tbKom" rows="3" class="form-control"></textarea>
                                                <p id="kom-err"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form data-action="{{ route('dodajKomentar') }}" method="get" enctype="multipart/form-data" id="dodajKomentar">
                                                    @csrf
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="dodajKomentar">Dodaj komentar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
                </div>
        @endif
    @endif
@endsection
