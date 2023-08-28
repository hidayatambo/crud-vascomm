<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Fixed top navbar example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">



    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .card {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            padding: 10px 10px 10px 10px;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="assets/logo.png" class="card-img-top"
                    style="width: 10rem; margin-left: 2rem;" alt="" srcset=""> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <form class="d-flex justify-content-center">
                            <input class="form-control me"
                                style="width: 700px; margin-left: 150px; margin-right: 150px;" type="search"
                                placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="btn btn-outline-primary me-3"
                                    role="button">Daftar</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary" href="" role="button">Masuk</a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                    </li>
                    @endguest

                </ul>

            </div>
        </div>
    </nav>

    <main style="margin-top: 5rem">
        <div id="myCarousel" class="carousel slide  d-flex justify-content-center" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner text-center">
                <div class="carousel-item active ">
                    <img src="assets/banner.png" class="w-75" alt="" srcset="">
                </div>
                <div class="carousel-item">
                    <img src="assets/banner.png" class="w-75" alt="" srcset="">
                </div>
                <div class="carousel-item">
                    <img src="assets/banner.png" class="w-75" alt="" srcset="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" style="margin-left: 12rem;" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark" style="margin-right: 12rem;"
                    aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container py-4">
            <header class="pb-3 mb-4 pl-5">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4" style="padding-left: 6.5rem;">Terbaru</span>
                </a>
            </header>
            <div id="myCarousel1" class="carousel slide  d-flex justify-content-center" data-bs-ride="carousel">
                <div class="carousel-indicators" hidden>
                    <button type="button" data-bs-target="#myCarousel1" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel1" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel1" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner text-center">
                    <div class="carousel-item active ">
                        <div class="row ">
                            <div class="col-md-12 me-2">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia</p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row ">
                            <div class="col-md-12 me-2">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row ">
                            <div class="col-md-12 me-2">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <img src="assets/parfum.png" class="card-img-top" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <p class="card-title">Euodia <br> </p>
                                                <a href="" class="btn card-text text-primary">
                                                    <p><small>IDR. 5xxx.xxx.xx</small></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel1"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" style="margin-left: -1rem; background-color:#000"
                        aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel1"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" style="margin-right: -1rem; background-color:#000"
                        aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <header class="pb-3 mt-4 pl-5">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4" style="padding-left: 6.5rem;">Produk Tersedia</span>
                </a>
            </header>
            <div class="row  text-center">
                <div class="col-md-12 me-2">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title ">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 me-2">
                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <img src="assets/parfum.png" class="card-img-top" alt="" srcset="">
                                <div class="card-body">
                                    <p class="card-title">Euodia <br> </p>
                                    <a href="" class="btn card-text text-primary">
                                        <p><small>IDR. 5xxx.xxx.xx</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row d-flex justify-content-center">
                                    <button class="btn btn-outline-primary"
                                        style="width: 10rem; margin-top: 2rem;">Lihat lebih
                                        banyak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->


        <!-- FOOTER -->
    </main>
    <footer class="container">
        <div class="row border-top">
            <div class="col-md-12">
                <div class="row d-flex justify-content-start" style="margin-left: 2rem;">
                    <div class="col-3 text-center my-5">
                        <img src="assets/logo.png" class="card-img-top mb-5" alt="" srcset="">
                        <p class="text-center">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo in vestibulum, sed
                            dapibus tristique
                            nullam.
                        </p> <br>
                        <img src="assets/icpn.png" alt="">
                    </div>
                    <div class="col-2 my-5" style="margin-left: 3rem;">
                        <h4 class="text-left">Layanan
                        </h4><br>
                        <p>Bantuan</p>
                        </p>
                        <p>Tanya Jawab</p>
                        </p>
                        <p>Hubungi Kami</p>
                        </p>
                        <p>Cara Berjualan</p>
                    </div>
                    <div class="col-2 my-5" style="margin-left: -3rem;">
                        <h4 class="text-left">Tentang Kami
                        </h4> <br>
                        <p>About Us</p>
                        </p>
                        <p>Karir</p>
                        </p>
                        <p>Blog</p>
                        </p>
                        <p>Kebijakan Privasi</p>
                        </p>
                        <p>Syarat dan Ketentuan</p>
                    </div>
                    <div class="col-2 my-5">
                        <h4 class="text-left">Mitra
                        </h4> <br>
                        <p>Supplier</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
