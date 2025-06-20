<div id="upload-overlay" aria-labelledby="login-title" aria-modal="true"
     class="fixed inset-0 bg-[rgba(0,0,0,.5)] items-center justify-center hidden" role="dialog">
     <div class="bg-white rounded-xl max-w-sm w-full relative px-8 pt-6 pb-8 flex flex-col">
          <button id="close-upload-overlay" class="text-gray-700 self-end cursor-pointer">
               <i class="fas fa-times"></i>
          </button>
          <h2 class="text-center font-semibold text-2xl mt-2 mb-10 select-none" id="login-title">
               Upload Video
          </h2>
          <form id="upload-form-overlay" method="" enctype="multipart/form-data">
               <div class="mx-4 space-y-3 text-sm flex flex-col gap-3">
                    <input id="input-video-title" class="rounded-sm border-1 border-gray-300 p-2 w-full" type="text" placeholder="Your video title" required>
                    <div>
                         <label for="input-thumbnail" class="border-1 border-gray-300 p-2 rounded-sm text-gray-500 cursor-pointer hover:bg-gray-200"><i class="fa-regular fa-image"></i>&emsp;Select Thumbnail</label>
                         <input id="input-thumbnail" type="file" accept=".jpg, .jpeg, .png, .webp" class="hidden" required>
                         <img id="preview-thumbnail" src="#" alt="Thumbnail Preview" width="160" height="120" loading="lazy" class="hidden aspect-video mt-4">
                    </div>
                    <div>
                         <label for="input-video" class="border-1 border-gray-300 p-2 rounded-sm text-gray-500 cursor-pointer hover:bg-gray-200"><i class="fa-solid fa-file-video"></i>&emsp;&nbsp;Select Video</label>
                         <input id="input-video" type="file" accept=".mp4, .mkv, .webm" class="hidden" required>
                         <video id="preview-video" src="#" alt="Video Preview" width="160" height="120" loading="lazy" controls class="hidden aspect-video mt-4"></video>
                    </div>
                    <p class="text-xs text-red-500 hidden"></p>
                    <button id="btn-upload" type="submit" class="bg-blue-500 p-2 text-white rounded-sm w-full cursor-pointer font-bold">Upload</button>
                    <!-- <button id="btn-login-with-google" class="w-full border border-gray-300 rounded text-sm py-3 px-6 flex items-center gap-2 hover:bg-gray-50 cursor-pointer"
                         type="button">
                         <i class="fa-brands fa-google"></i>
                         <span class="font-semibold flex-1">
                              Log In with Google
                         </span>
                    </button>
                    <button id="btn-login-with-email" class="w-full border border-gray-700 rounded text-sm py-3 px-6 mb-12 flex items-center gap-2 hover:bg-gray-100 cursor-pointer" type="button">
                         <i class="fas fa-user text-black text-sm"></i>
                         <span class="font-semibold flex-1">
                              Log In with Email
                         </span>
                    </button> -->
               </div>
          </form>
     </div>
</div>