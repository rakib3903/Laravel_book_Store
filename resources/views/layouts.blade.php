<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="text-2xl font-bold text-indigo-600">
                    MyApp
                </div>

                <div class="flex space-x-6">
                    <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    @if(auth()->check())
                        <a href="{{route('logout')}}" class="text-gray-700 hover:text-indigo-600 font-medium">Logout</a>
                    @else
                        <a href="/login" class="text-gray-700 hover:text-indigo-600 font-medium">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>



    @yield('content')

</body>
</html>