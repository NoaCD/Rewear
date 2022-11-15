<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="flex justify-between items-center px-6 py-2">
            <h1 class="font-semibold text-trueGray-700 uppercase">{{ $category->name }}</h1>
            <div class="hidden md:grid grid-cols-2 border border-trueGray-200 divid-x divide-trueGray-200 text-trueGray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-trueGray-900' : '' }}"
                    wire:click="$set('view','grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-trueGray-900' : '' }}"
                    wire:click="$set('view','list')"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Subcategorias</h2>
            <ul class="divide-y divide-trueGray-300">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm cursor-pointer">
                        <a class="hover:text-trueGray-500 capitalize {{ $subcategoria == $subcategory->slug ? 'text-trueGray-800 font-bold' : '' }}"
                            wire:click="$set('subcategoria','{{ $subcategory->slug }}')">{{ $subcategory->name }}</a>
                    </li>
                @endforeach
            </ul>
            <h2 class="font-semibold text-center my-2">Marcas</h2>
            <ul class="divide-y divide-trueGray-300">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm cursor-pointer">
                        <a class="hover:text-trueGray-500 capitalize {{ $marca == $brand->name ? 'text-trueGray-800 font-bold' : '' }}"
                            wire:click="$set('marca','{{ $brand->name }}')">{{ $brand->name }}</a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button class="mt-4" wire:click='limpiar'>Eliminar filtros</x-jet-button>
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="md:h-48 md:w-full object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="{{ route('products.show', $product) }}">
                                            {{ Str::limit($product->name, 20, '...') }}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-trueGray-700">US$ {{ $product->price }}</p>
                                </div>
                            </article>
                        </li>
                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline">No contamos articulos para este filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul class="">
                    @forelse ($products as $product)
                        <x-product-list :product="$product" />
                    @empty
                        <li>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">No contamos articulos para este filtro.</span>
                        </div>
                        </li>
                    @endforelse
                </ul>
            @endif

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
