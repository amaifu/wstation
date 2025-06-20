@component('components.header')@endcomponent
    
    @php
        $videoPath = env('APP_URL').'files/videos/'.$videoPlaying[0]->filename_video;
        $videoTitle = $videoPlaying[0]->title_video;
    @endphp

    <div class="flex gap-2">
        <!-- Col 1 -->
        <div class="flex-2 lg:flex-3">
            <!-- Row 1 -->
            <div>
                <video src="{{ $videoPath }}" alt="Video Player" loading="lazy" controls class="aspect-video w-full bg-black"></video>
            </div>
            <!-- Row 2 -->
            <div class="flex flex-col gap-4">
                <div class="flex gap-4 p-3 text-sm">
                    <button type="button" class="flex gap-1 cursor-pointer">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6387 6.87094L14.1192 4.74639C14.4376 3.33902 13.3676 2 11.9247 2H11.6692C10.9853 2 10.3386 2.31102 9.91159 2.84521L6.40881 7.22761H4.25C3.00736 7.22761 2 8.23497 2 9.47761V16.435C2 17.6776 3.00736 18.685 4.25 18.685H6.68024L6.68633 18.6864C6.74811 18.7011 6.83803 18.7221 6.95293 18.7479C7.18269 18.7995 7.51273 18.8706 7.91793 18.9495C8.72718 19.107 9.84188 19.2966 11.0594 19.4233C12.2736 19.5496 13.6097 19.6154 14.8561 19.5178C16.0867 19.4214 17.3131 19.16 18.2456 18.5682C20.1839 17.3381 21.4767 15.2871 21.8717 13.1949C22.2678 11.0971 21.7704 8.85732 19.9779 7.39626C19.2743 6.82281 18.4122 6.56286 17.5749 6.46799C16.7358 6.37293 15.8728 6.43782 15.1118 6.55723C14.5675 6.64265 14.0626 6.75806 13.6387 6.87094ZM11.6692 3.5C11.4412 3.5 11.2256 3.60367 11.0833 3.78174L7.51948 8.24051V17.3367C7.70855 17.3776 7.9395 17.4256 8.20452 17.4771C8.98435 17.6289 10.0534 17.8105 11.2146 17.9313C12.3791 18.0524 13.6166 18.1103 14.739 18.0224C15.8773 17.9332 16.8149 17.6997 17.4419 17.3017C19.0101 16.3065 20.0753 14.6241 20.3978 12.9166C20.7191 11.2148 20.2934 9.58859 19.0302 8.55896C18.6223 8.22647 18.0681 8.03346 17.4061 7.95846C16.7459 7.88366 16.0267 7.93201 15.3444 8.03909C14.6656 8.14561 14.0477 8.30626 13.5981 8.44118C13.3741 8.50838 13.1939 8.56858 13.0712 8.6114C13.0099 8.6328 12.9631 8.64981 12.9325 8.66114L12.899 8.67367L12.8918 8.67642C12.6334 8.77673 12.3398 8.72671 12.1298 8.54576C11.9198 8.36475 11.8267 8.08261 11.8879 7.81215L12.6562 4.41546C12.7623 3.94634 12.4057 3.5 11.9247 3.5H11.6692ZM6.01948 17.185V8.72761H4.25C3.83579 8.72761 3.5 9.0634 3.5 9.47761V16.435C3.5 16.8492 3.83579 17.185 4.25 17.185H6.01948Z" fill="#323544"/>
                        </svg>
                        <span>0</span>
                    </button>
                    <button type="button" class="flex cursor-pointer">
                        <svg width="24" height="24" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4.48242C5 3.23978 6.00736 2.23242 7.25 2.23242H17.75C18.9926 2.23242 20 3.23978 20 4.48242V21.4824C20 21.759 19.8478 22.0132 19.6039 22.1437C19.36 22.2742 19.0641 22.2599 18.834 22.1065L12.916 18.1612C12.6641 17.9932 12.3359 17.9932 12.084 18.1612L6.16603 22.1065C5.93588 22.2599 5.63997 22.2742 5.39611 22.1437C5.15224 22.0132 5 21.759 5 21.4824V4.48242ZM7.25 3.73242C6.83579 3.73242 6.5 4.06821 6.5 4.48242V20.081L11.2519 16.9131C12.0077 16.4092 12.9923 16.4092 13.7481 16.9131L18.5 20.081V4.48242C18.5 4.06821 18.1642 3.73242 17.75 3.73242H7.25Z" fill="#323544"/>
                        </svg>
                        Favorites
                    </button>
                </div>
                <h3 class="font-bold sm:text-sm lg:text-lg">{{ $videoTitle }}</h3>
            </div>
        </div>
        <!-- Col 2 --> 
        <div class="flex-1 pl-6 flex flex-col gap-2">

            <h2 class="text-xl font-bold mb-4">Recent Videos</h2>
            
             @foreach($videoRecents as $video)
                @php
                    $thumbnailPath = env('APP_URL').'/files/thumbnails/'.$video->filename_thumbnail;
                    $videoTitle = $video->title_video;
                    $name = $video->name;
                    $videoId = $video->id_video;
                @endphp

                <div class="grid grid-cols-2 gap-2">
                    <div class="rounded-sm overflow-hidden grid place-items-center">
                        <img id="thumbnail" class="rounded-sm aspect-video cursor-pointer" src="{{ $thumbnailPath }}" alt="">
                    </div>
                    <div class="flex-col flex gap-2 ">

                        <a href="{{ $videoId }}" class="font-bold text-xs lg:text-sm cursor-pointer">{{ $videoTitle }}</a>
                        <div class="flex flex-col gap-1">
                            <div class="flex gap-1 items-center">
                                <img class="w-4 xl:w-6 h-4 xl:h-6 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                                <p class="text-xs text-gray-600">{{ $name }}</p>
                            </div>
                            <p class="text-xs text-gray-500">3.2k views</p>
                        </div>

                    </div>
                </div>

            @endforeach

        </div>

    </div>

@component('components.footer')@endcomponent