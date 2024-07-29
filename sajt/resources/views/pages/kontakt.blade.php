@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 mx-auto my-2">
                <h2 class="my-5"><strong>Ukoliko imaš bilo kakvo pitanje, sugestiju ili kritiku, osećaj se slobodno da me kontaktiraš</strong></h2>
                <form action="{{route('posaljiPoruku')}}" method="get">
                    @csrf
                    <div class="form-group my-2">
                        <input type="hidden"  name="email" value="{{session()->get('korisnik.email')}}">
                        <input type="hidden"  name="korisnikId" value="{{session()->get('korisnik.idOsoba')}}">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" placeholder="Naslov" name="naslov" id="tbNaslov" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <textarea placeholder="Tekst poruke..." name="poruka" id="tbPoruka" rows="3" class="form-control"></textarea>
                    </div>
                    <input type="submit" id="tbSend" value="Pošalji" class="btn btn-success form-control my-5">
                </form>
                @if($errors->any())
                    <ul class="alert alert-danger list-group list-group-flush mb-3">
                        @foreach($errors->all() as $e)
                            <li class="list-group-item list-group-item-danger">{{$e}}</li>
                        @endforeach
                    </ul>
                @endif
                @if(isset($msg))
                    <p class="alert alert-success">Uspesno ste poslali poruku.</p>
                @endif

            </div>
        </div>
    </div>
@endsection
