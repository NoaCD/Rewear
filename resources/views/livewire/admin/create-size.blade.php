<div>
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva talla
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para crear un talla
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="createForm.name" type="text" placeholder="Nombre de talla"
                    class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Codigo" />
                <x-jet-input wire:model="createForm.code" type="text" placeholder="S - M - L"
                    class="w-full" />
                <x-jet-input-error for="createForm.code" />
            </div>
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
            Lista de tallas
        </x-slot>
        <x-slot name="description">
            Aqui encontrara todos las tallas agregadas
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
                    @foreach ($sizes as $size)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!! $size->code !!}
                                </span>
                                <span class="uppercase">
                                    <a class="hover:underline hover:text-blue-600">{{ $size->name }}</a>
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $size->id }}')">Editar</a>
                                    <a wire:click="$emit('deleteSize','{{ $size->id }}')"
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
        <x-slot name="title">Editar Talla</x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-jet-label value="Nombre" />
                    <x-jet-input wire:model="editForm.name" type="text" placeholder="Nombre de la talla"
                        class="w-full" />
                    <x-jet-input-error for="editForm.name" />
                </div>
                <div>
                    <x-jet-label value="Codigo" />
                    <x-jet-input wire:model="editForm.code" type="text" placeholder="Codigo de talla"
                        class="w-full" />
                    <x-jet-input-error for="editForm.code" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:loading.attr="disabled" wire:target="editImage,update" wire:click="update">Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
