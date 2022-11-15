<div class="flex items-center" x-data>
    {{-- <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
        wire:target="decrement" wire:click='decrement'>
        -
    </x-jet-secondary-button>

    <span class="mx-2 text-trueGray-700">{{ $qty }}</span>

    <x-jet-secondary-button disabled x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
        wire:target="increment" wire:click='increment'>
        +
    </x-jet-secondary-button> --}}
    <div id="productos-cajas" class="m-auto gelion-thin">
        <input id="menos" type="button" value="-" wire:click="decrement">
        <input id="cantidad" type="text" name="amount" disabled value="{{ $qty }}">
        <input id="mas" type="button" value="+" wire:click="increment">
    </div>
</div>
