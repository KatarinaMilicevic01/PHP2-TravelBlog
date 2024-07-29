@extends('admin.layout')
@section('content')
    <div class="content-wrapper my-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Izmeni blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Pocetna</a></li>
                            <li class="breadcrumb-item active">Izmeni blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

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
                            <form action="{{route('blogovi.update',['blogovi'=>$blog->idBlog])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="inputName">Naslov</label>
                                    <input type="text" name="naslovBlog" class="form-control" value="{{$blog->naslov}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Opis</label>
                                    <textarea name="opisBlog" class="form-control" rows="4">{{$blog->opis}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <img src="{{asset('assets/img/'.$blog->slikaBlog->putanja)}}" alt="{{$blog->slikaBlog->alt}}" class="img-fluid" style="max-height: 200px;">

                                        <input type="text" name="altBlog" class="form-control col-8 mx-auto mt-3" value="{{$blog->slikaBlog->alt}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Dodaj sliku</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="slikaBlog">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                                        </div>

                                    </div>
                                </div>
                                    <label>Kategorije</label>
                                    <div class="row" id="kategorije">

                                        <div class="col-md-6">
                                            @php $half = ceil(count($kategorije) / 2); @endphp
                                            @foreach($kategorije->take($half) as $k)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="kat[]" value="{{$k->idKategorija}}"
                                                           @if($blog->katBlog->contains($k->idKategorija)) checked @endif>
                                                    <label class="form-check-label" for="exampleCheck1">{{$k->kategorija}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach($kategorije->skip($half) as $k)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="kat[]" value="{{$k->idKategorija}}"
                                                           @if($blog->katBlog->contains($k->idKategorija)) checked @endif>
                                                    <label class="form-check-label" for="exampleCheck1">{{$k->kategorija}}</label>
                                                </div>
                                            @endforeach
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
        <!-- /.content -->
    </div>
@endsection
