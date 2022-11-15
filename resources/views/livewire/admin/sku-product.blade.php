<div wire:ignore>
    <div class="grid grid-cols-3 gap-6 mb-4">
        <div>
            <x-jet-label value="Colores" />
            <select class="w-full form-control" wire:model.defer="id_color">
                <option value="" selected disabled>Selecciona un color</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->pivot->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="id_color" />
        </div>
        <div>
            <x-jet-label value="Tallas" />
            <select class="w-full form-control" wire:model.defer="id_size">
                <option value="" selected disabled>Selecciona una talla</option>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->code }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="id_size" />
        </div>
        <div>
            <x-jet-label value="SKU" />
            <x-jet-input wire:model.defer="SKU" type="text" placeholder="Ingresa SKU"
                class="w-full" />
            <x-jet-input-error for="SKU" />
        </div>
    </div>
   {{--  @foreach ($
     as $item)
            <div class="flex capitalize justify-between">
                <div>
                    {{ __($item->color->name) }}
                </div>
                <div>
                    <a wire:click="edit({{ $item->id }})"
                        class="text-sm cursor-pointer mr-2 hover:text-gray-400">Editar</a>
                    <a wire:click="delete({{ $item->id }})"
                        class="text-sm cursor-pointer hover:text-gray-400">Eliminar</a>
                </div>
            </div>
        @endforeach --}}
    <div class="flex justify-end">
        <x-jet-button wire:click="save">Agregar SKU</x-jet-button>
    </div>
</div>
