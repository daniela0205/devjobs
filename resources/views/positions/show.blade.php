@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
@endsection

@section('navigation')
    @include('ui.categorynav')
@endsection

@section('content')
<h1 class="text-3xl text-center mt-10">{{$position->title}}</h1>

<div class="mt-10 mb-20 md:flex items-start">
    <div class="md:w-3/5">

        <p class="block text-gray-700 font-bold my-2">
            Posted <span class="font-normal"> {{$position->created_at->diffForHumans() }}  </span>
            By: <span class="font-normal"> {{$position->recruiter->name}} </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Category: <span class="font-normal"> {{$position->category->name}} </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Salary: <span class="font-normal"> {{$position->salary->name}} </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Location: <span class="font-normal"> {{$position->location->name}} </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Experience: <span class="font-normal"> {{$position->experience->name}} </span>
        </p>


        <h2 class="text-2xl text-center mt-10 text-gray-700 mb-5">Skills</h2>

        @php
            $arraySkills = explode(",", $position->skills)
        @endphp

        @foreach($arraySkills as $skill)
        <p class="inline-block border border-gray-400 rounded py-2 px-8 text-gray-700  my-2">
            {{$skill}}
         </p>
        @endforeach

        <a href="../storage/positions/{{$position->imagen}}" data-lightbox="imagen" data-title="Position {{ $position->title}} ">
            <img src="../storage/positions/{{ $position->imagen }}" class="w-40 mt-10">
        </a>

        <div class="descripcion mt-10 mb-5">
            {!! $position->description  !!}
        </div>
    </div>

    @if($position->active === 1 )
        @include('ui.contact')
    @endif

</div>

@endsection
