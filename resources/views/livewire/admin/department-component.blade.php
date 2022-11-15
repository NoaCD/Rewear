<div class="container py-12">
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear estado
        </x-slot>

        <x-slot name="description">
            Complete la informacion necesaria para crear un nuevo estado
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="createForm.name" type="text" placeholder="Nombre del estado"
                    class="w-full" />
                <x-jet-input-error for="createForm.name" />
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
            Aqui encontrara todas las ciudades agregadas
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
                    @foreach ($departments as $department)
                        <tr>
                            <td class="py-2">
                                <span class="uppercase">
                                    <a href="{{ route('admin.departments.show', $department) }}" class="hover:underline hover:text-blue-600">{{ $department->name }}</a>
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex justify-end items-center divide-x divide-trueGray-500 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $department->id }}')">Editar</a>
                                    <a wire:click="$emit('deleteDepartment','{{ $department->id }}')"
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
                    <x-jet-input wire:model="editForm.name" type="text" placeholder="Nombre de la ciudad"
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
            Livewire.on('deleteDepartment', department => {
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "El departamento sera eliminado asi como todas las ordenes relacionadas a el.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar categoria!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.department-component', 'delete', department);
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
