<ol class="dd-list">
    @foreach ($categoryList as $cate)
        <li class="dd-item">
            <input id="category-{{$cate->id}}" type="checkbox" wire:click="updateCategory({{$cate->id}})"
                   class="border-1 border-gray-400 checked:text-[#1D93CD]"
                   value="white" {{ in_array($cate->id, $categories) ? 'checked' : '' }} >
            <label for="category-{{$cate->id}}"> {{ $cate->name }} </label>
            @if ($cate->children->isNotEmpty())
                @php
                    $sortedChildren = $cate->children;
                @endphp
                @include('admin.form.categories', ['categoryList' => $cate->children])
            @endif
        </li>
    @endforeach
</ol>
