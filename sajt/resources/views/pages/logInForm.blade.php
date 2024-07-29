@extends('layouts.layout')

@section('content')
    <div class="container-fluid" style="height:80vh;">
        <div class="row">
            <div class="col-4 mx-auto py-5" id="logForm">
                <form action="{{route('logIn')}}" method="POST">
                    @csrf
                    <h2 class="text-center my-3">Prijavi se</h2>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{old('email')}}" id="tbEmail" class="form-control">
                        <p class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Lozinka</label>
                        <input type="password" name="lozinka" id="tbLozinka" class="form-control">
                        <p class="text-danger"></p>
                    </div>
                    <p class='text-center my-3'>Nemate nalog?
                        <a href="{{route('registerForm')}}" class='ml-2 text-primary'>Registruj se.</a>
                    </p>

                    @if(session('err'))
                        <ul class="alert alert-danger list-group list-group-flush mb-3">
                            @foreach(session('err')->all() as $e)
                                <li class="list-group-item list-group-item-danger">{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if($errors->any())
                        <ul class="alert alert-danger list-group list-group-flush mb-3">
                            @foreach($errors->all() as $e)
                                <li class="list-group-item list-group-item-danger">{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <button type="submit" id="btnLog" class="btn btn-primary form-control">Prijavi se</button>
                    <p id="error"></p>
                </form>
            </div>
        </div>
    </div>
@endsection
