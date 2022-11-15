<div>
    @foreach ($sizes as $size)
        <label>
            <input type="radio" wire:model="sizes_id" name="sizes_id" value="{{ $size->id }}">
            <span class="capitalize mr-2">{{ __($size->code) }}</span>
        </label>
    @endforeach

    <div class="mt-2">
        <h2 class="text-lg font-bold">Lista de tallas asignados</h2>
        @foreach ($size_product as $item)
            <div class="flex capitalize justify-between">
                <div>
                    {{ __($item->size->name) }}
                </div>
                <div>
                      <a wire:click="edit({{ $item }})"
                        class="text-sm cursor-pointer mr-2 hover:text-gray-400">Editar</a>
                    <a wire:click="delete({{ $item }})"
                        class="text-sm cursor-pointer hover:text-gray-100">Eliminar</a>
                </div>
            </div>
        @endforeach

        @if ($open)
            <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-4xl sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                       Asignacion de SKU
                                    </h3>
                                    <div class="w-full">
                                        <x-jet-input wire:model="sku" type="text"
                                            placeholder="Ingresa sku" class="py-1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button wire:click="update({{ $size_id }})"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-900 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Guardar
                            </button>
                            <button wire:click="$set('open',false)"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="flex items-center justify-end mt-8">
        <x-jet-button wire:click="save">Agregar talla</x-jet-button>
    </div>
</div>
