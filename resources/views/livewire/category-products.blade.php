<div wire:init='loadProducts'>
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }}">
                        <article>
                            <figure>
                                @if ($product->images)
                                    <img class="md:h-48 md:w-full object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                @else
                                    <img class="md:h-48 md:w-full object-cover object-center"
                                        src="https://images.pexels.com/photos/230544/pexels-photo-230544.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                        alt="">
                                @endif
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
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <i class="fas fa-spinner animate-spin ease duration-300 text-6xl text-indigo-600"></i>
        </div>
    @endif

</div>
