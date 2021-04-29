@extends('frontend.layouts.app')

@section('title')
    <title>Home</title>
@endsection

@section('content')
    <div class="container max-w-xl py-16 mx-auto">
        <div class="items-center md:flex">
            <div class="w-full md:w-1/2">
                <div class="max-w-lg">
                    <h1 class="text-2xl font-semibold text-gray-800 uppercase dark:text-white md:text-3xl">Best Place To Choose Your Products</h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro beatae error laborum ab amet sunt recusandae? Reiciendis natus perspiciatis optio.</p>
                    <a href="{{ route('products') }}" class="block w-28 text-center py-2 mt-4 text-sm font-medium text-white uppercase bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Shop Now</a>
                </div>
            </div>

            <div class="flex items-center justify-center w-full mt-6 md:mt-0 md:w-1/2">
                <img class="w-full h-full max-w-2xl" src="{{ asset('images/catalogue.svg') }}" alt="">
            </div>
        </div>
    </div>
@endsection