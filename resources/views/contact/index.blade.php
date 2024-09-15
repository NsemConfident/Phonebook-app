@extends('layout')

@section('content')
<div class="w-full md:w-4/5 bg-white rounded-2xl h-screen my-5 mr-4 flex flex-col">
    <div class="mt-11 ml-7">
        <h1 class="font-roboto font-semibold text-medium text-[36px]">Contact</h1>
    </div>
    <div class="flex flex-row justify-between ml-7 mr-7">
        <form action="{{route('contacts.index')}}" method="GET">
            @csrf
            <div class="search flex flex-row items-center bg-[#E5E5E5] rounded-lg">
                <span class="material-symbols-outlined bg-[#E5E5E5]">search</span>
                <input class="bg-[#E5E5E5] p-2 mr-2 focus:ring-none" name="search" id="search" value="{{$search}}" type="search" placeholder="search...">
            </div>
        </form>
        <button class="flex flex-row space-x-1 items-center justify-around rounded-lg w-[149px] p-2 mx-4 bg-[#E5E5E5]" id="dropdownDefaultButton" data-dropdown-trigger="hover" data-dropdown-toggle="dropdown">
            Sort:A-Z
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </button>
        <div id="dropdown">
            <ul name="filter" id="">
                <li class="bg-[#E5E5E5] p-2 rounded-lg w-[149px] text-center my-1">
                    <a href="{{route('contacts.index', ['filter' => 'z-a'])}}" class="hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">A-Z</a>
                </li>
                <li class="bg-[#E5E5E5] p-2 rounded-lg w-[149px] text-center">
                    <a href="{{route('contacts.index', ['filter' => 'a-z'])}}" class="hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Z-A</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mt-2 bg-[#F5F5F5] px-9">
        @if (count($contacts) > 0)
        <table class="w-full md:my-6 text-left">
            <thead class="border-b-2">
                <th class="">Name</th>
                <th class="">Number</th>
                <th class="">Email</th>
                <th class="">Action</th>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td class="py-4">
                        <a href="{{route('contacts.show', parameters: $contact->id)}}">
                            <div class="flex flex-row gap-2 font-bold items-center">
                                <img src="{{asset( 'storage/images/' . $contact->image)}}" alt="" class="rounded-full w-12 h-12">
                                <span>{{$contact->first_name}} {{$contact->second_name}}</span>
                            </div>
                        </a>
                    </td>
                    <td class="py-4 font-bold">{{$contact->phone_number}}</td>
                    <td class="py-4 font-bold">{{$contact->email}}</td>
                    <td class="py-4 font-bold">
                        <a href="{{route('contacts.edit', parameters: $contact->id)}}">
                            <img src="{{asset('assets/edit.png')}}" alt="" class="w-6">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="font-bold text-base justify-center flex items-center">No Contact Found</p>
        @endif
    </div>
</div>
@endsection