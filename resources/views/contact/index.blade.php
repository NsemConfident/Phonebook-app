@extends('layout')

@section('content')
<div class="w-full md:w-4/5 bg-white rounded-2xl h-screen my-5 mr-4 flex flex-col">
    <div class="mt-11 ml-7">
        <h1 class="font-roboto font-semibold text-medium text-[36px]">Contact</h1>
    </div>
    <div class="flex flex-row justify-between ml-7 mr-7">
        <div class="search flex flex-row items-center bg-[#E5E5E5] rounded-lg">
            <span class="material-symbols-outlined bg-[#E5E5E5]">search</span>
            <input class="bg-[#E5E5E5] p-2 mr-2 focus:ring-none" type="search" placeholder="search...">
        </div>
        <div class="sort">
            <select class="w3-select bg-[#E5E5E5] p-2 rounded-lg" name="option" id="">
                <option value="a-z">A-Z</option>
                <option value="z-a">Z-A</option>
            </select>
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