@extends('layouts.app')


@section('navigation')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Applicants: {{$position->title}}</h1>

    @if( count($position->applicants) > 0)
    <ul class="max-w-md mx-auto mt-10">
        @foreach($position->applicants as $applicant)
            <li class="p-5 border border-gray-400 mb-5">
                <p class="mb-4">Name:
                    <span class="font-bold"> {{$applicant->name}}</span>
                </p>
                <p class="mb-4">Email:
                    <span class="font-bold"> {{$applicant->email}}</span>
                </p>
                <a class="bg-teal-500 p-3 inline-block text-xs font-bold uppercase text-white" href="../storage/cv/{{$applicant->cv}}" target="_blank">See CV</a>

            </li>
        @endforeach
    </ul>
@else
    <p class="text-center mt-5">No find any Applicant</p>
@endif

@endsection
