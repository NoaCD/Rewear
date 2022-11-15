<x-admin-layout>

    @push('css')
    <link rel="stylesheet" href="{{ asset('lib/icomoon-v1.0/style.css') }}">
    @endpush
    <div class="container py-12">
        @livewire('admin.create-color')
    </div>

    @push('script')
        <script>
            Livewire.on('deleteColor', color => {
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "La categoria sera eliminada asi como todos los productos relacionados a ella.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar categoria!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.create-color', 'delete', color);
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
</x-admin-layout>
