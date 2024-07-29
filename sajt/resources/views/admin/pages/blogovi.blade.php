@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blogovi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Pocetna</a></li>
                            <li class="breadcrumb-item active">Blogovi</li>
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
                    <h3 class="card-title">Lista blogova</h3>

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
                                Naslov
                            </th>
                            <th>
                                Podnaslovi
                            </th>
                            <th>
                                Kategorije
                            </th>
                            <th>
                                Br like
                            </th>
                            <th>
                                Br kom
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogovi as $b)
{{--                            {{dd($b)}}--}}
                            <tr>
                                <td>
                                    {{$b->idBlog}}
                                </td>
                                <td>
                                    {{$b->naslov}}
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        @foreach($b->blogPodnaslov as $index => $podnaslov)
                                            <li class="list-inline-item">
                                                {{$podnaslov->podnaslov}}
                                                @if($index < count($b->blogPodnaslov) - 1)
                                                    ,
                                                @endif
                                            </li>
                                        @endforeach

                                    </ul>
                                </td>
                                <td>
                                    @foreach($b->katBlog as $index => $kat)
                                        <li class="list-inline-item">
                                            {{$kat->kategorija}}
                                            @if($index < count($b->katBlog) - 1)
                                                ,
                                            @endif
                                        </li>
                                    @endforeach

                                </td>
                                <td>
                                    {{count($b->lajkBlog)}}
                                </td>
                                <td>
                                    {{count($b->komBlog)}}
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm col-12 mb-2" href="{{route('blogovi.show',['blogovi'=>$b->idBlog])}}">
                                        <i class="fas fa-eye">
                                        </i>
                                        Pregled
                                    </a>
{{--                                    <a class="btn btn-danger btn-sm col-12" href="{{route('blogovi.destroy',['blogovi'=>$b->idBlog])}}">--}}
{{--                                        <i class="fas fa-trash">--}}
{{--                                        </i>--}}
{{--                                        Obrisi--}}
{{--                                    </a>--}}
                                    <form action="{{ route('blogovi.destroy', ['blogovi' => $b->idBlog]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm col-12"><i class="fas fa-trash">
                                                                                    </i>
                                                                                    Obrisi</button>
                                    </form>
                                </td>
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
