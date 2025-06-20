<div id="login-method-overlay" aria-labelledby="login-title" aria-modal="true"
     class="z-50 fixed inset-0 bg-[rgba(0,0,0,.5)] hidden items-center justify-center" role="dialog">
     <div class="bg-white rounded-2xl max-w-sm w-full relative px-8 pt-6 pb-8 flex flex-col">
          <button aria-label="close overlay login method" class="text-gray-700 self-end cursor-pointer">
               <i class="fas fa-times"></i>
          </button>
          <h2 class="text-center font-semibold text-2xl mt-2 mb-10 select-none" id="login-title">
               Log In to Wstation
          </h2>
          <form id="form-login-method-overlay" method="">
               <div class="mx-4 space-y-3">
                    <button id="btn-login-with-google" class="w-full border border-gray-300 rounded text-sm py-3 px-6 flex items-center gap-2 hover:bg-gray-50 cursor-pointer"
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
                    </button>
               </div>
               <div class="text-xs text-gray-500 select-none flex-2 flex items-end justify-center">
                 <label class="inline-flex items-start gap-2">
                     <input id="agreeTosPp-login-method-overlay" class="mt-1 w-3 h-3 border border-gray-300 rounded-sm cursor-pointer" type="checkbox" required  />
                     <span class="text-gray-400">
                         I have attained the age of 13. By logging in, you acknowledge and agree you have read and agree to be bound by Terms of Service & Privacy Policy
                             <a class="text-blue-600 hover:underline" href="#">
                                 Terms of Service
                             </a>
                             &
                             <a class="text-blue-600 hover:underline" href="#">
                                 Privacy Policy
                             </a>
                             .
                     </span>
                 </label>
             </div>
             <p class="mt-4 text-xs text-center text-gray-400 select-none">
                 Don't have an account?
                 <a class="to-reg text-blue-600 hover:underline" href="#">
                     Sign Up
                 </a>
             </p>
          </form>
     </div>
</div>