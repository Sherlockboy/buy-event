@extends('auth.app')

@section('title')
    <title>Login</title>
@endsection

@section('css')
    
@endsection

@section('content')
    <div class="h-screen w-screen flex items-center justify-center overflow-hidden bg-gray-300 border rounded-lg dark:bg-gray-600 dark:border-gray-600">
        <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="px-6 py-4">
                <h2 class="text-3xl font-bold text-center text-gray-700 dark:text-white">Buy-event</h2>
                <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Login to account</p>
    
                <form action="{{ route('login.form') }}" method="POST">
                    @csrf
                    <div class="w-full mt-4">
                        <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="email" name="email" placeholder="you@mail.com" aria-label="Email Address" required>
                    </div>
                    <div class="w-full mt-4">
                        <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="password" name="password" placeholder="* * * * * *" aria-label="Password" required>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="#" class="text-sm text-gray-600 dark:text-gray-200 hover:text-gray-500">Forget Password?</a>
                        <button class="px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
    
            <div class="flex items-center justify-center py-4 text-center bg-gray-100 dark:bg-gray-700">
                <span class="text-sm text-gray-600 dark:text-gray-200">Don't have an account? </span>
                <a href="{{ route('register') }}" class="mx-2 text-sm font-bold text-blue-600 dark:text-blue-400 hover:text-blue-500">Register</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection