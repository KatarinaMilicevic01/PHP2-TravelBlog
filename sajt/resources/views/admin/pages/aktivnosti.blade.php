
@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Korisnici</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Pocetna</a></li>
                            <li class="breadcrumb-item active">Korisnici</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista korisnika</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="form-group col-3 ml-3 my-2">
                        <label>Filtriraj po datumu</label>
                        <select class="form-control" id="ddlDatum">
                            <option value="0">Izaberi datum..</option>
                            @foreach($vreme as $v)
                                <option value="{{$v}}">{{$v}}</option>
                            @endforeach

                        </select>
                    </div>
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Korisnik
                            </th>
                            <th>
                                Aktivnost
                            </th>

                            <th>
                                Blog
                            </th>
                            <th>
                                Sadrzaj
                            </th>
                            <th>
                                Vreme
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($akcije as $a)

                                <tr>
                                    <td>
                                        {{$a->idAkcija}}
                                    </td>
                                    <td>
                                        @if($a->idOsoba == null)
                                            unautorized
                                        @else
                                            {{$a->osoba->ime}} {{$a->osoba->prezime}}
                                        @endif
                                    </td>
                                    <td>{{$a->tipAkcije}}</td>
                                    <td>@if($a->idBlog)
                                            {{$a->blog->naslov}}
                                        @else
                                            /
                                        @endif</td>
                                    <td>@if($a->idKomentar)
                                            {{$a->komentar->komentar}}
                                        @elseif($a->idPoruka)
                                            {{$a->poruka->poruka}}
                                        @else
                                            /
                                        @endif
                                    <td>{{$a->vreme}}</td>
                                </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

