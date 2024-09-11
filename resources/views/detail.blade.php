@extends('layout')

@section('content')
<div class="w-full md:w-4/5 bg-white rounded-2xl h-screen my-5 mr-4 flex flex-col">
    <div class="mt-8 ml-7 h-1/6">
        <h1 class="font-roboto font-semibold text-medium text-[36px]">Contact</h1>
    </div>
    <!-- left arrow and edit button -->
    <div class=" h-5/6 bg-[#F5F5F5] border-t-[#B6B6B6] border-2 rounded-b-2xl">
        <div class="flex flex-row justify-between mt-5 mx-8">
            <img src="{{asset('assets/maki_arrow.png')}}" alt="">
            <div class="flex flex-row">
                <button class="flex items-center">
                    <div class="bg-[#463FF1] p-1 flex flex-row rounded-[5px] items-center">
                        <span class="text-white p-2">Edit Contact</span>
                        <img class="px-2 h-4" src="{{asset('assets/sm_edit.png')}}" alt="">
                    </div>
                    <img class="px-2" src="{{asset('assets/uiw_delete.png')}}" alt="">
                </button>
            </div>
        </div>
    </div>
    <!-- profile section -->
     <div>
        <div class="rounded-full w-40 h-40 bg"> 

            <input type="file" required>
        </div>
     </div>
</div>
@endsection