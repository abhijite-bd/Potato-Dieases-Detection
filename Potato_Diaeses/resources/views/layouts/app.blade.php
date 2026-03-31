<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - আলু রোগ শনাক্তকরণ</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Hind Siliguri', 'Noto Sans Bengali', sans-serif;
            background-color: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        .btn-primary {
            background: linear-gradient(90deg, #28a745, #20c997);
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #218838, #1baa80);
        }

        .progress {
            height: 24px;
            border-radius: 12px;
        }

        .progress-bar {
            font-weight: 600;
        }

        .disease-name {
            color: #dc3545;
            font-weight: 700;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navigation')

    {{-- Page Content --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>© {{ date('Y') }} আলু রোগ শনাক্তকরণ অ্যাপ • সকল অধিকার সংরক্ষিত</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>