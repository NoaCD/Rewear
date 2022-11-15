<div>
    <div id="productos-cajas" class="m-auto gelion-thin">
        <input id="menos" type="button" value="-" wire:click="decrement">
        <input id="cantidad" type="text" name="amount" disabled value="{{ $qty }}">
        <input id="mas" type="button" value="+" wire:click="increment">
    </div>
</div>
