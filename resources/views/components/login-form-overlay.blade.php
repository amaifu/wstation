<div id="login-form-overlay" class="z-50 fixed inset-0 bg-[rgba(0,0,0,.5)] hidden items-center justify-center" role="dialog">
    <div class="w-full max-w-md bg-white rounded-2xl border border-gray-200 p-8 relative flex flex-col">
        <!-- Top bar with back and close icons -->
        <div class="flex justify-between items-center">
            <button aria-label="back to overlay login method" class="text-gray-700 text-lg cursor-pointer">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button aria-label="close overlay login form" class="text-gray-700 text-lg cursor-pointer">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Title -->
        <h2 class="text-center font-semibold text-gray-800 text-2xl mb-8">Log In</h2>

        <!-- Form -->
        <form id="form-login-form-overlay" class="space-y-4" autocomplete="off" novalidate>
            <p class="text-xs text-red-500 hidden"></p>
            <input type="email" placeholder="Email"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600"
                aria-label="email login form" required />
            <p class="text-xs text-red-500 hidden"></p>

            <div class="relative">
                <input type="password" placeholder="Enter Password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 pr-10 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600"
                    aria-label="password login form" required />
                <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-400"
                    aria-label="Show password" tabindex="-1">
                    <i class="far fa-eye"></i>
                </button>
            </div>

            <div class="flex justify-between items-center text-gray-500 text-sm">
                <label class="flex items-center space-x-2 cursor-pointer select-none">
                    <input type="checkbox" class="w-4 h-4 border border-gray-300 rounded text-blue-600 focus:ring-blue-600" />
                    <span>Remember me</span>
                </label>
                <button type="button" class="text-blue-600 hover:underline text-sm font-normal">
                    Forgot Password?
                </button>
            </div>

            <button id="btn-login" type="submit" disabled class="w-full bg-blue-300 text-white font-semibold py-2 mt-8 mb-16 rounded-md cursor-not-allowed">
                Login
            </button>

            <!-- Bottom text -->
            <div class="text-xs text-gray-500 select-none flex-2 flex items-end justify-center">
                <label class="inline-flex items-start gap-2">
                    <input  id="agreeTosPp-login-form-overlay" class="mt-1 w-3 h-3 border border-gray-300 rounded-sm cursor-pointer" type="checkbox" required />
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