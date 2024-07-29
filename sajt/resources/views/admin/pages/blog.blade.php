@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Uredi blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Pocetna</a></li>
                            <li class="breadcrumb-item active">Uredi blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Osnovne informacije</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body p-0 text-center mx-5" id="editFormNaslov">
                    <h3>{{$blog->naslov}}</h3>
                    <p class=" my-3">{{$blog->opis}}</p>
                    <img src="{{asset('assets/img/'.$blog->slikaBlog->putanja)}}" id="slikaNaslov" style="max-height: 200px;" class="my-3" alt="{{$blog->slikaBlog->alt}}">

                <div class="project-actions text-right mb-2">
                    <a href="{{route('blogovi.edit',['blogovi'=>$blog->idBlog])}}" class="btn btn-primary btn-sm col-1" data-id="{{$blog->idBlog}}" id="izmeniNaslov">
                        <i class="fas fa-edit">
                        </i>
                        Izmeni
                    </a>
                </div>
                </div>
            </div>
            @foreach($blog->blogPodnaslov as $podnaslov)
                <div class="card" >
                    <div class="card-header" id="podnaslovEdit{{$podnaslov->idPodnaslov}}">
                        <h3 class="card-title">{{$podnaslov->podnaslov}}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0 text-center mx-5" id="editForm{{$podnaslov->idPodnaslov}}">
                        <p class=" my-3">{{$podnaslov->podnaslovOpis}}</p>
                        @if($podnaslov -> idSlika != NULL)

                            <div class="text-center">
                                <img id="slikaPodnaslov{{$podnaslov->idPodnaslov}}" src="{{asset('assets/img/'.$podnaslov->slikaPodnaslov->putanja)}}" alt="{{$podnaslov->slikaPodnaslov->alt}}" class="img-fluid" style="max-height: 200px;">
                                <p class="fst-italic text-center">{{$podnaslov->slikaPodnaslov->alt}}</p>
                            </div>
                        @endif
                        <div class="project-actions text-right mb-2 d-flex justify-content-end">
                            <a href="{{route('podnaslov.edit',['podnaslov'=>$podnaslov->idPodnaslov])}}" class="btn btn-primary btn-sm izmeniPodnaslov" data-id="{{$podnaslov->idPodnaslov}}">
                                <i class="fas fa-edit">
                                </i>
                                Izmeni
                            </a>
                            <form action="{{ route('podnaslov.destroy', ['podnaslov' => $podnaslov->idPodnaslov]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-2"><i class="fas fa-trash">
                                    </i>
                                    Obrisi</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-right">
                <a class="btn bg-success mb-3 text-right" href="{{route("podnaslov.create",['id'=>$blog->idBlog])}}">
                    <i class="fas fa-file-upload">
                    </i>
                    Dodaj novi podnaslov
                </a>

            </div>
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detalji o blogu</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Pregledi</span>
                                                <span class="info-box-number text-center text-muted mb-0">{{count($pregled)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Lajkovi</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{count($blog->lajkBlog)}}</span>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-4 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Komentari</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{count($blog->komBlog)}}</span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Komentari</h4>
                                    @foreach($blog->komBlog as $kom)
                                        <div class="post col-12 mt-2">
                                            <div class="d-flex justify-content-between">

                                                    <p class="font-weight-bold">{{$kom->komOsoba->ime}} {{$kom->komOsoba->prezime}}</p>
                                                <p class="font-italic text-gray">{{$kom->datum}}</p>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                {{$kom->komentar}}
                                            </p>
                                            <div class="text-right">
                                                <a class="btn btn-danger btn-sm text-right" href="/admin/obrisiKom/{{$kom->idKomentar}}">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Obrisi
                                                </a>

                                            </div>
                                        </div>


                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
