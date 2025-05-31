<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        <div class="header-right flex items-center gap-6 flex-1 justify-end">
            <i class="fa-solid fa-magnifying-glass cursor-pointer visible md:invisible md:absolute"></i>
            <i class="fa-solid fa-arrow-up-from-bracket cursor-pointer"></i>
            <i class="fa-regular fa-clock cursor-pointer"></i>
            <i class="fa-regular fa-bookmark cursor-pointer"></i>
            <div class="circle-pp rounded-full overflow-hidden">
                <img class="w-8 h-8" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
            </div>
        </div>

    </header>

    <div class="flex h-screen">
        <aside class="bg-[rgba(255,255,255,.5)] w-68 flex flex-col top-0 left-0 h-full backdrop-blur-xs pt-18 transition-all ease-in-out duration-500">
            <nav class="flex-1">
                <a href="/" class="navs bg-blue-100 px-5 py-2 flex items-center gap-4">
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
                <a href="/memes" class="navs px-5 py-2 flex items-center gap-4">
                    @if (Route::current()->uri() == '/memes')
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.16 16.6L13.91 16.17H13.92C14.39 15.98 14.82 15.72 15.21 15.4L15.47 15.85C15.67 16.2 15.55 16.66 15.19 16.87C15.01 16.98 14.81 17 14.62 16.95C14.42 16.9 14.26 16.77 14.16 16.6Z" fill="#323544"/>
                            <path d="M2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2C6.49 2 2 6.49 2 12ZM14.23 18.4C13.65 18.24 13.16 17.87 12.86 17.35L12.39 16.53C10.72 16.65 9.1 15.95 8.06 14.64C7.8 14.32 7.85 13.85 8.18 13.59C8.51 13.33 8.98 13.39 9.23 13.71C10.04 14.73 11.39 15.22 12.65 14.99C13.48 14.83 14.24 14.38 14.77 13.71C14.92 13.52 15.16 13.42 15.41 13.43C15.66 13.45 15.88 13.59 16 13.8L16.75 15.1C17.37 16.17 17 17.55 15.93 18.17C15.58 18.37 15.2 18.47 14.81 18.47V18.48C14.62 18.48 14.42 18.45 14.23 18.4ZM16.61 10.46C16.58 10.37 16.3 9.66 15.58 9.66C14.83 9.66 14.55 10.44 14.55 10.45C14.42 10.84 14 11.06 13.6 10.92C13.21 10.79 13 10.36 13.13 9.97C13.36 9.3 14.13 8.15 15.58 8.15C17.03 8.15 17.8 9.29 18.03 9.97C18.16 10.36 17.95 10.79 17.56 10.92C17.48 10.95 17.4 10.96 17.32 10.96V10.97C17.01 10.97 16.72 10.77 16.61 10.46ZM9.45 10.46C9.42 10.37 9.14 9.66 8.42 9.66C7.67 9.66 7.39 10.44 7.39 10.45C7.26 10.84 6.84 11.06 6.44 10.92C6.05 10.79 5.84 10.36 5.97 9.97C6.2 9.3 6.97 8.15 8.42 8.15C9.87 8.15 10.64 9.29 10.87 9.97C11 10.36 10.79 10.79 10.4 10.92C10.32 10.95 10.24 10.96 10.16 10.96V10.97C9.85 10.97 9.56 10.77 9.45 10.46Z" fill="#323544"/>
                        </svg>

                        <p class="nav-text text-md font-bold">Memes</p>
                    @else
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C6.49 22 2 17.51 2 12C2 6.49 6.49 2 12 2C17.51 2 22 6.49 22 12C22 17.51 17.51 22 12 22ZM12 3.5C7.31 3.5 3.5 7.31 3.5 12C3.5 16.69 7.31 20.5 12 20.5C16.69 20.5 20.5 16.69 20.5 12C20.5 7.31 16.69 3.5 12 3.5ZM14.81 18.48C14.62 18.48 14.42 18.45 14.23 18.4C13.65 18.24 13.16 17.87 12.86 17.35L12.39 16.53C10.72 16.65 9.1 15.95 8.06 14.64C7.8 14.32 7.85 13.85 8.18 13.59C8.51 13.33 8.98 13.39 9.23 13.71C10.04 14.73 11.39 15.22 12.65 14.99C13.48 14.83 14.24 14.38 14.77 13.71C14.92 13.52 15.16 13.42 15.41 13.43C15.66 13.45 15.88 13.59 16 13.8L16.75 15.1C17.37 16.17 17 17.55 15.93 18.17C15.58 18.37 15.2 18.47 14.81 18.47V18.48ZM13.91 16.17L14.16 16.6C14.26 16.77 14.42 16.9 14.62 16.95C14.81 17 15.01 16.98 15.19 16.87C15.55 16.66 15.67 16.2 15.47 15.85L15.21 15.4C14.82 15.72 14.39 15.98 13.92 16.17H13.91ZM17.32 10.97C17.01 10.97 16.72 10.77 16.61 10.46C16.58 10.37 16.3 9.66 15.58 9.66C14.83 9.66 14.55 10.44 14.55 10.45C14.42 10.84 14 11.06 13.6 10.92C13.21 10.79 13 10.36 13.13 9.97C13.36 9.3 14.13 8.15 15.58 8.15C17.03 8.15 17.8 9.29 18.03 9.97C18.16 10.36 17.95 10.79 17.56 10.92C17.48 10.95 17.4 10.96 17.32 10.96V10.97ZM10.16 10.97C9.85 10.97 9.56 10.77 9.45 10.46C9.42 10.37 9.14 9.66 8.42 9.66C7.67 9.66 7.39 10.44 7.39 10.45C7.26 10.84 6.84 11.06 6.44 10.92C6.05 10.79 5.84 10.36 5.97 9.97C6.2 9.3 6.97 8.15 8.42 8.15C9.87 8.15 10.64 9.29 10.87 9.97C11 10.36 10.79 10.79 10.4 10.92C10.32 10.95 10.24 10.96 10.16 10.96V10.97Z" fill="#323544"/>
                        </svg>
                        <p class="nav-text text-md">Memes</p>
                    @endif
                </a>
                
                <a href="/anime" class="navs px-5 py-2 flex items-center gap-4">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6.42187C2 5.17923 3.00736 4.17188 4.25 4.17188H19.75C20.9926 4.17188 22 5.17923 22 6.42188V13.8281C22 15.0708 20.9926 16.0781 19.75 16.0781H12.75V18.3281H15C15.4142 18.3281 15.75 18.6639 15.75 19.0781C15.75 19.4923 15.4142 19.8281 15 19.8281H9.00003C8.58582 19.8281 8.25003 19.4923 8.25003 19.0781C8.25003 18.6639 8.58582 18.3281 9.00003 18.3281H11.25V16.0781H4.25C3.00736 16.0781 2 15.0708 2 13.8281V6.42187ZM4.25 5.67188C3.83579 5.67188 3.5 6.00766 3.5 6.42187V13.8281C3.5 14.2423 3.83579 14.5781 4.25 14.5781H19.75C20.1642 14.5781 20.5 14.2423 20.5 13.8281V6.42188C20.5 6.00766 20.1642 5.67188 19.75 5.67188H4.25Z" fill="#323544"/>
                    </svg>
                    <p class="text-md">Anime</p>
                </a>
            </nav>
    
            <footer class="flex-0 py-5 px-3.5">
                <p class="text-xs text-gray-400">&copy; 2025 WStation.</p>
            </footer>
    
        </aside>

        <main class="bg-gray-50 w-full py-26 px-8 h-screen overflow-y-scroll">
