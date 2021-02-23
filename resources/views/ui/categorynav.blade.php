@foreach($categories as $category)


<a
class="text-white text-sm uppercase font-bold p-3"
href="{{ route('categories.show', ['category' => $category->id ])}} "
>
{{$category->name}}
</a>
@endforeach
