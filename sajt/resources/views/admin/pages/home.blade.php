@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
    <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header text-warning text-bold" style='background:url("{{asset('assets/img/1685686448___madeira.jpg')}}"); opacity: 0.7; background-repeat: no-repeat; height: 45vh; background-size: cover; background-position: left; '>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{asset('assets/img/autor.jpg')}}" style="position: relative; top:25vh;" alt="User Avatar">
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{$blogovi->count()}}</h5>
                        <span class="description-text">Objava</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{$korisnici->count()}}</h5>
                        <span class="description-text">Registrovanih korisnika</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">{{$lajkovi->count()}}</h5>
                        <span class="description-text">Lajkova</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane col-8 mx-auto" id="timeline">
        <h3 class="text-center my-4">Aktivnosti u poslednja 2 dana</h3>
        <!-- The timeline -->
        <div class="timeline timeline-inverse">
            <!-- timeline time label -->
            <div class="time-label">
                        <span class="bg-danger">
                        {{ now()->locale('sr')->isoFormat('Do MMMM YYYY.') }}
                        </span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->

                @foreach($akcije as $a)
                    @if($a->tipAkcije == 'Poruka')
                    <div>
                        <i class="fas fa-envelope bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> {{$a->vreme}}</span>

                            <h3 class="timeline-header"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> salje poruku</h3>

                            <div class="timeline-body">
                                {{$a->poruka->poruka}}
                            </div>
                        </div>
                    </div>
                    <!-- END timeline item -->
                    @endif
                    @if($a->tipAkcije == 'Logovanje')
                        <div>
                            <i class="fas fa-user bg-orange"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> {{$a->vreme}}</span>

                                <h3 class="timeline-header border-0"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> se ulogovala/o
                                </h3>
                            </div>
                        </div>
                    <!-- END timeline item -->
                   @endif
                    @if($a->tipAkcije == 'Registrovanje')
                        <div>
                            <i class="fas fa-user-plus bg-red"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> {{$a->vreme}}</span>

                                <h3 class="timeline-header border-0"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> se registrovala/o
                                </h3>
                            </div>
                        </div>
                        <!-- END timeline item -->
                    @endif
                    @if($a->tipAkcije == 'Lajk')
                            <div>
                                <i class="fas fa-thumbs-up bg-info"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> {{$a->vreme}}</span>

                                    <h3 class="timeline-header border-0"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> je lajkovao blog "{{$a->blog->naslov}}"
                                    </h3>
                                </div>
                            </div>
                            <!-- END timeline item -->
                        @endif
                        @if($a->tipAkcije == 'Dislajk')
                            <div>
                                <i class="fas fa-thumbs-down bg-info"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> {{$a->vreme}}</span>

                                    <h3 class="timeline-header border-0"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> je dislajkovao blog "{{$a->blog->naslov}}"
                                    </h3>
                                </div>
                            </div>
                            <!-- END timeline item -->
                        @endif
                    @if($a->tipAkcije == 'Komentar')
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-comments bg-warning"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i>{{$a->vreme}}</span>

                                    <h3 class="timeline-header"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> komentarisala je blog "{{$a->blog->naslov}}"</h3>

                                    <div class="timeline-body">
                                        {{$a->komentar->komentar}}
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="/admin/obrisiKom/{{$a->idKomentar}}" class="btn btn-danger btn-flat btn-sm">Obrisi komentar</a>
                                    </div>
                                </div>
                            </div>
                    @endif
                        @if($a->tipAkcije == 'Izmena komentara')
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-comments bg-warning"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i>{{$a->vreme}}</span>

                                    <h3 class="timeline-header"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a>izmenio/la je komentar bloga "{{$a->blog->naslov}}"</h3>

                                </div>
                            </div>
                        @endif
                    @if($a->tipAkcije == 'Pregled bloga')
                        <div>
                            <i class="fas fa-eye bg-navy"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> {{$a->vreme}}</span>
                                @if($a->idOsoba == null)
                                    <h3 class="timeline-header border-0"><a href="#">unautorized</a> je pregledala blog "{{$a->blog->naslov}}"

                                    @else
                                    <h3 class="timeline-header border-0"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> je pregledala blog "{{$a->blog->naslov}}"

                                        @endif
{{--                                <h3 class="timeline-header border-0"><a href="#">{{$a->osoba->ime}} {{$a->osoba->prezime}}</a> je pregledala blog "{{$a->blog->naslov}}"--}}
                                </h3>
                            </div>
                        </div>
                        <!-- END timeline item -->
                    @endif
            @endforeach
            <div>
                <i class="far fa-clock bg-gray"></i>
            </div>
        </div>
    </div>
    <!-- /.tab-pane -->
    </div>
@endsection
