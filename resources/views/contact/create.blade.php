@extends('layout')

@section('content')
<div class="w-full md:w-4/5 bg-white rounded-2xl h-screen my-5 mr-4 flex flex-col">
    <div class="mt-8 ml-7 h-1/6">
        <h1 class="font-roboto font-semibold text-medium text-[36px]">Create Contact</h1>
    </div>

    <!-- left arrow and edit button -->
    <div class=" h-5/6 bg-[#F5F5F5] border-t-[#B6B6B6] border-2 rounded-b-2xl">
        <form action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row justify-between mt-5 mx-8">
                <a href="{{route('contacts.index')}}">
                    <img src="{{asset('assets/maki_arrow.png')}}" alt="">
                </a>
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
                <div x-data="{ imageUrl: '{{ asset('assets/profile.png') }}' }" class="ml-40 flex relative items-center gap-2">
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
                            <input class="bg-[#CCCCCC] py-2 rounded-md w-1/3 px-4  ml-4" type="text" name="first_name" placeholder="First Name">
                        </div>
                        <input class="bg-[#CCCCCC] py-2 rounded-md w-1/3 mt-2 ml-8 px-4" type="text" name="second_name" placeholder="Last Name">
                        <div class="flex flex-row items-center mt-2">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.89583 11.2396C8.39583 14.1875 10.8125 16.5937 13.7604 18.1042L16.0521 15.8125C16.3333 15.5312 16.75 15.4375 17.1146 15.5625C18.2813 15.9479 19.5417 16.1562 20.8333 16.1562C21.4062 16.1562 21.875 16.625 21.875 17.1979V20.8333C21.875 21.4062 21.4062 21.875 20.8333 21.875C11.0521 21.875 3.125 13.9479 3.125 4.16667C3.125 3.59375 3.59375 3.125 4.16667 3.125H7.8125C8.38542 3.125 8.85417 3.59375 8.85417 4.16667C8.85417 5.46875 9.0625 6.71875 9.44792 7.88542C9.5625 8.25 9.47917 8.65625 9.1875 8.94792L6.89583 11.2396Z" fill="black" />
                            </svg>
                            <!-- ===========country code input============= -->
                            <!--                              
                            <div class="flex items-center w-[60px] mx-2">
                                <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-2 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                                    <svg fill="none" aria-hidden="true" class="h-4 w-4 me-2" viewBox="0 0 20 15">
                                        <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                        <mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                            <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                        </mask>
                                        <g mask="url(#a)">
                                            <path fill="#D02F44" fill-rule="evenodd" d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z" clip-rule="evenodd" />
                                            <path fill="#46467F" d="M0 .5h8.4v6.533H0z" />
                                            <g filter="url(#filter0_d_343_121520)">
                                                <path fill="url(#paint0_linear_343_121520)" fill-rule="evenodd" d="M1.867 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.866 0a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM7.467 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zM2.333 3.3a.467.467 0 100-.933.467.467 0 000 .933zm2.334-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.4.467a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm-2.334.466a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.466a.467.467 0 11-.933 0 .467.467 0 01.933 0zM1.4 4.233a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM6.533 4.7a.467.467 0 11-.933 0 .467.467 0 01.933 0zM7 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zM3.267 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0z" clip-rule="evenodd" />
                                            </g>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_343_121520" x1=".933" x2=".933" y1="1.433" y2="6.1" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#fff" />
                                                <stop offset="1" stop-color="#F0F0F0" />
                                            </linearGradient>
                                            <filter id="filter0_d_343_121520" width="6.533" height="5.667" x=".933" y="1.433" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                <feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                <feOffset dy="1" />
                                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_343_121520" />
                                                <feBlend in="SourceGraphic" in2="effect1_dropShadow_343_121520" result="shape" />
                                            </filter>
                                        </defs>
                                    </svg>
                                    +1 <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="dropdown-phone" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-phone-button">
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                                <span class="inline-flex items-center">
                                                    <svg fill="none" aria-hidden="true" class="h-4 w-4 me-2" viewBox="0 0 20 15">
                                                        <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        <mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                                            <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        </mask>
                                                        <g mask="url(#a)">
                                                            <path fill="#D02F44" fill-rule="evenodd" d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z" clip-rule="evenodd" />
                                                            <path fill="#46467F" d="M0 .5h8.4v6.533H0z" />
                                                            <g filter="url(#filter0_d_343_121520)">
                                                                <path fill="url(#paint0_linear_343_121520)" fill-rule="evenodd" d="M1.867 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.866 0a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM7.467 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zM2.333 3.3a.467.467 0 100-.933.467.467 0 000 .933zm2.334-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.4.467a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm-2.334.466a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.466a.467.467 0 11-.933 0 .467.467 0 01.933 0zM1.4 4.233a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM6.533 4.7a.467.467 0 11-.933 0 .467.467 0 01.933 0zM7 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zM3.267 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0z" clip-rule="evenodd" />
                                                            </g>
                                                        </g>
                                                        <defs>
                                                            <linearGradient id="paint0_linear_343_121520" x1=".933" x2=".933" y1="1.433" y2="6.1" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#fff" />
                                                                <stop offset="1" stop-color="#F0F0F0" />
                                                            </linearGradient>
                                                            <filter id="filter0_d_343_121520" width="6.533" height="5.667" x=".933" y="1.433" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                <feOffset dy="1" />
                                                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                                <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_343_121520" />
                                                                <feBlend in="SourceGraphic" in2="effect1_dropShadow_343_121520" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>
                                                    United States (+1)
                                                </span>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                                <span class="inline-flex items-center">
                                                    <svg class="h-4 w-4 me-2" fill="none" viewBox="0 0 20 15">
                                                        <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        <mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                                            <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        </mask>
                                                        <g mask="url(#a)">
                                                            <path fill="#0A17A7" d="M0 .5h19.6v14H0z" />
                                                            <path fill="#fff" fill-rule="evenodd" d="M-.898-.842L7.467 4.8V-.433h4.667V4.8l8.364-5.642L21.542.706l-6.614 4.46H19.6v4.667h-4.672l6.614 4.46-1.044 1.549-8.365-5.642v5.233H7.467V10.2l-8.365 5.642-1.043-1.548 6.613-4.46H0V5.166h4.672L-1.941.706-.898-.842z" clip-rule="evenodd" />
                                                            <path stroke="#DB1F35" stroke-linecap="round" stroke-width=".667" d="M13.067 4.933L21.933-.9M14.009 10.088l7.947 5.357M5.604 4.917L-2.686-.67M6.503 10.024l-9.189 6.093" />
                                                            <path fill="#E6273E" fill-rule="evenodd" d="M0 8.9h8.4v5.6h2.8V8.9h8.4V6.1h-8.4V.5H8.4v5.6H0v2.8z" clip-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                    United Kingdom (+44)
                                                </span>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                                <span class="inline-flex items-center">
                                                    <svg class="h-4 w-4 me-2" fill="none" viewBox="0 0 20 15" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        <mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                                            <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        </mask>
                                                        <g mask="url(#a)">
                                                            <path fill="#0A17A7" d="M0 .5h19.6v14H0z" />
                                                            <path fill="#fff" stroke="#fff" stroke-width=".667" d="M0 .167h-.901l.684.586 3.15 2.7v.609L-.194 6.295l-.14.1v1.24l.51-.319L3.83 5.033h.73L7.7 7.276a.488.488 0 00.601-.767L5.467 4.08v-.608l2.987-2.134a.667.667 0 00.28-.543V-.1l-.51.318L4.57 2.5h-.73L.66.229.572.167H0z" />
                                                            <path fill="url(#paint0_linear_374_135177)" fill-rule="evenodd" d="M0 2.833V4.7h3.267v2.133c0 .369.298.667.666.667h.534a.667.667 0 00.666-.667V4.7H8.2a.667.667 0 00.667-.667V3.5a.667.667 0 00-.667-.667H5.133V.5H3.267v2.333H0z" clip-rule="evenodd" />
                                                            <path fill="url(#paint1_linear_374_135177)" fill-rule="evenodd" d="M0 3.3h3.733V.5h.934v2.8H8.4v.933H4.667v2.8h-.934v-2.8H0V3.3z" clip-rule="evenodd" />
                                                            <path fill="#fff" fill-rule="evenodd" d="M4.2 11.933l-.823.433.157-.916-.666-.65.92-.133.412-.834.411.834.92.134-.665.649.157.916-.823-.433zm9.8.7l-.66.194.194-.66-.194-.66.66.193.66-.193-.193.66.193.66-.66-.194zm0-8.866l-.66.193.194-.66-.194-.66.66.193.66-.193-.193.66.193.66-.66-.193zm2.8 2.8l-.66.193.193-.66-.193-.66.66.193.66-.193-.193.66.193.66-.66-.193zm-5.6.933l-.66.193.193-.66-.193-.66.66.194.66-.194-.193.66.193.66-.66-.193zm4.2 1.167l-.33.096.096-.33-.096-.33.33.097.33-.097-.097.33.097.33-.33-.096z" clip-rule="evenodd" />
                                                        </g>
                                                        <defs>
                                                            <linearGradient id="paint0_linear_374_135177" x1="0" x2="0" y1=".5" y2="7.5" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#fff" />
                                                                <stop offset="1" stop-color="#F0F0F0" />
                                                            </linearGradient>
                                                            <linearGradient id="paint1_linear_374_135177" x1="0" x2="0" y1=".5" y2="7.033" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#FF2E3B" />
                                                                <stop offset="1" stop-color="#FC0D1B" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg>
                                                    Australia (+61)
                                                </span>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                                <span class="inline-flex items-center">
                                                    <svg class="w-4 h-4 me-2" fill="none" viewBox="0 0 20 15">
                                                        <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        <mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                                            <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        </mask>
                                                        <g mask="url(#a)">
                                                            <path fill="#262626" fill-rule="evenodd" d="M0 5.167h19.6V.5H0v4.667z" clip-rule="evenodd" />
                                                            <g filter="url(#filter0_d_374_135180)">
                                                                <path fill="#F01515" fill-rule="evenodd" d="M0 9.833h19.6V5.167H0v4.666z" clip-rule="evenodd" />
                                                            </g>
                                                            <g filter="url(#filter1_d_374_135180)">
                                                                <path fill="#FFD521" fill-rule="evenodd" d="M0 14.5h19.6V9.833H0V14.5z" clip-rule="evenodd" />
                                                            </g>
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_374_135180" width="19.6" height="4.667" x="0" y="5.167" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                <feOffset />
                                                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                                <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180" />
                                                                <feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape" />
                                                            </filter>
                                                            <filter id="filter1_d_374_135180" width="19.6" height="4.667" x="0" y="9.833" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                <feOffset />
                                                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                                <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180" />
                                                                <feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>
                                                    Germany (+49)
                                                </span>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                                <span class="inline-flex items-center">
                                                    <svg class="w-4 h-4 me-2" fill="none" viewBox="0 0 20 15">
                                                        <rect width="19.1" height="13.5" x=".25" y=".75" fill="#fff" stroke="#F5F5F5" stroke-width=".5" rx="1.75" />
                                                        <mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                                            <rect width="19.1" height="13.5" x=".25" y=".75" fill="#fff" stroke="#fff" stroke-width=".5" rx="1.75" />
                                                        </mask>
                                                        <g mask="url(#a)">
                                                            <path fill="#F44653" d="M13.067.5H19.6v14h-6.533z" />
                                                            <path fill="#1035BB" fill-rule="evenodd" d="M0 14.5h6.533V.5H0v14z" clip-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                    France (+33)
                                                </span>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                                <span class="inline-flex items-center">
                                                    <svg class="w-4 h-4 me-2" fill="none" viewBox="0 0 20 15">
                                                        <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        <mask id="a" style="mask-type:luminance" width="20" height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                                            <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                                        </mask>
                                                        <g mask="url(#a)">
                                                            <path fill="#262626" fill-rule="evenodd" d="M0 5.167h19.6V.5H0v4.667z" clip-rule="evenodd" />
                                                            <g filter="url(#filter0_d_374_135180)">
                                                                <path fill="#F01515" fill-rule="evenodd" d="M0 9.833h19.6V5.167H0v4.666z" clip-rule="evenodd" />
                                                            </g>
                                                            <g filter="url(#filter1_d_374_135180)">
                                                                <path fill="#FFD521" fill-rule="evenodd" d="M0 14.5h19.6V9.833H0V14.5z" clip-rule="evenodd" />
                                                            </g>
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_374_135180" width="19.6" height="4.667" x="0" y="5.167" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                <feOffset />
                                                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                                <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180" />
                                                                <feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape" />
                                                            </filter>
                                                            <filter id="filter1_d_374_135180" width="19.6" height="4.667" x="0" y="9.833" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                                <feOffset />
                                                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                                <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_374_135180" />
                                                                <feBlend in="SourceGraphic" in2="effect1_dropShadow_374_135180" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>
                                                    Germany (+49)
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- ============ dropdown ============ -->
                            <input class="bg-[#CCCCCC] px-2 py-2 rounded-md w-[300px] ml-4" type="number" id="phone_number" name="phone_number" required>
                        </div>
                        <div class=" flex flex-row items-center mt-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="black" />
                            </svg>

                            <input class="bg-[#CCCCCC] py-2 rounded-md w-1/3 px-4 ml-4" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="flex flex-row items-center mt-2">
                            <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.86842 10.35L9.94736 0L16.0263 10.35H3.86842ZM16.0263 23C14.6447 23 13.4706 22.4971 12.5038 21.4912C11.5371 20.4853 11.0534 19.2633 11.0526 17.825C11.0519 16.3867 11.5356 15.165 12.5038 14.1599C13.472 13.1548 14.6462 12.6515 16.0263 12.65C17.4064 12.6485 18.5809 13.1518 19.5499 14.1599C20.5188 15.1681 21.0022 16.3898 21 17.825C20.9978 19.2602 20.5144 20.4823 19.5499 21.4912C18.5854 22.5001 17.4108 23.0031 16.0263 23ZM0 22.425V13.225H8.8421V22.425H0ZM16.0263 20.7C16.8 20.7 17.4539 20.4221 17.9882 19.8662C18.5224 19.3104 18.7895 18.63 18.7895 17.825C18.7895 17.02 18.5224 16.3396 17.9882 15.7837C17.4539 15.2279 16.8 14.95 16.0263 14.95C15.2526 14.95 14.5987 15.2279 14.0645 15.7837C13.5303 16.3396 13.2632 17.02 13.2632 17.825C13.2632 18.63 13.5303 19.3104 14.0645 19.8662C14.5987 20.4221 15.2526 20.7 16.0263 20.7ZM2.21053 20.125H6.63158V15.525H2.21053V20.125ZM7.7921 8.05H12.1026L9.94736 4.4275L7.7921 8.05Z" fill="black" />
                            </svg>
                            <select name="category" id="category" class="bg-[#CCCCCC] py-2 rounded-md w-1/3 px-4 ml-4">
                                <option value="family">Family</option>
                                <option value="Friends">Friends</option>
                                <option value="Collegue">Collegue</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<scrip>
    function handlePhotoUpload(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
    document.getElementById('photo-preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
    }
    </script>
    <!-- ====================handle country code script ========== -->

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#phone_number");
        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/js/utils.js",
        });
    </script>

    @endsection