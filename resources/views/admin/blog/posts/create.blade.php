<x-blog-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Post') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 grid grid-cols-2 justify-items-center">
                        <img id="picture" class="w-full object-cover object-center mx-auto">
                        <input type="file" name="file" id="file">
                        @error('file')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-4 px-4 flex space-x-4">
                        <div class="w-full">
                            <x-jet-label class="text-lg font-bold">
                                Titulo:
                            </x-jet-label>
                            <x-jet-input type="text" name="title" id="title" class="w-full py-1"
                                value="{{ old('title') }}"></x-jet-input>
                            @error('title')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-jet-label class="text-lg font-bold">
                                Title:
                            </x-jet-label>
                            <x-jet-input type="text" name="title_en" id="title_en" class="w-full py-1"
                                value="{{ old('title_en') }}"></x-jet-input>
                            @error('title_en')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="pb-4 px-4 flex space-x-4">
                        <div class="w-full">
                            <x-jet-label class="text-lg font-bold">
                                Subtitulo:
                            </x-jet-label>
                            <x-jet-input type="text" name="subtitle" class="w-full py-1" value="{{ old('subtitle') }}">
                            </x-jet-input>
                            @error('subtitle')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-jet-label class="text-lg font-bold">
                                Subtitle:
                            </x-jet-label>
                            <x-jet-input type="text" name="subtitle_en" class="w-full py-1" value="{{ old('subtitle_en') }}">
                            </x-jet-input>
                            @error('subtitle_en')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="pb-4 px-4">
                        <x-jet-label class="text-lg font-bold">
                            Categoria:
                        </x-jet-label>
                        <select name="category_id" class="w-full border border-gray-200 py-1 rounded-lg">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-4 px-4">
                        <x-jet-label class="text-lg font-bold">
                            Extracto:
                        </x-jet-label>
                        <textarea name="extract" id="extract" rows="7"
                            class="w-full border border-gray-200">{{ old('extract') }}</textarea>
                        @error('extract')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-4 px-4">
                        <x-jet-label class="text-lg font-bold">
                            Extract:
                        </x-jet-label>
                        <textarea name="extract_en" id="extract_en" rows="7"
                            class="w-full border border-gray-200">{{ old('extract_en') }}</textarea>
                        @error('extract_en')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-4 px-4">
                        <x-jet-label class="text-lg font-bold">
                            Cuerpo del post:
                        </x-jet-label>
                        <textarea name="body" id="body" rows="7"
                            class="w-full border border-gray-200">{{ old('body') }}</textarea>
                        @error('body')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-4 px-4">
                        <x-jet-label class="text-lg font-bold">
                            Body post:
                        </x-jet-label>
                        <textarea name="body_en" id="body_en" rows="7"
                            class="w-full border border-gray-200">{{ old('body_en') }}</textarea>
                        @error('body_en')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end mb-2 px-2 items-center">
                        <x-jet-button type="submit">
                            Crear post
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
        <script>
            $("#title").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        </script>
        <script>
            //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        </script>
        <script>
            CKEDITOR.replace('extract', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
            });
            CKEDITOR.replace('extract_en', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
            });
            CKEDITOR.replace('body', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
            });
            CKEDITOR.replace('body_en', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
            });
        </script>
    @endpush
</x-blog-layout>
