<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach($positions as $position)
        <li class="p-10 border border-gray-300 bg-white shadow">
            <h2 class="text-2xl font-bold text-teal-500"> {{ $position->title }} </h2>

            <p class="block text-gray-700 font-normal my-2 ">
                {{ $position->category->name }}
            </p>
            <p class="block text-gray-700 font-normal my-2 ">
                Location:
                <span class="font-bold"> {{ $position->location->name }} </span>
            </p>
            <p class="block text-gray-700 font-normal my-2 ">
                Experience:
                <span class="font-bold"> {{ $position->experience->name }} </span>
            </p>

            <a
                class="bg-teal-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm"
                href="{{ route('positions.show', ['position' => $position->id]) }}"
            >See Position </a>
        </li>
    @endforeach
</ul>
