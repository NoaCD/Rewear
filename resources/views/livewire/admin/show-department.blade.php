<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            Estado - {{ $department->name }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Crear ciudad
            </x-slot>

            <x-slot name="description">
                Complete la informacion necesaria para crear un nuevo ciudad
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input wire:model.defer="createForm.name" type="text" placeholder="Nombre de la ciudad"
                        class="w-full" />
                    <x-jet-input-error for="createForm.name" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label value="Costo" />
                    <x-jet-input wire:model.defer="createForm.cost" type="number" placeholder="Costo de envio"
                        class="w-full" />
                    <x-jet-input-error for="createForm.cost" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    Estado creado
                </x-jet-action-message>
                <x-jet-button>Agregar</x-jet-button>
            </x-slot>
        </x-jet-form-section>

        <x-jet-action-section>
            <x-slot name="title">
                Lista de ciudades
            </x-slot>
            <x-slot name="description">
                Aqui encontrara todas los estados agregadas
            </x-slot>
            <x-slot name="content">
                <table class="text-trueGray-600">
                    <thead class="border-b border-trueGray-500">
                        <tr>
                            <th class="py-2 text-left">Nombre</th>
                            <th class="w-full py-2 text-center">Envio</th>
                            <th class="py-2">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-trueGray-200">
                        @foreach ($cities as $city)
                            <tr>
                                <td class="py-2">
                                    <span class="uppercase">
                                        <a href="{{ route('admin.cities.show', $city) }}"
                                            class="hover:underline hover:text-blue-600">{{ $city->name }}</a>
                                    </span>
                                </td>
                                <td class="py-2 text-center">
                                    <span class="uppercase">
                                        ${{ $city->cost }}
                                    </span>
                                </td>
                                <td class="py-2">
                                    <div
                                        class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $city->id }}')">Editar</a>
                                        <a wire:click="$emit('deleteCity','{{ $city->id }}')"
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
            <x-slot name="title">Editar ciudad</x-slot>
            <x-slot name="content">
                <div class="space-y-3">
                    <div>
                        <x-jet-label value="Nombre" />
                        <x-jet-input wire:model.defer="editForm.name" type="text" placeholder="Nombre de la ciudad"
                            class="w-full" />
                        <x-jet-input-error for="editForm.name" />
                    </div>
                </div>
                <div class="space-y-3">
                    <div>
                        <x-jet-label value="Cost" />
                        <x-jet-input wire:model.defer="editForm.cost" type="text" placeholder="Nombre de la ciudad"
                            class="w-full" />
                        <x-jet-input-error for="editForm.cost" />
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
                Livewire.on('deleteCity', city => {
                    Swal.fire({
                        title: 'Estas seguro?',
                        text: "La la ciudad sera eliminada asi como todos las colonias relacionadas a ella.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminar ciudad!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emitTo('admin.show-department', 'delete', city);
                            Swal.fire(
                                'Eliminada!',
                                'La ciudad y todas las colonias que pertenecian a ella se han eliminado.',
                                'success'
                            )
                        }
                    });
                });
            </script>
        @endpush
    </div>


</div>
