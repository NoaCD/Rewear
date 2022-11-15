<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-trueGray-700 leading-tight">Productos</h1>
                <x-jet-danger-button wire:click="$emit('deleteProduct')">Eliminar</x-jet-danger-button>
            </div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-trueGray-700">
        <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear un producto</h1>

        <div class="mb-4" wire:ignore>
            <form action="{{ route('admin.products.filesmain', $product) }}" class="dropzone" id="my-dropzone"
                method="POST">
            </form>
        </div>

        @if ($product->images->count())
            <section class="bg-white shadow-lg rounded-lg p-6 mb-4">
                <h1 class="text-2xl text-center font-semibold mb-2">
                    Imagenes destacadas del producto
                </h1>

                <ul class="flex flex-wrap">
                    @foreach ($product->images as $image)
                        @if ($image->main == 'si')
                            <li class="relative" wire:key="image-{{ $image->id }}">
                                <img src="{{ Storage::url($image->url) }}"
                                    class="w-32 h-20 mx-1 object-cover object-center" alt="">
                                <x-jet-danger-button class="absolute right-2 top-2"
                                    wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                    wire:target="deleteImage({{ $image->id }})">X
                                </x-jet-danger-button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endif


        <div class="mb-4" wire:ignore>
            <form action="{{ route('admin.products.files', $product) }}" class="dropzone"
                id="my-awesome-dropzone" method="POST">
            </form>
        </div>

        @if ($product->images->count())
            <section class="bg-white shadow-lg rounded-lg p-6 mb-4">
                <h1 class="text-2xl text-center font-semibold mb-2">
                    Imagenes del producto
                </h1>

                <ul class="flex flex-wrap">
                    @foreach ($product->images as $image)
                        @if ($image->main != 'si')
                            <li class="relative" wire:key="image-{{ $image->id }}">
                                <img src="{{ Storage::url($image->url) }}"
                                    class="w-32 h-20 mx-1 object-cover object-center" alt="">
                                <x-jet-danger-button class="absolute right-2 top-2"
                                    wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                    wire:target="deleteImage({{ $image->id }})">X
                                </x-jet-danger-button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endif

        {{-- @livewire('admin.status-product', ['product' => $product], key('status-product-'.$product->id)) --}}

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Categorias --}}
                <div>
                    <x-jet-label value="Categorias" />
                    <select class="w-full form-control" wire:model="category_id">
                        <option value="" selected disabled>Selecciona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="category_id" />
                </div>

                {{-- Subcategorias --}}
                <div>
                    <x-jet-label value="Subcategorias" />
                    <select class="w-full form-control" wire:model="product.subcategory_id">
                        <option value="" selected disabled>Selecciona una subcategoria</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="product.subcategory_id" />
                </div>
            </div>
            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="product.name" type="text" placeholder="Ingrese el nombre del producto"
                    class="w-full" />
                <x-jet-input-error for="product.name" />
            </div>
            {{-- Slug --}}
            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input wire:model="slug" disabled type="text" placeholder="Ingrese el slug del producto"
                    class="w-full bg-trueGray-200" />
                <x-jet-input-error for="slug" />
            </div>

            {{-- Name --}}
            <div class="mb-4">
                <x-jet-label value="Name" />
                <x-jet-input wire:model="product.name_en" type="text" placeholder="Ingrese el nombre del producto"
                    class="w-full" />
                <x-jet-input-error for="product.name_en" />
            </div>
            {{-- Slug --}}
            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input wire:model="slug_en" disabled type="text" placeholder="Ingrese el slug del producto"
                    class="w-full bg-trueGray-200" />
                <x-jet-input-error for="slug_en" />
            </div>
            {{-- Descripcion --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea wire:model="product.description" class="w-full form-control" x-ref="mieditor" rows="4"
                        x-data x-init="ClassicEditor
                    .create( $refs.mieditor )
                    .then(function(editor){
                        editor.model.document.on('change:data',() => {
                            @this.set('product.description',editor.getData())
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );"></textarea>
                </div>
                <x-jet-input-error for="product.description" />
            </div>

            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea wire:model="product.description_en" class="w-full form-control" x-ref="mieditor_en" rows="4"
                        x-data x-init="ClassicEditor
                    .create( $refs.mieditor_en )
                    .then(function(editor){
                        editor.model.document.on('change:data',() => {
                            @this.set('product.description_en',editor.getData())
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );"></textarea>
                </div>
                <x-jet-input-error for="product.description" />
            </div>
            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Medidas del modelo --}}
                <div class="mb-4">
                    <x-jet-label value="Medidas del modelo" />
                    <x-jet-input wire:model="product.measure" type="text" placeholder="Ingrese las medidas del modelo"
                        class="w-full" />
                    <x-jet-input-error for="product.measure" />
                </div>

                {{-- Talla del modelo --}}
                <div class="mb-4">
                    <x-jet-label value="Talla del modelo" />
                    <x-jet-input wire:model="product.size" type="text" placeholder="Ingrese la talla del modelo"
                        class="w-full" />
                    <x-jet-input-error for="product.size" />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Medidas del modelo --}}
                <div class="mb-4">
                    <x-jet-label value="Medidas del modelo" />
                    <x-jet-input wire:model="product.measure_en" type="text" placeholder="Ingrese las medidas del modelo"
                        class="w-full" />
                    <x-jet-input-error for="product.measure_en" />
                </div>

                {{-- Talla del modelo --}}
                <div class="mb-4">
                    <x-jet-label value="Talla del modelo" />
                    <x-jet-input wire:model="product.size_en" type="text" placeholder="Ingrese la talla del modelo"
                        class="w-full" />
                    <x-jet-input-error for="product.size_en" />
                </div>
            </div>
            <div class="flex justify-end items-center mt-4">
                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
                </x-jet-action-message>
                <x-jet-button wire:click="update" wire:loading.attr="disabled">Actualizar producto
                </x-jet-button>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 mt-4">
            <h2 class="text-xl font-bold">Colores</h2>
            <p class="text-sm">Selecciona los diferentes colores de la prenda</p>
            @livewire('admin.color-product', ['product' => $product],key('color-product-'.$product->id))
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6 mt-4">
            <h2 class="text-xl font-bold">Tallas</h2>
            <p class="text-sm">Selecciona las diferentes tallas de la prenda</p>
            @livewire('admin.product-size', ['product' => $product],key('product-size'.$product->id))
        </div>
{{--         <div class="bg-white shadow-lg rounded-lg p-6 mt-4">
            <h2 class="text-xl font-bold">SKUs</h2>
            <p class="text-sm">Asigna los SKUs</p>
            @livewire('admin.sku-product', ['product' => $product],key('sku-product'.$product))
        </div> --}}
    </div>
    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arraste las imagenes al recuadro",
                acceptedFiles: "image/*",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };

            Dropzone.options.myDropzone = { // camelized version of the `id`
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arraste las imagenes destacadas del producto al recuadro",
                acceptedFiles: "image/*",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };

            Livewire.on('deleteProduct', () => {
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "No podras revertir los cambios",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.edit-product', 'delete');
                        Swal.fire(
                            'Eliminado!',
                            'El producto fue eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
