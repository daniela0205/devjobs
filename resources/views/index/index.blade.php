@extends ('layouts.app')

@section('navigation')
    @include('ui.categorynav')
@endsection

@section('content')
<div class="flex flex-col lg:flex-row shadow bg-white">
    <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
        <p class="text-2xl text-gray-700">
            dev<span class="font-bold">Jobs</span>
        </p>

        <h1 class="mt-2 sm:mt-4 text-3xl font-bold  text-gray-700 leading-tight">
            Find a job remotely or in your country
            <span class="text-teal-500 block">For Web Developers / Designers</span>
        </h1>

        @include('ui.search')


    </div>

    <div class="block lg:w-1/2">
        <img class="inset-0 h-full w-full object-cover object-center" src="{{asset('img/4321.jpg')}}" alt="devjobs">
    </div>
</div>

<div class="my-10 bg-gray-100 p-10 shadow">
    <h1 class="text-3xl text-gray-700 m-0">
        New
        <span class="font-bold">Positions</span>
    </h1>

    @include('ui.listpositions')
</div>

@endsection
