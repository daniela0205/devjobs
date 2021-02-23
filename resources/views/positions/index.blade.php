@extends('layouts.app')


@section('navigation')
    @include('ui.adminnav')
@endsection

@section('content')


<h1 class="text-2xl text-center mt-10">Positions Manager</h1>
@if(count($positions)>0)
<div class="flex flex-col mt-10">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
          <thead class="bg-gray-100 ">
            <tr>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Positions Title
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                State
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Applicants
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-white">


            @foreach ($positions as $position)
            <tr>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="flex items-center">

                  <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">{{$position->title}} </div>
                        <div class="text-sm leading-5 text-gray-500">Category: {{$position->category->name}}  </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <state-position
                    state="{{$position->active}}"
                    position-id="{{$position->id}}"
                > </state-position>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                  <a

                      href="{{ route('applicants.index', ['id' => $position->id])}} "

                      class="text-gray-500 hover:text-gray-600"
                  >  {{$position->applicants->count()}}  Applicant</a>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                    <a
                    href="{{route('positions.edit',['position'=>$position->id])}}"
                    class="text-teal-600 hover:text-teal-900 mr-5"
                    >Edite</a>

                    <delet-position
                        position-id ="{{$position->id}}"
                    >
                    </delet-position>
                    <a href="{{route('positions.show',['position'=>$position->id])}}" class="text-blue-600 hover:text-blue-900">See</a>
              </td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{$positions->links()}}
@else
        <p class="text-center mt-10 text-gray-700">Don't have any positions yet</p>
@endif
@endsection
