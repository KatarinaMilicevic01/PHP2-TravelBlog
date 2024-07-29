<a href="{{route('blog',['id' => $blog->idBlog])}}">
    <div class="card mb-3">
        <div class="row g-0 align-items-center justify-content-between">
            <div class="col-4">
                <div class="row justify-content-center">
                    <img src="{{asset('assets/img/'.$blog->slikaBlog->putanja)}}" class="img-fluid col-11" alt="{{$blog->slikaBlog->alt}}">
                </div>
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h3 class="card-title"><strong>{{$blog->naslov}}</strong></h3>
                    <p class="card-text">{{$blog->opis}}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{$blog->datum}}</small></p>
                </div>
            </div>
        </div>
    </div>
</a>
