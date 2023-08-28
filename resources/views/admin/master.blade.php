<!DOCTYPE html>
<html>

<head>
    <title>Navbar & Sidebar Example with Bootstrap 5</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Add your custom styles here */
        #sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0;
            width: 230px;
            transition: all 0.3s;
            background-color: #f8f9fa;
        }
    
        #sidebar.active {
            width: 80px;
        }
    
        #content {
            margin-left: 230px;
            transition: all 0.3s;
        }
    
        #content.active {
            margin-left: 80px;
        }
    
        .navbar-brand img {
            max-width: 100%;
            height: auto;
        }
    
        #sidebar .nav-item a.nav-link {
            color: black;
            background-color: transparent;
            transition: background-color 0.1s ease-in-out;
        }
    
        .nav-link.active,
        .nav-link:hover {
            background-color: #41A0E4;
            color: white;
        }
    
        #sidebar .nav-item a.nav-link:hover {
            background-color: #41A0E4;
            color: white;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg" style="height: 4rem;background-color:#ffffff">
        <div class="container">
            <button class="navbar-toggler" type="button" id="sidebarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <small style="font-size: 11px; color:#41A0E4">Hallo Admin,</small><br>
                        <small>{{ auth('admin')->user()->name }}</small>
                    </li>
                    <li class="nav-item">
                        <img src="{{ asset('admin/images/profile.png') }}" alt="Profile" class="rounded-circle" width="50" height="50">
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link- dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="sr-only"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="userDropdown">
                            
                            <li>
                                <img src="{{ asset('admin/images/profile.png') }}" alt="Profile" class="rounded-circle" width="50" height="50"><br>
                                <small style="font-size: 11px; color:#41A0E4">Hallo Admin,</small><br>
                                <small>{{ auth('admin')->user()->name }}</small>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn">
                                        <i class="bi bi-box icon-image"></i> Logout
                                    </button>
                                </form>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2" style="background-color:#ffffff">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <a class="navbar-brand" href="#"
                            style="margin-top: -2em; margin-left: 2rem; margin-bottom: 3rem">
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="150" height="80">
                        </a>
                    </ul>
                    <ul class="nav flex-column" style="margin-left:1rem;color:#000">
                        <li class="nav-item">
                            <a class="nav-link active"
                                href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-house-door icon-image"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}"
                                href="{{ route('admin.user') }}">
                                <i class="bi bi-person icon-image"></i> Manajemen User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/produk') ? 'active' : '' }}"
                                href="{{ route('admin.produk') }}">
                                <i class="bi bi-box icon-image"></i> Manajemen Produk
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main id="content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    @stack('scripts')

    <script>
        // Toggle sidebar width
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        });
    </script>
</body>

</html>
