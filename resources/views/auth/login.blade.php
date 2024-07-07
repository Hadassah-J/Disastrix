<x-guest-layout>
    <div class="min-h-screen flex justify-center items-center bg-gray-100">
        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded-lg overflow-hidden w-full lg:w-2/3 xl:w-1/2 p-8 lg:p-12">
            @csrf

            <!-- Image Section -->
            <div class="w-1/3 flex items-center justify-center mb-8 lg:hidden">
                <img src="/images/login&register.jpg" alt="Login and Register Image" class="w-full max-w-full h-auto rounded-lg shadow-lg">
            </div>

            <!-- Form Content -->
            <div class="flex flex-col space-y-6 lg:flex-row lg:space-y-0 lg:space-x-8">
                <!-- Image Section (visible for lg screens and above) -->
                <div class="hidden lg:block w-1/3 flex items-center justify-center">
                    <img src="/images/login&register.jpg" alt="Login and Register Image" class="w-full max-w-full h-auto rounded-lg shadow-lg">
                </div>

                <!-- Form Fields -->
                <div class="w-full lg:w-2/3">
                    <!-- Status Message -->
                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession

                    <!-- Email Field -->
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full lg:w-3/4 xl:w-2/3 px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <!-- Password Field -->
                    <div class="mt-6">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full lg:w-3/4 xl:w-2/3 px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="block mt-6">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <!-- Forgot Password Link and Submit Button -->
                    <div class="flex items-center justify-between mt-6">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ml-4 h-full">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
