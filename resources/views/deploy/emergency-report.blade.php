<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('incident-show') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Incident type') }}" />
                <x-incident-list />
            </div>

            <div class="mt-4">
                <x-label for="location" value="{{ __('Location') }}" />
                <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autocomplete="location" />
            </div>

            <div class="mt-4">
                <x-label for="time" value="{{ __('Time') }}" />
                <x-input id="time" class="block mt-1 w-full" type="time" name="time" :value="old('time')" required autocomplete="time" />
            </div>

            <div class="mt-4">
                <x-label for="Details" value="{{ __('Details') }}" />
                <input id="details" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full h-40px' type="text" name="details" required autocomplete="details" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif



                <x-button class="ms-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
    <script>
    document.body.style.backgroundImage = "url('/images/Emergency.jpg')";
    document.body.style.backgroundSize = "cover";
</script>
</x-guest-layout>
