@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row" id="blogoviCover">

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 mx-auto">
                <h1 class="text-center my-5"><strong>Svi postovi</strong></h1>
                @component("pages.components.searchForm", ["kategorije" => $kategorije])
                @endcomponent
                <div id="blogovi" class="mt-5">

                    @foreach($items as $i)
                        @component("pages.components.blog", ["blog" => $i])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="justify-content-center d-flex" id="paginacija">
                {{$items->links()}}
            </div>
        </div>
    </div>

@endsection
