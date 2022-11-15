<div class="bg-white shadow-lg rounded-lg p-6 mb-4">
    <p class="text-2xl text-center font-semibold mb-2">
        Estado del producto
    </p>
    <div class="flex">
        <label class="mr-4">
            <input type="radio" name="status" value="1" wire:model.defer="status">
            Borrador
        </label>
        <label>
            <input type="radio" name="status" value="2" wire:model.defer="status">
            Publicado
        </label>
    </div>

    <div class="flex justify-end items-center">
        <x-jet-action-message class="mr-3" on="save">
            Actualizado
        </x-jet-action-message>
        <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save">Actualizar</x-jet-button>
    </div>
</div>
