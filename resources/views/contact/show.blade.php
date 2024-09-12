@extends('layout')

@section('content')
<div class="w-full md:w-4/5 bg-white rounded-2xl h-screen my-5 mr-4 flex flex-col">
    <div class="mt-8 ml-7 h-1/6">
        <h1 class="font-roboto font-semibold text-medium text-[36px]">Contact Info</h1>
    </div>
    <!-- left arrow and edit button -->
    <div class=" h-5/6 bg-[#F5F5F5] border-t-[#B6B6B6] border-2 rounded-b-2xl">
        <div class="flex flex-row justify-between mt-5 mx-8">
            <a href="{{route('contacts.index')}}">
                <img src="{{asset('assets/maki_arrow.png')}}" alt="">
            </a>
            <div class="flex flex-row">
                <div class="flex items-center">
                    <a href="{{route('contacts.edit', parameters: $contact->id)}}" class="bg-[#463FF1] p-1 flex flex-row rounded-[5px] items-center">
                        <span class="text-white p-2">Edit Contact</span>
                        <img class="px-2 h-4" src="{{asset('assets/sm_edit.png')}}" alt="">
                    </a>
                    <!-- delete modal toggle in delete button -->
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img class="px-2" src="{{ asset('assets/uiw_delete.png') }}" alt="Delete">
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <!-- profile picture -->
            <div x-data="{ imageUrl: '{{asset( 'storage/images/' . $contact->image)}}' }" class="ml-40 flex relative items-center gap-2">
                <img :src="imageUrl" alt="User Photo" class="w-20 h-20 object-cover rounded-full" id="photo-preview">

                <div>
                    <label for="photo" class="cursor-pointer">
                        <div class="bg-primary text-white font-bold rounded-lg text-sm text-center px-4 py-2 flex items-center">
                            <div class="bg-[#384567] rounded-full absolute bottom-0 left-1 p-2">
                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 17.5385H20V19H0V17.5385ZM16.7143 5.11538C17.2857 4.53077 17.2857 3.65385 16.7143 3.06923L14.1429 0.438462C13.5714 -0.146154 12.7143 -0.146154 12.1429 0.438462L1.42857 11.4V16.0769H6L16.7143 5.11538ZM13.1429 1.46154L15.7143 4.09231L13.5714 6.28462L11 3.65385L13.1429 1.46154ZM2.85714 14.6154V11.9846L10 4.67692L12.5714 7.30769L5.42857 14.6154H2.85714Z" fill="white" />
                                </svg>
                            </div>
                        </div>
                    </label>
                    <input type="file" id="photo" name="photo" class="hidden" @change="handlePhotoUpload">
                    @error('photo')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- name and horizontal rule -->
            <div class="flex flex-col mt-8">
                <h3 class="text-lg font-medium font-roboto ml-8">{{$contact->first_name}} {{$contact->second_name}}</h3>
                <hr class="w-[972px] border-[#CECECE] ml-8">
            </div>
        </div>
        <div class="flex flex-col bg-[#DEDEFF] mt-8 ml-8 py-4 px-2 rounded-md w-1/3">
            <h4 class="text-base font-roboto font-medium">Contact Details</h4>
            <div class="flex flex-col">
                <div class="flex flex-row p-2 ">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.89583 11.2396C8.39583 14.1875 10.8125 16.5937 13.7604 18.1042L16.0521 15.8125C16.3333 15.5312 16.75 15.4375 17.1146 15.5625C18.2813 15.9479 19.5417 16.1562 20.8333 16.1562C21.4062 16.1562 21.875 16.625 21.875 17.1979V20.8333C21.875 21.4062 21.4062 21.875 20.8333 21.875C11.0521 21.875 3.125 13.9479 3.125 4.16667C3.125 3.59375 3.59375 3.125 4.16667 3.125H7.8125C8.38542 3.125 8.85417 3.59375 8.85417 4.16667C8.85417 5.46875 9.0625 6.71875 9.44792 7.88542C9.5625 8.25 9.47917 8.65625 9.1875 8.94792L6.89583 11.2396Z" fill="black" />
                    </svg>
                    <p class="px-2">{{$contact->phone_number}}</p>
                </div>
                <div class="flex flex-row p-2 ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="black" />
                    </svg>
                    <p class="px-2">{{$contact->email}}</p>
                </div>
                <div class="flex flex-row p-2 ">
                    <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.86842 10.35L9.94736 0L16.0263 10.35H3.86842ZM16.0263 23C14.6447 23 13.4706 22.4971 12.5038 21.4912C11.5371 20.4853 11.0534 19.2633 11.0526 17.825C11.0519 16.3867 11.5356 15.165 12.5038 14.1599C13.472 13.1548 14.6462 12.6515 16.0263 12.65C17.4064 12.6485 18.5809 13.1518 19.5499 14.1599C20.5188 15.1681 21.0022 16.3898 21 17.825C20.9978 19.2602 20.5144 20.4823 19.5499 21.4912C18.5854 22.5001 17.4108 23.0031 16.0263 23ZM0 22.425V13.225H8.8421V22.425H0ZM16.0263 20.7C16.8 20.7 17.4539 20.4221 17.9882 19.8662C18.5224 19.3104 18.7895 18.63 18.7895 17.825C18.7895 17.02 18.5224 16.3396 17.9882 15.7837C17.4539 15.2279 16.8 14.95 16.0263 14.95C15.2526 14.95 14.5987 15.2279 14.0645 15.7837C13.5303 16.3396 13.2632 17.02 13.2632 17.825C13.2632 18.63 13.5303 19.3104 14.0645 19.8662C14.5987 20.4221 15.2526 20.7 16.0263 20.7ZM2.21053 20.125H6.63158V15.525H2.21053V20.125ZM7.7921 8.05H12.1026L9.94736 4.4275L7.7921 8.05Z" fill="black" />
                    </svg>
                    <p class="px-2">{{$contact->category}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete modal -->



@endsection