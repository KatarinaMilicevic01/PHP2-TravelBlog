@extends('admin.layout')
@section('content')
    <div class="content-wrapper my-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Izmeni podnaslov</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Pocetna</a></li>
                            <li class="breadcrumb-item active">Izmeni podnaslov</li>
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
                            <h3 class="card-title">Podaci o podnaslovu</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('podnaslov.update',['podnaslov'=>$podnaslov->idPodnaslov])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="inputName">Naslov</label>
                                    <input type="text" name="naslov" class="form-control" value="{{$podnaslov->podnaslov}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Opis</label>
                                    <textarea name="opis" class="form-control" rows="4">{{$podnaslov->podnaslovOpis}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <img src="{{asset('assets/img/'.$podnaslov->slikaPodnaslov->putanja)}}" alt="{{$podnaslov->slikaPodnaslov->alt}}" class="img-fluid" style="max-height: 200px;">

                                        <input type="text" name="alt" class="form-control col-8 mx-auto mt-3" value="{{$podnaslov->slikaPodnaslov->alt}}">
                                    </div>
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
