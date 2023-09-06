<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
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
                            <a href="{{ route('product.index') }}" class="btn btn-light">Back</a>
                        </div>
                    </div>
                </div>

                <form action="{{ $action }}" method="POST">
                    <div>
                        @method($method)
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control max-w-xl" id="name" name="name" value="{{ old('name') ?? @$product->name }}" placeholder="Product Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control max-w-xl" id="price" name="price" value="{{ old('price') ?? @$product->price }}" placeholder="example: 20000">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control max-w-xl" id="stock" name="stock" value="{{ old('stock') ?? @$product->stock }}" placeholder="example: 10">
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Product Description">{{ old('description') ?? @$product->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
