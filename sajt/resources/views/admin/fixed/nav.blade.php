

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light navbar-dark">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="{{asset("assets/img/logo.png")}}" alt="AdminLTE Logo"  style="opacity: .8">

        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('adminHome')}}" class="nav-link">Pocetna</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logOut')}}" class="nav-link">Odjavi se</a>
                </li>

            </ul>


        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link msgNot" data-toggle="dropdown" href="#">
                    <i class="fas fa-comments"></i>
                    <span class="badge badge-danger navbar-badge" id="brPoruka"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div  id="porukeLista">
                    </div>
                    <a href="{{route('poruke.index')}}" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link not" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge" id="brNot"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header" id="brObav"> </span>
                    <div id="obavestenja">

                    </div>
                    <a href="{{route('aktivnosti.index')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
<aside class="main-sidebar sidebar-dark-primary" style="height: 100%; position: absolute; bottom: 0;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link ml-3">
        <span class="brand-text font-weight-light">Admin panel</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("assets/img/autor.jpg")}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

            </div>
            <div class="info">
                <a href="#" class="d-block">{{session()->get('korisnik.ime')}} {{session()->get('korisnik.prezime')}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Blogovi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('blogovi.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Dodaj blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('blogovi.index')}}" class="nav-link">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>Uredi blogove</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('poruke.index')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Poruke
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('korisnici.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Korisnici
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('aktivnosti.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Aktivnosti
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
