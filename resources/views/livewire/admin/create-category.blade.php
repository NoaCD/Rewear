<div>
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva categoria
        </x-slot>

        <x-slot name="description">
            Complete la informacion necesaria para crear una nueva categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="createForm.name" type="text" placeholder="Nombre de categoria"
                    class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Slug" />
                <x-jet-input wire:model="createForm.slug" disabled type="text" placeholder="Slug de categoria"
                    class="w-full bg-trueGray-100" />
                <x-jet-input-error for="createForm.slug" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Imagen" />
                <x-jet-input wire:model="createForm.image" type="file" accept="image/*" class="mt-1 w-full"
                    id="{{ $rand }}" />
                <x-jet-input-error for="createForm.image" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Imagen ingles" />
                <x-jet-input wire:model="createForm.image_en" type="file" accept="image/*" class="mt-1 w-full"
                    id="{{ $rand }}" />
                <x-jet-input-error for="createForm.image_en" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Categoria creada
            </x-jet-action-message>
            <x-jet-button>Agregar</x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de categorias
        </x-slot>
        <x-slot name="description">
            Aqui encontrara todas las categorias agregadas
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
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!! $category->icon !!}
                                </span>
                                <span class="uppercase">
                                    <a href="{{ route('admin.categories.show', $category) }}"
                                        class="hover:underline hover:text-blue-600">{{ $category->name }}</a>
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $category->slug }}')">Editar</a>
                                    <a wire:click="$emit('deleteCategory','{{ $category->slug }}')"
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
        <x-slot name="title">Editar Categoria</x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex mx-2">

                    <div class="w-full">
                        <p>Imagen español</p>
                        @if ($editImage)
                            <img src="{{ $editImage->temporaryUrl() }}"
                                class="w-full h-64 object-cover object-center">
                        @else
                            <img src="{{ Storage::url($editForm['image']) }}"
                                class="w-full h-64 object-cover object-center">
                        @endif
                    </div>

                    <div class="w-full">
                        <p>Imagen ingles</p>
                        @if ($editImage2)
                            <img src="{{ $editImage2->temporaryUrl() }}"
                                class="w-full h-64 object-cover object-center">
                        @else
                            <img src="{{ Storage::url($editForm['image_en']) }}"
                                class="w-full h-64 object-cover object-center">
                        @endif
                    </div>
                </div>
                <div>
                    <x-jet-label value="Nombre" />
                    <x-jet-input wire:model="editForm.name" type="text" placeholder="Nombre de categoria"
                        class="w-full" />
                    <x-jet-input-error for="editForm.name" />
                </div>
                <div>
                    <x-jet-label value="Slug" />
                    <x-jet-input wire:model="editForm.slug" disabled type="text" placeholder="Slug de categoria"
                        class="w-full bg-trueGray-100" />
                    <x-jet-input-error for="editForm.slug" />
                </div>
                <div>
                    <x-jet-label value="Imagen" />
                    <x-jet-input wire:model="editImage" type="file" accept="image/*" class="mt-1 w-full"
                        id="{{ $rand }}" />
                    <x-jet-input-error for="editImage" />
                </div>
                <div>
                    <x-jet-label value="Imagen ingles" />
                    <x-jet-input wire:model="editImage2" type="file" accept="image/*" class="mt-1 w-full"
                        id="{{ $rand }}" />
                    <x-jet-input-error for="editImage2" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:loading.attr="disabled" wire:target="editImage,update" wire:click="update">Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
