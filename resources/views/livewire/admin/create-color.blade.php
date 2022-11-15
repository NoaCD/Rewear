<div>
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nuevo color
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para crear un color
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="createForm.name" type="text" placeholder="Nombre de color"
                    class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Color de fondo" />
                <x-jet-input wire:model="createForm.bgcolor" type="color" placeholder="Color de fondo" value="#ffffff"
                    class="w-full" />
                <x-jet-input-error for="createForm.bgcolor" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Color de hoja" />
                <x-jet-input wire:model="createForm.txtcolor" type="color" placeholder="Color de la hoja"
                    value="#0000000" class="w-full" />
                <x-jet-input-error for="createForm.txtcolor" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Imagen" />
                <x-jet-input wire:model="createForm.image" type="file" accept="image/*" class="mt-1 w-full"
                    id="{{ $rand }}" />
                <x-jet-input-error for="createForm.image" />
            </div>

            {{-- <div class="col-span-6 sm:col-span-4">
                <div class="text-center m-auto">
                    <div
                        style="background-color: {{ $createForm['bgcolor'] }}; height: 23px; border-style: solid; border-width: thin; border-color:#000; width: 23px; border-radius: 23px;">
                        <span class="icon-hoja-productorewear ico-sm"
                            style="color: {{ $createForm['txtcolor'] }};"></span>
                    </div>
                </div>
            </div> --}}
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Color creado
            </x-jet-action-message>
            <x-jet-button>Agregar</x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de colores
        </x-slot>
        <x-slot name="description">
            Aqui encontrara todos los colores agregados
        </x-slot>
        <x-slot name="content">
            <table class="text-trueGray-600">
                <thead class="border-b border-trueGray-500">
                    <tr>
                        <th class="w-full py-2 text-left">Nombre</th>
                        <th class="py-2">Accion</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-trueGray-200">
                    @foreach ($colors as $color)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!! $color->icon !!}
                                </span>
                                <span class="uppercase">
                                    <a class="hover:underline hover:text-blue-600">{{ $color->name }}</a>
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $color->id }}')">Editar</a>
                                    <a wire:click="$emit('deleteColor','{{ $color->id }}')"
                                        class="pl-2 hover:text-red-600 cursor-pointer">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">Editar Color</x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    @if ($editImage)
                        <img src="{{ $editImage->temporaryUrl() }}" class="w-32 object-center">
                    @else
                        <img src="{{ Storage::url($editForm['image']) }}" class="w-32 object-center">
                    @endif
                </div>
                <div>
                    <x-jet-label value="Nombre" />
                    <x-jet-input wire:model="editForm.name" type="text" placeholder="Nombre de color"
                        class="w-full" />
                    <x-jet-input-error for="editForm.name" />
                </div>
                <div>
                    <x-jet-label value="Color de fondo" />
                    <x-jet-input wire:model="editForm.bgcolor" type="color" placeholder="Color de fondo"
                        class="w-full" />
                    <x-jet-input-error for="editForm.bgcolor" />
                </div>
                <div>
                    <x-jet-label value="Color de hoja" />
                    <x-jet-input wire:model="editForm.txtcolor" type="color" placeholder="Color de la hoja"
                        class="w-full" />
                    <x-jet-input-error for="editForm.txtcolor" />
                </div>
                <div>
                    <x-jet-label value="Imagen" />
                    <x-jet-input wire:model="editImage" type="file" accept="image/*" class="mt-1 w-full"
                        id="{{ $rand }}" />
                    <x-jet-input-error for="editImage" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:loading.attr="disabled" wire:target="editImage,update" wire:click="update">Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
