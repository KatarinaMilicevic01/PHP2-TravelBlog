@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-5 mx-auto py-5">
                <form action="{{route('register')}}" method="POST" id="regForm">
                    @csrf
                    <h2 class="text-center my-3">Registruj se</h2>
                    <div class="form-group">
                        <input type="text" placeholder="Ime" value="{{old('ime')}}" name="ime" id="tbIme" class="form-control">
                        <p class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Prezime" value="{{old('prezime')}}" name="prezime" id="tbPrezime" class="form-control">
                        <p class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email:petar@gmail.com" value="{{old('email')}}" class="form-control">
                        <p class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Lozinka" name="lozinka" id="tbLozinka" class="form-control">
                        <p class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Potvrdi lozinku" name="lozinka2" id="tbPotvrda" class="form-control">
                        <p class="text-danger"></p>
                    </div>
                    <p class='text-center my-3'>Imate nalog?
                        <a href="{{route('logInForm')}}" class='ml-2 text-danger'>Prijavi se.</a></p>
                    @if($errors->any())
                        <ul class="alert alert-danger list-group list-group-flush">
                            @foreach($errors->all() as $e)
                                <li class="list-group-item list-group-item-danger">{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="submit" value="Registruj se" id="btnReg" class="btn btn-danger form-control my-2">

                </form>
            </div>
        </div>
    </div>

@endsection
