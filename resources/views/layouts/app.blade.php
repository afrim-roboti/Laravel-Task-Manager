<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Menaxhimi i Detyrave')</title>
    
    <!-- Lidhja për Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Lidhja për Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: linear-gradient(90deg, #0062E6, #33AEFF); /* Gradient për një pamje më moderne */
        }
        .navbar-brand {
            color: #fff !important;
            font-size: 1.8rem; /* Madhësia e shkronjave për të dukur më bukur */
            font-weight: bold;
            letter-spacing: 1px;
        }
        .navbar .container {
            display: flex;
            justify-content: center;
            position: relative;
        }
        .navbar-nav {
            position: absolute;
            right: 0;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary, .btn-primary:focus, .btn-primary:hover {
            background-color: #33AEFF;
            border-color: #33AEFF;
            font-weight: bold;
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #e9ecef;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Emri i Aplikacionit në mes -->
        <span class="navbar-brand">TODO-APP</span>

        <!-- Butonat e Auth për përdoruesit e autentifikuar ose të paautentifikuar -->
        <div class="navbar-nav">
            @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                </li>
            @endguest
        </div>
    </div>
</nav>

<div class="container mt-5">
    <!-- Flash Toast për mesazhet e suksesit -->
    @if (session('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Shfaq toast për 5 sekonda nëse ekziston një mesazh suksesi
    $(document).ready(function () {
        var toastEl = document.getElementById('successToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
</body>
</html>
