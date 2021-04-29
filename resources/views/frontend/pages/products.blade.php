@extends('frontend.layouts.app')

@section('title')
    <title>Products</title>
@endsection

@section('content')
    <div class="w-full h-full bg-gray-200 py-8">
        @forelse ($products as $product)
                <div class="flex max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800
                    @if(!$loop->first)  mt-4 @endif
                    @if(!$loop->last) mb-4 @endif"
                >
                    <div class="w-1/3 bg-cover" style="background-image: url({{ $product->image }})"></div>
            
                    <div class="w-2/3 p-4 md:p-4">
                        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $product->title }}</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $product->description }}</p>
            
                        <div class="flex mt-2 item-center">
                            <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                            </svg>
                            <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                            </svg>
                            <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                            </svg>
                            <svg class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                            </svg>
                            <svg class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                            </svg>
                        </div>
            
                        <div class="flex justify-between mt-3 item-center">
                            <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">{{ $product->price }}</h1>
                            <a href="{{ route('buy', [$product->id]) }}" class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Buy</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 bg-yellow-400">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                        </svg>
                    </div>
                    
                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-yellow-400 dark:text-yellow-300">Warning</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">No products yet!</p>
                        </div>
                    </div>
                </div>
            @endforelse
    </div>
@endsection