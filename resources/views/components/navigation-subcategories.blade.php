@props(['category'])

<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-trueGray-500 mb-3">Subcategorías</p>
        <ul>
            @forelse ($category->subcategories as $subcategory)
                <li>
                    <a href="{{ route('categories.show', $category) . '?subcategoria=' . $subcategory->slug }}"
                        class="text-trueGray-500 font-semibold py-1 px-4 hover:text-trueGray-800 inline-block">{{ $subcategory->name }}</a>
                </li>
            @empty
                <li></li>
            @endforelse
        </ul>
    </div>
    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
    </div>
</div>
