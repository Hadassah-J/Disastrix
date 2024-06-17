<form method="POST" action="{{ route('p.email') }}">
    @csrf

    <div class="block">
        <h2>We would like to know more about you in order to personalize your experience.</h2>
        <x-label for="role" value="{{ __('Role') }}" />
        <x-drop-select />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ms-4">
            {{ __('Submit') }}
        </x-button>
    </div>
</form>
