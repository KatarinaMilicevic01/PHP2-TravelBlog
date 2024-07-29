@extends('layouts.layout')

@section('content')

    <div class="container-fluid">
        <div class="row align-items-center" id="coverHome">
            <div class="col-5 ms-3">
                <h1><strong>Putovanja kao inspiracija</strong></h1>
                <h3>Blog Katarine Milićević</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 mx-auto">
                <h1 class="text-center my-5"><strong>Najnoviji postovi</strong></h1>
                @foreach($blogovi as $blog)
                    @component('pages.components.blog',['blog'=> $blog])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endsection
