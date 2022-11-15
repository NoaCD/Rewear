<div>
    @foreach ($colors as $color)
        <label>
            <input type="radio" wire:model="colors_id" name="colors_id" value="{{ $color->id }}">
            <span class="capitalize">{{ __($color->name) }}</span>
        </label>
    @endforeach

    <div class="mt-2">
        <h2 class="text-lg font-bold">Lista de colores asignados</h2>
        @foreach ($color_product as $item)
            <div class="flex capitalize justify-between">
                <div>
                    {{ __($item->color->name) }}
                </div>
                <div>
                   {{--  <a wire:click="edit({{ $item->id }})"
                        class="text-sm cursor-pointer mr-2 hover:text-gray-400">Editar</a> --}}
                    <a wire:click="delete({{ $item->id }})"
                        class="text-sm cursor-pointer hover:text-gray-400">Eliminar</a>
                </div>
            </div>
        @endforeach

        {{-- @if ($open)
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
                                        Images para el color de modelo
                                    </h3>
                                    <div class="w-full">
                                        <x-jet-input wire:model="SKU" type="text"
                                            placeholder="Ingresa SKU" class="py-1" />
                                    </div>
                                    <div class="flex flex-wrap p-4">
                                        @isset($images)
                                            @foreach ($images as $resource)
                                                <div class="shadow-md bg-white rounded-lg mx-2 mt-4">
                                                    <img class="h-36 w-full object-cover"
                                                        src="{{ Storage::url($resource->url) }}">
                                                    <div class="flex justify-between items-center py-2 mx-2">
                                                        <i class="far fa-image ml-2"></i>
                                                        <i wire:click="deleteImage({{ $resource }},{{ $resource->imageable_id }})"
                                                            class="fas fa-trash cursor-pointer text-gray-800 hover:text-red-600 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110"
                                                            alt="Eliminar"></i>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endisset
                                        @if ($files)
                                            @foreach ($files as $file)
                                                <div class="shadow-md bg-white rounded-lg mx-2 mt-4">
                                                    <img class="h-36 w-full object-cover opacity-30"
                                                        src="{{ $file->temporaryUrl() }}" wire:loading.remove
                                                        wire:target='updatedFiles'>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div x-data="{ isUploading: false, progress: 0 }"
                                            x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <label
                                                class="w-52 flex flex-col items-center ml-2 mt-4 px-4 py-10 bg-white text-gray-700 rounded-l-lg shadow-lg tracking-wide border border-blue cursor-pointer hover:bg-gray-100 hover:text-pink-500">
                                                <i class="far fa-plus-square text-5xl"></i>
                                                <span class="mt-4 text-sm">Seleccionar archivo(s)</span>
                                                <input type='file' wire:model="files" class="hidden" multiple>
                                            </label>
                                            <!-- Progress Bar -->
                                            <div class="text-center py-6 text-white font-bold" x-show="isUploading">
                                                <p>Cargando recursos:</p>
                                                <div max="100" x-bind:value="progress"
                                                    class="h-6 text-white font-bold rounded-lg bg-blue-600"
                                                    x-bind:text="progress" x-text="progress"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button wire:click="uploadPhotos({{ $color_id }})"
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
        @endif --}}

    </div>
    <div class="flex items-center justify-end mt-8">
        <x-jet-button wire:click="save">Agregar color</x-jet-button>
    </div>
</div>
