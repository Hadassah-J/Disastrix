<x-guest-layout>
    <x-authentication-card>
        <div class="flex flex-col lg:flex-row">
            <!-- Left Side: Image -->
            <div class="lg:w-1/2 lg:relative flex items-center justify-center">
                <img src="/images/login&register.jpg" alt="Login and Register Image" class="w-full max-w-full h-full rounded-lg shadow-lg">
            </div>

            <!-- Right Side: Registration Form -->
            <div class="w-full lg:w-3/4 lg:px-8 py-4 lg:py-8 flex items-center justify-center"> <!-- Decreased vertical padding to py-4 and py-8 -->
                <div class="max-w-4xl w-full"> <!-- Adjusted max-width -->
                    <h2 class="text-3xl font-bold mb-6 lg:mb-8 text-center">{{ __('Register') }}</h2>

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <div class="lg:flex lg:justify-between">
    <div class="w-full mt-4">
        <div>
            <x-label for="name" :value="__('Name')" />
        </div>
        <div>
            <x-input id="name" class="block w-full px-4 py-3 lg:py-4 text-lg rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>
    </div>
</div>

<div class="lg:flex lg:justify-between mt-4">
    <div class="w-full">
        <div>
            <x-label for="email" :value="__('Email')" />
        </div>
        <div>
            <x-input id="email" class="block w-full px-4 py-3 lg:py-4 text-lg rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autocomplete="email" />
        </div>
    </div>
</div>


                        <div class="lg:flex lg:justify-between">
                            <div class="w-full mt-4">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="block w-full px-4 py-3 lg:py-4 text-lg rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password" required autocomplete="new-password" />

                                <!-- Password Strength Indicator -->
                                <div id="password-strength-meter" class="mt-2">
                                    <p class="text-sm">Password strength: <span id="password-strength-label">Weak</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="lg:flex lg:justify-between">
                            <div class="w-full mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input id="password_confirmation" class="block w-full px-4 py-3 lg:py-4 text-lg rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>

                        <!-- Password Recommendations -->
                        <div class="text-sm text-gray-600 mt-2">
                            <p>Choose a password that:</p>
                            <ul class="list-disc list-inside">
                                <li>Is at least 8 characters long</li>
                                <li>Includes both uppercase and lowercase letters</li>
                                <li>Contains at least one number and one special character</li>
                                <li>Avoids common words and phrases</li>
                            </ul>
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />
                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-center mt-6">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ml-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-authentication-card>

    <!-- Password Strength JavaScript -->
    <script>
        const passwordInput = document.getElementById('password');
        const strengthLabel = document.getElementById('password-strength-label');
        
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            
            // Check password strength criteria (example)
            if (password.length >= 8 && /[a-z]/.test(password) && /[A-Z]/.test(password) && /[0-9]/.test(password) && /[^a-zA-Z0-9]/.test(password)) {
                strengthLabel.textContent = 'Good';
                strengthLabel.style.color = 'green';
            } else if (password.length >= 6) {
                strengthLabel.textContent = 'Moderate';
                strengthLabel.style.color = 'orange';
            } else {
                strengthLabel.textContent = 'Weak';
                strengthLabel.style.color = 'red';
            }
        });
    </script>
</x-guest-layout>
