<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Task Manager' }}</title>
</head>
<body>

    @auth
        <nav class="navbar navbar-light bg-light px-3">
            <div class="ms-auto">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </nav>
    @endauth

    {{ $slot }}

</body>
</html>