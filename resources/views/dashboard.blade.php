<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <section class="bg-white dark:bg-gray-900 mb-8">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                    <h1
                        class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">
                        Welcome to Product Management System
                    </h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                    </p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('transaction.create') }}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Make Transaction
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="{{ route('product.index') }}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Product List
                        </a>
                    </div>
                </div>
            </section>

            <div class="grid md:grid-cols-3 gap-4">
                <div class="card">
                    <h5 class="text-blue-600">Products</h5>
                    <div class="flex justify-between">
                        <p class="font-bold text-blue-600">{{ $products }}</p>
                        <p><span class="font-bold">{{ $items }}</span> items in total</p>
                    </div>
                </div>

                <div class="card">
                    <h5 class="text-purple-600">Transactions</h5>
                    <div class="flex justify-between">
                        <p  class="font-bold text-purple-600">{{ $transactions }}</p>
                        <p><span class="font-bold">{{ $item_sold }}</span> items sold</p>
                    </div>
                </div>

                <div class="card">
                    <h5 class="text-pink-600">Revenue</h5>
                    <p class="font-bold text-pink-600">{{ $revenue }}</p>
                </div>
            </div>
            
            {{--  --}}

        </div>
    </div>
</x-app-layout>
