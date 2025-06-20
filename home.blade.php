@php
    $response = Http::get(URL::current().'/getvideos');
    $videos = json_decode($response);
@endphp

@component('components.header')@endcomponent

    <div class="flex gap-5 flex-col">
        
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold">Videos</h2>
            <a href="/memes" class="text-sm text-gray-500">See more</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        @foreach($videos as $video)
            @php
                $thumbnailPath = URL::current().'/files/thumbnails/'.$video->filename_thumbnail;
                $videoTitle = $video->title_video;
                $name = $video->name;
                $videoId = $video->id_video;
            @endphp

            <div class="rounded-xl flex flex-col gap-2">
                <img id="thumbnail" class="rounded-xl aspect-video cursor-pointer" src="{{ $thumbnailPath }}" alt="">
                <div class="flex gap-2">
                    <img class="w-10 h-10 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                    <div class="flex flex-col gap-.5">
                        <a href="play/{{ $videoId }}" class="font-bold text-lg cursor-pointer">{{ $videoTitle }}</a>
                        <div class="flex gap-1">
                            <p class="text-sm text-gray-600">{{ $name }}</p>
                            <span class="text-gray-400 -translate-y-1">·</span>
                            <p class="text-sm text-gray-500">3.2k views</p>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
                
        </div>
    </div>

    <!-- <div class="flex gap-5 flex-col mt-10">
        
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold">Anime</h2>
            <a href="/anime" class="text-sm text-gray-500">See more</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @for ($i = 0; $i < 10; $i++)
            
                    <div class="rounded-xl flex flex-col gap-2">
                        <img class="rounded-xl" src="https://pic.bstarstatic.com/ogv/eaffa7d8c50ee24fea1989187c70349accd5e563.png@720w_405h_1e_1c_90q.webp" alt="">
                        <div class="flex gap-2">
                            <img class="w-10 h-10 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                            <div class="flex flex-col gap-.5">
                                <h3 class="font-bold text-lg">Lorem ipsum dolor sit.</h3>
                                <div class="flex gap-1">
                                    <p class="text-sm text-gray-600">Udin Gordon</p>
                                    <span class="text-gray-400 -translate-y-1">·</span>
                                    <p class="text-sm text-gray-500">3.2k views</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
            @endfor
                
        </div>
    </div> -->

@component('components.footer')@endcomponent