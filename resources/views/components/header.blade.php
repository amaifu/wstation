<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="app-url" content={{ env('APP_URL') }}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="rand-token" content="{{ strtoupper(Str::random(5)) }}">
    <meta name="session" content="{{ $session = session()->get('login') }}">
    <meta name="user-session" content="{{ $userSession = session()->get('user') }}">
    <title>WStation</title>
    @component('components.funcs')@endcomponent
</head>
<body>
    <header class="py-4 px-7 bg-white fixed w-full flex items-center gap-4 z-50">

        <div class="header-left flex items-center gap-8 flex-1 z-50">
            <i id="hamburger-menu" class="fa-solid fa-bars text-xl cursor-pointer"></i>
            <h1 class="text-blue-400 text-3xl font-bold italic cursor-pointer z-50">WStation.</h1>
        </div>

        <div class="input-search bg-gray-100 flex items-center px-3 self-center flex-0 md:flex-2 invisible md:visible rounded-sm w-full max-w-xl">
            <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm"></i>
            <input type="search" class="bg-gray-100 text-gray-500 outline-0 py-2 px-3 text-sm w-full" placeholder="Search">
        </div>

        <div class="header-right flex-1 justify-end flex">

            <div class="{{ session()->has('login') ? 'flex' : 'hidden' }} items-center gap-6">
            
                <i class="fa-solid fa-magnifying-glass cursor-pointer visible md:invisible md:absolute"></i>
    
                <!-- Upload Menu -->
                <div>
                    <i id="upload-menu" class="fa-solid fa-arrow-up-from-bracket cursor-pointer p-1"></i>
                    <!-- Upload Menu Overlay -->
                        <div id="upload-menu-overlay" class="hidden absolute -translate-x-30 shadow-lg border-1 border-gray-300 bg-white p-1 rounded-sm w-fit">
                            <button type="text" class="flex gap-2 items-center p-4 rounded-sm hover:bg-gray-200 cursor-pointer">
                                <i class="w-5 fa-solid fa-arrow-up-from-bracket"></i>
                                <p type="text" class="text-sm cursor-pointer">Upload Video</p>
                            </buttton>
                        </div>
                </div>
    
                <i class="fa-regular fa-clock cursor-pointer p-1"></i>
    
                <i class="fa-regular fa-bookmark cursor-pointer p-1"></i>
    
                <!-- Profile Menu -->
                <div>
                    <div id="user-profile" class="circle-pp rounded-full overflow-hidden cursor-pointer p-1">
                        <img class="w-8 h-8 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                    </div>
    
                    <!-- Profile Menu Overlay -->
                    <div id="profile-menu-overlay" class="hidden absolute right-0 -translate-x-6 -translate-y-1 shadow-lg border-1 border-gray-300 bg-white p-4 rounded-sm float-right w-fit">
                        <h2 class="font-bold mb-2">User Profile</h2>
                        <div class="flex flex-col">
                            <a href="" class="hover:bg-gray-200 p-2 flex gap-2 items-center rounded-sm">
                                <i class="w-5 fa-solid fa-user-pen"></i>
                                <p class="text-sm cursor-pointer">Edit Profile</p>
                            </a>
                            <a href="logout" class="hover:bg-gray-200 p-2 flex gap-2 items-center rounded-sm">
                                <i class="w-5 fa-solid fa-arrow-right-from-bracket"></i>
                                <p class="text-sm cursor-pointer">Log Out</p>
                            </a>
                        </div>
                    </div>
    
                </div>

            </div>

            <button id="btn-signin" type="text" class="p-2 cursor-pointer text-white text-sm rounded-sm bg-blue-500 {{ session()->has('login') ? 'hidden' : 'flex' }}">Sign In</button>

        </div>


    </header>

    <div class="flex h-screen">
        <aside class="bg-[rgba(255,255,255,.5)] w-68 flex flex-col top-0 left-0 h-full backdrop-blur-xs pt-18 transition-all ease-in-out duration-500">
            <nav class="flex-1">
                <a href="/" class="navs {{ Route::current()->uri() == '/' ? 'bg-blue-100' : 'bg-white' }} px-5 py-2 flex items-center gap-4">
                    @if (Route::current()->uri() == '/')
                        <svg width="30" height="30" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.85 3.70391C13.05 3.10391 11.95 3.10391 11.15 3.70391L4.65 8.57891C4.08344 9.00383 3.75 9.6707 3.75 10.3789V18.5003C3.75 19.743 4.75736 20.7503 6 20.7503H10.25C10.6642 20.7503 11 20.4145 11 20.0003V17.0003C11 16.1719 11.6716 15.5003 12.5 15.5003C13.3284 15.5003 14 16.1719 14 17.0003V20.0003C14 20.4145 14.3358 20.7503 14.75 20.7503H19C20.2426 20.7503 21.25 19.743 21.25 18.5003V10.3789C21.25 9.6707 20.9166 9.00383 20.35 8.57891L13.85 3.70391Z" fill="#323544"/>
                        </svg>
                        <p class="nav-text text-md font-bold">Home</p>
                    @else
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.45 4.90342C12.1833 4.70342 11.8167 4.70342 11.55 4.90342L5.05 9.77842C4.86115 9.92006 4.75 10.1423 4.75 10.3784V18.4998C4.75 18.9141 5.08579 19.2498 5.5 19.2498H9V16.9998C9 15.343 10.3431 13.9998 12 13.9998C13.6569 13.9998 15 15.343 15 16.9998V19.2498H18.5C18.9142 19.2498 19.25 18.9141 19.25 18.4998V10.3784C19.25 10.1423 19.1389 9.92006 18.95 9.77842L12.45 4.90342ZM10.65 3.70342C11.45 3.10342 12.55 3.10342 13.35 3.70342L19.85 8.57842C20.4166 9.00334 20.75 9.67021 20.75 10.3784V18.4998C20.75 19.7425 19.7426 20.7498 18.5 20.7498H14.25C13.8358 20.7498 13.5 20.4141 13.5 19.9998V16.9998C13.5 16.1714 12.8284 15.4998 12 15.4998C11.1716 15.4998 10.5 16.1714 10.5 16.9998V19.9998C10.5 20.4141 10.1642 20.7498 9.75 20.7498H5.5C4.25736 20.7498 3.25 19.7425 3.25 18.4998V10.3784C3.25 9.67021 3.58344 9.00334 4.15 8.57842L10.65 3.70342Z" fill="#323544"/>
                        </svg>
                        <p class="nav-text text-md">Home</p>
                    @endif
                </a>
                <a href="/videos" class="navs {{ Route::current()->uri() == 'videos' ? 'bg-blue-100' : 'bg-white' }}  px-5 py-2 flex items-center gap-4">
                    @if (Route::current()->uri() == 'videos')
                        <svg width="30" height="30" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.2391 7.25C15.5625 6.74485 15.75 6.14432 15.75 5.5C15.75 3.70507 14.2949 2.25 12.5 2.25C11.3108 2.25 10.2709 2.88866 9.70433 3.84168C9.23578 3.47117 8.64372 3.25 8 3.25C6.48122 3.25 5.25 4.48122 5.25 6C5.25 6.45011 5.35814 6.87497 5.54985 7.25H4.75C3.50736 7.25 2.5 8.25736 2.5 9.5V17.5C2.5 18.7426 3.50736 19.75 4.75 19.75H16.25C16.4053 19.75 16.557 19.7343 16.7035 19.7043C17.7287 19.4945 18.5 18.5873 18.5 17.5V9.5C18.5 8.25736 17.4926 7.25 16.25 7.25H15.2391ZM12.5 3.75C13.4665 3.75 14.25 4.5335 14.25 5.5C14.25 6.4665 13.4665 7.25 12.5 7.25C11.5335 7.25 10.75 6.4665 10.75 5.5C10.75 4.5335 11.5335 3.75 12.5 3.75ZM8 4.75C8.69036 4.75 9.25 5.30964 9.25 6C9.25 6.69036 8.69036 7.25 8 7.25C7.30964 7.25 6.75 6.69036 6.75 6C6.75 5.30964 7.30964 4.75 8 4.75Z" fill="#323544"/>
                            <path d="M19.4849 9.18422C19.4949 9.28813 19.5 9.39347 19.5 9.5V17.5C19.5 17.6066 19.4949 17.7119 19.4848 17.8158L20.5663 18.5224C21.3977 19.0655 22.5 18.469 22.5 17.4759V9.52416C22.5 8.53106 21.3977 7.93453 20.5663 8.47769L19.4849 9.18422Z" fill="#323544"/>
                        </svg>


                        <p class="nav-text text-md font-bold">Videos</p>
                    @else
                        <svg width="30" height="30" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2391 7C15.5625 6.49485 15.75 5.89432 15.75 5.25C15.75 3.45507 14.2949 2 12.5 2C11.3108 2 10.2709 2.63866 9.70433 3.59168C9.23578 3.22117 8.64372 3 8 3C6.48122 3 5.25 4.23122 5.25 5.75C5.25 6.20011 5.35814 6.62497 5.54985 7H4.75C3.50736 7 2.5 8.00736 2.5 9.25V17.25C2.5 18.4926 3.50736 19.5 4.75 19.5H16.25C17.4926 19.5 18.5 18.4926 18.5 17.25V16.9224L20.5663 18.2724C21.3977 18.8155 22.5 18.219 22.5 17.2259V9.27417C22.5 8.28106 21.3977 7.68453 20.5663 8.22769L18.5 9.57763V9.25C18.5 8.00736 17.4926 7 16.25 7H15.2391ZM10.75 5.25C10.75 4.2835 11.5335 3.5 12.5 3.5C13.4665 3.5 14.25 4.2835 14.25 5.25C14.25 6.2165 13.4665 7 12.5 7C11.5335 7 10.75 6.2165 10.75 5.25ZM18.5 11.3694V15.1307L21 16.764V9.73611L18.5 11.3694ZM9.25 5.75C9.25 6.44036 8.69036 7 8 7C7.30964 7 6.75 6.44036 6.75 5.75C6.75 5.05964 7.30964 4.5 8 4.5C8.69036 4.5 9.25 5.05964 9.25 5.75ZM4.75 8.5H16.25C16.6642 8.5 17 8.83579 17 9.25V17.25C17 17.6642 16.6642 18 16.25 18H4.75C4.33579 18 4 17.6642 4 17.25V9.25C4 8.83579 4.33579 8.5 4.75 8.5Z" fill="#323544"/>
                        </svg>

                        <p class="nav-text text-md">Videos</p>
                    @endif
                </a>
                
                <!-- <a href="/anime" class="navs px-5 py-2 flex items-center gap-4">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6.42187C2 5.17923 3.00736 4.17188 4.25 4.17188H19.75C20.9926 4.17188 22 5.17923 22 6.42188V13.8281C22 15.0708 20.9926 16.0781 19.75 16.0781H12.75V18.3281H15C15.4142 18.3281 15.75 18.6639 15.75 19.0781C15.75 19.4923 15.4142 19.8281 15 19.8281H9.00003C8.58582 19.8281 8.25003 19.4923 8.25003 19.0781C8.25003 18.6639 8.58582 18.3281 9.00003 18.3281H11.25V16.0781H4.25C3.00736 16.0781 2 15.0708 2 13.8281V6.42187ZM4.25 5.67188C3.83579 5.67188 3.5 6.00766 3.5 6.42187V13.8281C3.5 14.2423 3.83579 14.5781 4.25 14.5781H19.75C20.1642 14.5781 20.5 14.2423 20.5 13.8281V6.42188C20.5 6.00766 20.1642 5.67188 19.75 5.67188H4.25Z" fill="#323544"/>
                    </svg>
                    <p class="text-md">Anime</p>
                </a> -->
            </nav>
    
            <footer class="flex-0 py-5 px-3.5">
                <p class="text-xs text-gray-400">&copy; 2025 WStation.</p>
            </footer>
    
        </aside>

        <main class="bg-gray-50 w-full py-26 px-8 h-screen overflow-y-scroll">
