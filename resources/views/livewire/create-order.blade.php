<div class="container py-8 grid grid-cols-1 lg:grid-cols-5 xl:grid-cols-5 gap-6">
    <div class="lg:col-span-3 order-2 lg:order-1">
        <div class="bg-white rounded-lg shadow p-6">
            <div>
                <x-jet-label value="Nombre de contacto" />
                <x-jet-input wire:model.defer="contact" type="text"
                    placeholder="Ingrese el nombre de la persona que recibirá el producto" class="w-full mb-4" />
                <x-jet-input-error for="contact" />
            </div>

            <div>
                <x-jet-label value="Telefono de contacto" />
                <x-jet-input wire:model.defer="phone" type="text" placeholder="Ingrese un numero de contacto"
                    class="w-full" />
                <x-jet-input-error for="phone" />
            </div>
        </div>
        <div x-data="{shipping_type:@entangle('shipping_type')}">
            <p class="mt-6 mb-3 text-lg text-trueGray-700 font-semibold">Envios</p>

            <label class="flex items-center bg-white rounded-lg shadow px-6 py-4 mb-4">
                <input x-model="shipping_type" type="radio" name="shipping_type" value="1" class="text-gray-600">
                <span class="ml-2 text-trueGray-700">
                    Recojo en tienda (Calle falsa 123).
                </span>
                <span class="font-semibold text-trueGray-700 ml-auto">Gratis</span>
            </label>

            <div class="bg-white rounded-lg shadow">
                <label class="flex items-center px-6 py-4">
                    <input x-model="shipping_type" type="radio" name="shipping_type" value="2" class="text-gray-600">
                    <span class="ml-2 text-trueGray-700">
                        Envío a domicilio
                    </span>
                </label>
                <div class="px-6 pb-6 grid grid-cols-2 gap-6" :class='{"hidden":shipping_type!=2 }'>
                    {{-- Departamentos --}}
                    <div>
                        <x-jet-label value="Departamento" />
                        <select class="form-control w-full" wire:model="department_id">
                            <option value="" disabled selected>Seleccione un departamento</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="department_id" />
                    </div>

                    {{-- Ciudades --}}
                    <div>
                        <x-jet-label value="Ciudades" />
                        <select class="form-control w-full" wire:model="city_id">
                            <option value="" disabled selected>Seleccione una ciudad</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="city_id" />
                    </div>
                    {{-- Distritos --}}
                    <div>
                        <x-jet-label value="Distrito" />
                        <select class="form-control w-full" wire:model="district_id">
                            <option value="" disabled selected>Seleccione un distrito</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="district_id" />
                    </div>
                    <div>
                        <x-jet-label value="Dirección" />
                        <x-jet-input class="w-full" type="text" wire:model="address" />
                        <x-jet-input-error for="address" />

                    </div>
                    <div class="col-span-2">
                        <x-jet-label value="Referencia" />
                        <x-jet-input class="w-full" type="text" wire:model="references" />
                        <x-jet-input-error for="references" />
                    </div>
                </div>
            </div>
        </div>
        <div>
            <x-jet-button class="mt-6 mb-4" wire:click="createOrder" wire:loading.attr='disabled'
                wire:target='createOrder'>
                Continuar con la compra
            </x-jet-button>
            <hr>
            <p class="text-sm text-trueGray-700 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere
                ea mollitia explicabo perspiciatis nulla
                est cum nobis maiores, obcaecati molestiae ipsa atque adipisci molestias iure quam. Distinctio nisi
                earum mollitia.<a class="font-semibold text-trueGray-900">Politicas de privacidad</a></p>
        </div>
    </div>
    <div class="lg:col-span-2 order-1 lg:order-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-3 border-b border-gray-200 mb-2">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <div class="flex">
                                <p class="text-sm">Cant: {{ $item->qty }}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2 text-sm capitalize">- Color: {{ __($item->options['color']) }}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="mr-1 text-sm capitalize">- {{ __($item->options['size']) }}</p>
                                @endisset
                            </div>
                            <p>USD: ${{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="px-6 py-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>
            <hr class="mt-4 mb-3">

            <div class="text-trueGray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{ Cart::subtotal() }} USD</span>
                </p>
                <p class="flex justify-between items-center">
                    Envio
                    @if ($shipping_type == 1 || $shipping_cost == 0)
                        <span class="font-semibold">Gratis</span>
                    @else
                        <span class="font-semibold">{{ $shipping_cost }} USD</span>
                    @endif
                </p>
                <hr class="mt-4 mb-3">

                <p class="flex justify-between items-center">
                    <span class="text-lg">Total</span>
                    @if ($shipping_type == 1)
                        {{ Cart::subtotal() }} USD
                    @else
                        {{ Cart::subtotal() + $shipping_cost }} USD</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
