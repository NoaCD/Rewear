<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            Ciudad - {{ $city->name }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Crear colonia
            </x-slot>

            <x-slot name="description">
                Complete la informacion necesaria para crear una nueva colonia
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input wire:model.defer="createForm.name" type="text" placeholder="Nombre de la colonia"
                        class="w-full" />
                    <x-jet-input-error for="createForm.name" />
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    Colonia creado
                </x-jet-action-message>
                <x-jet-button>Agregar</x-jet-button>
            </x-slot>
        </x-jet-form-section>

        <x-jet-action-section>
            <x-slot name="title">
                Lista de colonias
            </x-slot>
            <x-slot name="description">
                Aqui encontrara todas las colonias agregadas
            </x-slot>
            <x-slot name="content">
                <table class="text-trueGray-600">
                    <thead class="border-b border-trueGray-500">
                        <tr>
                            <th class="py-2 w-full text-left">Nombre</th>
                            <th class="py-2">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-trueGray-200">
                        @foreach ($districts as $district)
                            <tr>
                                <td class="py-2">
                                    <span class="uppercase">
                                        {{ $district->name }}
                                    </span>
                                </td>
                                <td class="py-2">
                                    <div
                                        class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $district->id }}')">Editar</a>
                                        <a wire:click="$emit('deleteDistrict','{{ $district->id }}')"
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
            <x-slot name="title">Editar colonia</x-slot>
            <x-slot name="content">
                <div class="space-y-3">
                    <div>
                        <x-jet-label value="Nombre" />
                        <x-jet-input wire:model.defer="editForm.name" type="text" placeholder="Nombre de la colonia"
                            class="w-full" />
                        <x-jet-input-error for="editForm.name" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:loading.attr="disabled" wire:target="update" wire:click="update">Actualizar
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>


        @push('script')
            <script>
                Livewire.on('deleteDistrict', district => {
                    Swal.fire({
                        title: 'Estas seguro?',
                        text: "La colonia sera eliminada permanentemete.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminar colonia!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emitTo('admin.city-component', 'delete', district);
                            Swal.fire(
                                'Eliminada!',
                                'La categoria y todos los productos que pertenecian a ella se han eliminado.',
                                'success'
                            )
                        }
                    });
                });
            </script>
        @endpush
    </div>

</div>
