@extends('frontend.layouts.app')

@section('title')
    <title>Dashboard - {{ $user->name }}</title>
@endsection

@section('content')
    <div class="w-full h-full min-h-screen bg-gray-200 py-8">
        <div class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <img class="object-cover w-full h-56" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
            
            <div class="py-5 text-center">
                <a href="#" class="block text-2xl font-bold text-gray-800 dark:text-white">{{ $user->name }}</a>
                <span class="text-sm text-gray-700 dark:text-gray-200 block">+{{ $user->phone }}</span>
                <span class="text-sm text-gray-700 dark:text-gray-200 block">{{ $user->email }}</span>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
            <div class="py-8">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                        Product
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                        Price
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                        Order date
                                    </th>
                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <a href="#" class="block relative">
                                                        <img alt="product" src="{{ $order->product->image }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                                    </a>
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $order->product->title }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $order->product->price }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $order->created_at }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if ($order->status == 1)
                                                <span class="relative inline-block px-3 py-1 font-semibold text-yellow-500 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        pending...
                                                    </span>
                                                </span>
                                            @else
                                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        accepted
                                                    </span>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                                            <div class="flex items-center justify-center w-12 bg-yellow-400">
                                                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                                                </svg>
                                            </div>
                                            
                                            <div class="px-4 py-2 -mx-3">
                                                <div class="mx-3">
                                                    <span class="font-semibold text-yellow-400 dark:text-yellow-300">Warning</span>
                                                    <p class="text-sm text-gray-600 dark:text-gray-200">No orders yet!</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection