<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'আলু রোগ শনাক্তকরণ') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Hind Siliguri', sans-serif;
            background: linear-gradient(135deg, #198754, #0d6efd);
            min-height: 100vh;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center py-5">

    <div class="w-100" style="max-width: 420px; padding: 0 1rem;">

        {{-- Logo / Brand --}}
        <div class="text-center mb-4">
            <div class="display-4 mb-2">🌿</div>
            <h4 class="text-white fw-bold">আলু রোগ শনাক্তকরণ</h4>
            <p class="text-white-50 small">AI দিয়ে আলুর রোগ শনাক্ত করুন</p>
        </div>

        {{-- Auth Card --}}
        <div class="card border-0 rounded-4 shadow-lg p-4">
            {{ $slot }}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>