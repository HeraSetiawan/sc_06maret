<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@livewireStyles
@livewireScripts
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="bi-webcam"></i> Presensi App</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0 nav-underline">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}" >Dashboard
                                <span class="visually-hidden"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="{{ url('profil') }}">Profil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Request::is(['karyawan','jabatan']) ? 'active' : '' }} dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Krayawan</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item {{ Request::is('karyawan') ? 'active' : '' }}" href="{{ url('karyawan') }}">Data Karyawan</a>
                                <a class="dropdown-item {{ Request::is('jabatan') ? 'active' : '' }}" href="{{ url('jabatan') }}">Jabatan</a>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <img src='{{ asset("storage/".Auth::user()->avatar) }}' width="45" class="rounded-circle img-thumbnail" style="aspect-ratio:1/1">
                        <b class="mt-1 mx-2 text-capitalize">{{ Auth::user()->name }}</b>
                        <button type="submit" class="btn btn-danger rounded-circle"><i class="bi-power"></i></button>
                    </form>
                </div>
            </div>
        </nav>

    </header>
    <main>
        @yield('konten')
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
