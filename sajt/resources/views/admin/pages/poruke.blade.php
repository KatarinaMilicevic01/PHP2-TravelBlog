@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Inbox</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('adminHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-11 mx-auto">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                    @foreach($poruke as $p)
                                        <tr>
                                            <td>
                                                <form action="{{route('poruke.destroy',['poruke'=>$p->idPoruka])}}" method="post">
                                                @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-default btn-sm">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route('poruke.update',['poruke'=>$p->idPoruka])}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="mailbox-star">
                                                    <button class="btn btn-light btn-sm" type="submit"><i class="fas fa-star
                                                @if($p->procitano == 1)
                                                    text-secondary
                                                    @else
                                                    text-warning
                                                    @endif
                                            "></i></button></div>
                                                </form>
                                                </td>
                                            <td class="mailbox-name"><p>{{$p->osoba->ime}} {{$p->osoba->prezime}}</p></td>
                                            <td class="mailbox-subject"><b>{{$p->naslov}}</b> - {{$p->poruka}}
                                            </td>
                                            <td class="mailbox-date"><p>{{$p->datum}}</p></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
