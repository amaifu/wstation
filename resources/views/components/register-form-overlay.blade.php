<div id="reg-overlay" class="z-50 fixed inset-0 bg-[rgba(0,0,0,.5)] hidden items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-md relative">
        <!-- Close and back icons top left and right -->
         <div class="flex justify-between px-8 pt-6">
             <button id="reg-back" aria-label="Back" class="text-gray-700 text-lg cursor-pointer">
                 <i class="fas fa-chevron-left"></i>
             </button>
             <button id="reg-close" aria-label="Close" class="text-gray-700 text-lg cursor-pointer">
                 <i class="fas fa-times"></i>
             </button>
         </div>

        <form id="reg-form" class="px-10 pb-8">
            <h2 class="text-center font-semibold text-2xl text-gray-900 mb-6">Sign Up</h2>
            <!-- Notification -->
            <p class="text-xs text-red-500 mb-4 hidden"></p>

            <input id="reg-email" type="email" placeholder="Email"
                class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-400"
                required />
            <!-- Notification -->
            <p class="text-xs text-red-500 mb-4 hidden"></p>

            <div class="relative mb-1">
                <input id="reg-password" type="password" placeholder="Enter Password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 pr-10 text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    required />
                <button type="button" aria-label="Toggle password visibility"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-600">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <p class="text-[10px] text-gray-900 mb-3">
                8-20 characters from at least 2 categories: letters, numbers, special characters.
            </p>

            <div class="relative mb-4">
                <input id="reg-confirm-password" type="password" placeholder="Confirm Password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 pr-10 text-gray-600 placeholder-gray-300 cursor-not-allowed"
                    disabled />
                <button type="button" aria-label="Toggle password visibility"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-600 cursor-not-allowed" disabled>
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <div class="flex space-x-2 mb-4">
                <input id="reg-verif-code" type="text" placeholder="Enter verification code"
                    class="flex-grow border border-gray-300 rounded-md px-3 py-2 text-gray-600 placeholder-gray-300 cursor-not-allowed"
                    disabled />
                <button type="button" class="bg-blue-300 text-white font-semibold px-4 rounded-md cursor-not-allowed"
                    disabled>
                    Send Code
                </button>
            </div>
            <p class="text-xs text-gray-400 mb-4 hidden"></p>

            <label class="flex items-center mb-6 text-gray-700 text-sm cursor-pointer">
                <input type="checkbox" class="mr-2" name="rememberme" />
                Remember me
            </label>

            <button id="btn-reg" type="button" disabled
                class="w-full bg-blue-300 text-white font-semibold py-2 mb-16 rounded-md cursor-not-allowed">
                Sign Up
            </button>

            <div class="text-xs text-gray-500 select-none flex-2 flex items-end justify-center">
                <label class="inline-flex items-start gap-2">
                    <input  id="agreeTosPp-register-form-overlay" class="mt-1 w-3 h-3 border border-gray-300 rounded-sm cursor-pointer" type="checkbox" required />
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
                Already have an account?
                <a class="to-log text-blue-600 hover:underline" href="#">
                    Sign In
                </a>
            </p>
        </form>
    </div>
</div>