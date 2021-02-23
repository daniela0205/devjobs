@extends ('layouts.app')

@section('navigation')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Notifications</h1>

    @if(count($notifications) > 0)
        <ul class="max-w-md mx-auto mt-10">
            @foreach ($notifications as $notification)
                @php
                    $data = $notification->data
                @endphp

                <li class="p-5 border border-gray-400 mb-5">


                    <p class="mb-4">
                        You have new applicant:
                        <span class="font-bold"> {{ $data['position'] }}</span>
                    </p>

                    <p class="mb-4">
                        write you:
                        <span class="font-bold"> {{$notification->created_at->diffForHumans() }}</span>
                    </p>

                    <a
                        href="{{ route('applicants.index', ['id' => $data['id_position']]) }}"
                        class="bg-teal-500 p-3 inline-block text-xs font-bold uppercase text-white mb-4">
                        See Applicants
                    </a>


                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center mt-5"> You don't have any notificacion</p>

    @endif


@endsection
