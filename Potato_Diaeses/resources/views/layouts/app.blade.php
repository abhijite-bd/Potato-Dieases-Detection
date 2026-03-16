<!-- resources/views/layouts/app.blade.php (নতুন করে তৈরি করতে পারো) -->
<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - আলু রোগ শনাক্তকরণ</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font - Hind Siliguri (ভালো বাংলা ফন্ট) -->
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Hind Siliguri', 'Noto Sans Bengali', sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(90deg, #28a745, #20c997);
            border: none;
            padding: 12px 28px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #218838, #1baa80);
        }

        .progress {
            height: 24px;
            border-radius: 12px;
            background-color: #e9ecef;
        }

        .progress-bar {
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        header {
            background: linear-gradient(135deg, #198754, #0d6efd);
            color: white;
            padding: 1.5rem 0;
            margin-bottom: 2rem;
        }

        .disease-name {
            color: #dc3545;
            font-weight: 700;
        }
    </style>
</head>

<body>

    <header class="text-center">
        <div class="container">
            <h1 class="mb-1 fw-bold">আলু রোগ শনাক্তকরণ</h1>
            <p class="lead">আপনার আলুর পাতার ছবি আপলোড করুন, AI দিয়ে রোগ শনাক্ত করুন</p>
        </div>
    </header>

    <main class="container mb-5">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">© {{ date('Y') }} আলু রোগ শনাক্তকরণ অ্যাপ • সকল অধিকার সংরক্ষিত</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>