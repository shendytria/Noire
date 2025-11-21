<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noiré Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background-color: #212529;
            color: white;
            position: fixed;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #343a40;
        }

        .main-content {
            margin-left: 230px;
            padding: 20px;
        }

        .navbar {
            background-color: #fff !important;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="p-3 mb-3 border-bottom border-secondary">
            <h5>Noiré Admin</h5>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Products</a>
        <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Users</a>
        <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">Blogs</a>
        <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">Testimonials</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-auto p-3">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100">Logout</button>
        </form>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-light px-3">
            <span class="navbar-text">
                Hi, {{ auth()->user()->name }}
            </span>
        </nav>

        <div class="container-fluid mt-4">
            @yield('content')
        </div>
    </div>
</body>

</html>
