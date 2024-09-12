@extends('layout')

@section('content')
<div class="w-full md:w-4/5 bg-white rounded-2xl h-screen my-5 mr-4 flex flex-col">
    <div class="mt-8 ml-7 h-1/6">
        <h1 class="font-roboto font-semibold text-medium text-[36px]">Create Contact</h1>
    </div>

    <!-- left arrow and edit button -->
    <div class=" h-5/6 bg-[#F5F5F5] border-t-[#B6B6B6] border-2 rounded-b-2xl">
        <form action="{{route('contacts.update', $contact->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-row justify-between mt-5 mx-8">
                <img src="{{asset('assets/maki_arrow.png')}}" alt="">
                <div class="flex flex-row">
                    <button type="submit" class="flex items-center">
                        <div class="bg-[#463FF1] p-1 flex flex-row rounded-[5px] items-center">
                            <span class="text-white p-2">Save contact</span>
                            <img class="px-2 h-4" src="{{asset('assets/save_icon.png')}}" alt="">
                        </div>
                    </button>
                </div>
            </div>
            <div>
                <!-- profile picture -->
                <div x-data="{ imageUrl: '{{ asset('storage/images/' . $contact->image) }}' }" class="ml-40 flex relative items-center gap-2">
                    <img :src="imageUrl" alt="User Photo" class="w-20 h-20 object-cover rounded-full" id="photo-preview">

                    <div>
                        <label for="image" class="cursor-pointer">
                            <div class="bg-primary text-white font-bold rounded-lg text-sm text-center px-4 py-2 flex items-center">
                                <div class="bg-[#384567] rounded-full absolute bottom-0 left-1 p-2">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.0353 8.40839H8.06183V14.4209H6.07066V8.40839H0.097168V6.40422H6.07066V0.391724H8.06183V6.40422H14.0353V8.40839Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                        <input type="file" id="image" name="image" class="hidden" @change="handlePhotoUpload">
                        @error('image')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- details and horizontal rule -->
                <div class="flex flex-col mt-8">
                    <hr class="w-[972px] border-[#CECECE] ml-8">
                    <h3 class="text-lg font-medium font-roboto ml-8 my-2">Details</h3>
                </div>

                <!-- input form -->
                <div class=" ml-8">
                    <div class="flex flex-col">
                        <div class="flex flex-row items-center mt-2">
                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 15C1 13.9391 1.42143 12.9217 2.17157 12.1716C2.92172 11.4214 3.93913 11 5 11H13C14.0609 11 15.0783 11.4214 15.8284 12.1716C16.5786 12.9217 17 13.9391 17 15C17 15.5304 16.7893 16.0391 16.4142 16.4142C16.0391 16.7893 15.5304 17 15 17H3C2.46957 17 1.96086 16.7893 1.58579 16.4142C1.21071 16.0391 1 15.5304 1 15Z" stroke="black" stroke-width="1.5" stroke-linejoin="round" />
                                <path d="M9 7C10.6569 7 12 5.65685 12 4C12 2.34315 10.6569 1 9 1C7.34315 1 6 2.34315 6 4C6 5.65685 7.34315 7 9 7Z" stroke="black" stroke-width="1.5" />
                            </svg>
                            <input class="bg-[#CCCCCC] py-2 rounded-md w-1/3 px-4  ml-4" type="text" value="{{$contact->first_name}}" name="first_name" placeholder="First Name">
                        </div>
                        <input class="bg-[#CCCCCC] py-2 rounded-md w-1/3 mt-2 ml-8 px-4" type="text" value="{{$contact->second_name}}" name="second_name" placeholder="Last Name">
                        <div class="flex flex-row items-center mt-2">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.89583 11.2396C8.39583 14.1875 10.8125 16.5937 13.7604 18.1042L16.0521 15.8125C16.3333 15.5312 16.75 15.4375 17.1146 15.5625C18.2813 15.9479 19.5417 16.1562 20.8333 16.1562C21.4062 16.1562 21.875 16.625 21.875 17.1979V20.8333C21.875 21.4062 21.4062 21.875 20.8333 21.875C11.0521 21.875 3.125 13.9479 3.125 4.16667C3.125 3.59375 3.59375 3.125 4.16667 3.125H7.8125C8.38542 3.125 8.85417 3.59375 8.85417 4.16667C8.85417 5.46875 9.0625 6.71875 9.44792 7.88542C9.5625 8.25 9.47917 8.65625 9.1875 8.94792L6.89583 11.2396Z" fill="black" />
                            </svg>
                            <select name="#" id="" class="py-2 rounded-md w-12 bg-[#CCCCCC] ml-[19px]">
                                <option value="cameroon">
                                    cameroon
                                </option>
                            </select>
                            <input class="bg-[#CCCCCC] px-2 py-2 rounded-md w-[300px] ml-4" type="number" value="{{$contact->phone_number}}" name="phone_number" required>
                        </div>
                        <div class="flex flex-row items-center mt-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="black" />
                            </svg>

                            <input class="bg-[#CCCCCC] py-2 rounded-md w-1/3 px-4 ml-4" type="email" value="{{$contact->email}}" name="email" placeholder="Email">
                        </div>
                        <div class="flex flex-row items-center mt-2">
                            <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.86842 10.35L9.94736 0L16.0263 10.35H3.86842ZM16.0263 23C14.6447 23 13.4706 22.4971 12.5038 21.4912C11.5371 20.4853 11.0534 19.2633 11.0526 17.825C11.0519 16.3867 11.5356 15.165 12.5038 14.1599C13.472 13.1548 14.6462 12.6515 16.0263 12.65C17.4064 12.6485 18.5809 13.1518 19.5499 14.1599C20.5188 15.1681 21.0022 16.3898 21 17.825C20.9978 19.2602 20.5144 20.4823 19.5499 21.4912C18.5854 22.5001 17.4108 23.0031 16.0263 23ZM0 22.425V13.225H8.8421V22.425H0ZM16.0263 20.7C16.8 20.7 17.4539 20.4221 17.9882 19.8662C18.5224 19.3104 18.7895 18.63 18.7895 17.825C18.7895 17.02 18.5224 16.3396 17.9882 15.7837C17.4539 15.2279 16.8 14.95 16.0263 14.95C15.2526 14.95 14.5987 15.2279 14.0645 15.7837C13.5303 16.3396 13.2632 17.02 13.2632 17.825C13.2632 18.63 13.5303 19.3104 14.0645 19.8662C14.5987 20.4221 15.2526 20.7 16.0263 20.7ZM2.21053 20.125H6.63158V15.525H2.21053V20.125ZM7.7921 8.05H12.1026L9.94736 4.4275L7.7921 8.05Z" fill="black" />
                            </svg>
                            <select name="category" id="category" class="bg-[#CCCCCC] py-2 rounded-md w-1/3 px-4 ml-4">
                                <option value="family" {{ old('category', $contact->category ) == 'family' ? 'selected' : ''}}>Family</option>
                                <option value="Friends" {{ old('category', $contact->category ) == 'Friends' ? 'selected' : ''}}>Friends</option>
                                <option value="Collegue" {{ old('category', $contact->category ) == 'Collegue' ? 'selected' : ''}}>Collegue</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function handlePhotoUpload(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photo-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>

@endsection