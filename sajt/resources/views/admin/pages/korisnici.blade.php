
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
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Ime
                                </th>
                                <th>
                                    Prezime
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Br like
                                </th>
                                <th>
                                    Br kom
                                </th>
                                <th>
                                    Br pregleda
                                </th>
                                <th>
                                    Br poruka
                                </th>
                                <th>Br logovanja</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($osobe as $o)
                                @if($o->idUloga == 2)
                                <tr>
                                    <td>
                                        {{$o->idOsoba}}
                                    </td>
                                    <td>
                                        {{$o->ime}}
                                    </td>
                                    <td>
                                        {{$o->prezime}}
                                    </td>
                                    <td>{{$o->email}}</td>
                                    <td>@if($o->akcije)
                                            {{$o->akcije->where('tipAkcije','=','Lajk')->where('idOsoba','=',$o->idOsoba)->count()}}
                                        @else
                                            0
                                        @endif</td>
                                    <td>@if($o->akcije)
                                            {{$o->akcije->where('tipAkcije','=','Komentar')->where('idOsoba','=',$o->idOsoba)->count()}}
                                        @else
                                            0
                                        @endif</td>
                                    <td>@if($o->akcije)
                                            {{$o->akcije->where('tipAkcije','=','Pregled bloga')->where('idOsoba','=',$o->idOsoba)->count()}}
                                        @else
                                            0
                                        @endif</td>
                                    <td>@if($o->akcije)
                                            {{$o->akcije->where('tipAkcije','=','Poruka')->where('idOsoba','=',$o->idOsoba)->count()}}
                                        @else
                                            0
                                        @endif</td>
                                    <td>@if($o->akcije)
                                            {{$o->akcije->where('tipAkcije','=','Logovanje')->where('idOsoba','=',$o->idOsoba)->count()}}
                                        @else
                                            0
                                        @endif</td>
                                    <td class="project-actions text-center">
                                        <form action="{{route('korisnici.destroy',['korisnici'=>$o->idOsoba])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm col-12">
                                                <i class="fas fa-trash">
                                                </i>
                                                Obrisi
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
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

