<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @yield('css')
</head>
<body>
    <nav class="bg-white shadow dark:bg-gray-800">
        <div class="container py-3 max-w-md mx-auto">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-semibold text-gray-700">
                        <a class="text-xl font-bold text-gray-800 dark:text-white md:text-2xl hover:text-gray-700 dark:hover:text-gray-300" href="{{ route('index') }}">Buy-event</a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="flex-1 md:flex md:items-center md:justify-end">
                    <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8">
                        <a href="{{ route('index') }}" class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">Home</a>
                        <a href="{{ route('products') }}" class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">Browse Products</a>
                    </div>

                    <div class="flex items-center mt-4 md:mt-0">
                        @guest
                            <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 md:mx-0 md:w-auto"
                                href="{{ route('login') }}">Login</a>
                        @endguest
                        
                        @auth
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = true" type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                                    <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                        <img src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" class="object-cover w-full h-full" alt="avatar">
                                    </div>
                                </button>
                            
                                <ul class="absolute right-0 z-20 w-48 py-2 mt-5 bg-white rounded-md shadow-xl dark:bg-gray-800"
                                    x-show="open"
                                    @click.away="open = false">
                                    <a href="{{ route('user.dashboard', [auth()->user()->slug]) }}" class="text-center block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                        {{ auth()->user()->name }}
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button href="submit" class="w-full block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                            Logout
                                        </button>
                                    </form>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @yield('script')
</body>
</html>