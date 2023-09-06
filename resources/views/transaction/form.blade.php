<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="grid md:grid-cols-3 gap-4 mb-4">
                    <div class="md:col-span-2">
                        <h5 class="">
                            {{ $title }}
                        </h5>
                    </div>
                    <div class="justify-end flex items-center">
                        <div>
                            <a href="{{ route('transaction.index') }}" class="btn btn-light">Back</a>
                        </div>
                    </div>
                </div>

                <form action="{{ $action }}" method="POST">
                    <div>
                        @method($method)
                        @csrf
                        <div class="mb-3 grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="price" class="form-label">Product</label>
                                <select class="form-control max-w-xl" id="product_id" name="product_id">
                                    <option value="">-- Select Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id  ? 'selected' : ''}}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control max-w-xl" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="example: 10">
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button class="btn btn-primary" type="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
