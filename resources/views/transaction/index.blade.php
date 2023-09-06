<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="grid md:grid-cols-3 gap-4 mb-10">
                    <div class="md:col-span-2">
                        <h5 class="">
                            All Transactions
                        </h5>
                        <p class="">
                            Make transaction with your customer
                        </p>
                    </div>
                    <div class="justify-end flex items-center">
                        <div>
                            <a href="{{ route('transaction.create') }}" class="btn btn-primary">Add Transaction</a>
                        </div>
                    </div>
                </div>

                <div class="mb-8 flex gap-4 justify-between">
                    <div>
                        {{-- number of pagination select --}}
                        @php
                            $page = [10, 25, 50];
                            $perPage = request()->perPage ?? 10;
                        @endphp
                        <select onchange="perPage()" class="form-control form-select md:p-4 py-4">
                            @foreach ($page as $item)
                                <option {{ $perPage == $item ? 'selected' : '' }} value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="md:w-1/2 w-full">
                        
                        <form action="{{ route('transaction.index', ['perPage' => $perPage]) }}">   
                            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" name="search" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" value="{{ request()->search }}">
                                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="">
                        <thead class="">
                            <tr>
                                <th scope="col">
                                    Reference Number
                                </th>
                                <th scope="col">
                                    Product
                                </th>
                                <th scope="col">
                                    Price
                                </th>
                                <th scope="col">
                                    Quantity
                                </th>
                                <th scope="col">
                                    Payment Amount
                                </th>
                                <th scope="col">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                            <tr class="">
                                <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->reference_no }}
                                </th>
                                <td class="">
                                    {{ $transaction->product->name }}
                                </td>
                                <td class="">
                                    {{ $transaction->quantity }}
                                </td>
                                <td class="">
                                    {{ $transaction->price }}
                                </td>
                                <td class="">
                                    {{ $transaction->payment_amount }}
                                </td>
                                <td class="">
                                    {{-- delete --}}
                                    <form action="{{ route('transaction.destroy', $transaction) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No data found
                                </td>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pt-8">
                    {{ $transactions->appends(request()->except('page'))->links() }}
                </div>

            </div>

        </div>
    </div>

    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

    <script>
        function perPage() {
            var e = document.getElementsByClassName("form-select")[0];
            var perPage = e.options[e.selectedIndex].value;
            window.location.href = "{{ route('transaction.index') }}" + "?perPage=" + perPage  + '&search=' + '{{ request()->search }}' ;
        }
    </script>
    @include('scripts.delete')
</x-app-layout>
