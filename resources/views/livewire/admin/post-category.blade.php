<div class="p-6">
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
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="createForm.name_en" type="text" placeholder="Nombre de categoria"
                    class="w-full" />
                <x-jet-input-error for="createForm.name_en" />
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
                                <span class="uppercase">
                                    <a  class="hover:underline hover:text-blue-600">{{ $category->name }}</a>
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $category->id }}')">Editar</a>
                                    <a wire:click="delete('{{ $category->id }}')"
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
                <div>
                    <x-jet-label value="Nombre" />
                    <x-jet-input wire:model="editForm.name" type="text" placeholder="Nombre de categoria"
                        class="w-full" />
                    <x-jet-input-error for="editForm.name" />

                    <div>
                        <x-jet-label value="Nombre" />
                        <x-jet-input wire:model="editForm.name_en" type="text" placeholder="Nombre de categoria"
                            class="w-full" />
                        <x-jet-input-error for="editForm.name_en" />
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:loading.attr="disabled" wire:target="update" wire:click="update">Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
