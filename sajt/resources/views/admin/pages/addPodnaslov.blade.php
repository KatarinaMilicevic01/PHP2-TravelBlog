@extends('admin.layout')
@section('content')
    <div class="content-wrapper my-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dodaj blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Pocetna</a></li>
                            <li class="breadcrumb-item active">Dodaj blog</li>
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
                            <h3 class="card-title">Podnaslovni podaci</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('podnaslov.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Podnaslov</label>
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
                                <input type="hidden" name="idBlog" value="{{$idBlog}}">
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

