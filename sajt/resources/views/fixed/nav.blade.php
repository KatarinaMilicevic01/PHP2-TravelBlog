<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand" href="#"><img src="{{asset("assets/img/logo.png")}}"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Početna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blogovi')}}">Blogovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('autor')}}">O autoru</a>
                </li>
                @if(session()->has("korisnik"))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('kontakt')}}">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logOut')}}">Odjavi se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:grey;"><i class="fas fa-user-circle mx-2">

                            </i>{{session()->get('korisnik.ime')}} {{session()->get('korisnik.prezime')}}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registerForm')}}">Registruj se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logInForm')}}">Log in</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
