<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Web Profile')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
    <script>
        const API_TOKEN = "{{ session('api_token') }}";
    </script>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            height: 60px;
            z-index: 1050;
        }
        .navbar-brand img {
            height: 40px;
            object-fit: contain;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: calc(100vh - 60px);
            background-color: #3a4149;
            position: fixed;
            top: 60px;
            left: 0;
            overflow-y: auto;
        }

        .sidebar .sidebar-heading {
            color: #fff;
            padding: 15px 20px;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .sidebar a {
            display: block;
            color: #e9ecef;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 0.95rem;
            transition: 0.2s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }

        /* Content Styling */
        .content-wrapper {
            margin-left: 250px;
            margin-top: 60px;
            min-height: calc(100vh - 60px);
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
        }

        /* Footer Styling */
        .main-footer {
            background-color: #ffffff;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-warning fixed-top shadow-sm px-3">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
        
        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item me-2">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white fw-medium" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Administrator
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="adminDropdown">
                    <li><span class="dropdown-item-text text-muted small">{{ Auth::user()->email ?? 'admin@example.com' }}</span></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar shadow-sm">
        <div class="sidebar-heading text-center mt-2 mb-3">
            Admin Menu
        </div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">Data Project</a>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="main-content">
            @yield('content')
        </div>
        
        <!-- Footer -->
        <footer class="main-footer">
            &copy; 2026 QeiProfile. All rights reserved.
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    @yield('scripts')
</body>

</html>