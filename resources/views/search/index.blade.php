@extends ('layouts.app')

@section('navigation')
    @include('ui.categorynav')
@endsection

@section('content')

    @if(count($positions) > 0)
        <h1 class="text-3xl text-gray-700 m-0">
        Search Result
        </h1>
        <div class="my-10 bg-gray-100 p-10 shadow">
            @include('ui.listpositions')
        </div>
    @else
        <p class="text-center text-gray-700">No found any position for this search</p>
    @endif

@endsection
