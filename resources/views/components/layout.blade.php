<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-100 text-state-900">
    <header class="bg-slate-800 shadow-lg">
        <nav>
            <a href="{{route('home')}}" class="nav-link">Home</a>
            
            <div class="flex items-center gap-4">
                <a href="#" class="nav-link">Login</a>
                <a href="{{ route('register')}}" class="nav-link">Register</a>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot}}
    </main>
</body>
</html>