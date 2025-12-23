<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Freelance Job Board</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Professional font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style> /* minor container width tweak */
        .container-max { max-width: 1100px; }
        /* apply Inter as the primary UI font */
        body { font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="container-max mx-auto px-4 py-6">
        <header class="flex items-center justify-between mb-8">
            <a href="/" class="flex items-center gap-3">
                <svg class="w-10 h-10 text-indigo-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7l10 5 10-5-10-5z" fill="currentColor"/></svg>
                <div>
                    <h1 class="text-2xl font-bold">Freelance Job Board</h1>
                    <p class="text-sm text-gray-500">Find and post freelance opportunities</p>
                </div>
            </a>

            <nav class="flex items-center gap-4">
                <a href="{{ route('jobs.index') }}" class="text-gray-700 hover:text-indigo-600">Jobs</a>
                <a href="{{ url('/high-value-jobs') }}" class="text-gray-700 hover:text-indigo-600">High Value</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded bg-indigo-600 text-white">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded border border-indigo-600 text-indigo-600">Register</a>
                @endauth
            </nav>
        </header>

        @include('partials.flash')

        <main class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <section class="lg:col-span-2">
                <div class="bg-white shadow-md rounded p-6">@yield('content')</div>
            </section>

            <aside>
                <div class="bg-white shadow rounded p-4">
                    <h3 class="font-semibold">Quick Links</h3>
                    <ul class="mt-3 text-sm text-gray-600 space-y-2">
                        <li><a href="{{ route('jobs.index') }}" class="hover:text-indigo-600">All Jobs</a></li>
                        <li><a href="{{ url('/high-value-jobs') }}" class="hover:text-indigo-600">High Value Jobs</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="hover:text-indigo-600">Edit Profile</a></li>
                    </ul>
                </div>
            </aside>
        </main>

        <footer class="mt-10 text-center text-sm text-gray-500">© {{ date('Y') }} Freelance Job Board</footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
