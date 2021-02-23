@extends ('layouts.app')

@section('navigation')
    @include('ui.categorynav')
@endsection

@section('content')

<div class="my-10 bg-gray-100 p-10 shadow">
    <h1 class="text-3xl text-gray-700 m-0">
        Category:
        <span class="font-bold">{{$category->name}}</span>
    </h1>

    @include('ui.listpositions')
</div>
@endsection
