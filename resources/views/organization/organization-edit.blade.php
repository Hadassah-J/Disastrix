<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Organization
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{route('update-organization',['id' => $organization->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <x-input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $user->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <x-input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password" class="block font-medium text-sm text-gray-700">Location</label>
                            <x-input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="roles" class="block font-medium text-sm text-gray-700">Emergency type</label>
                            <select name="roles" id="roles" class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full'>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $role->name }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <x-button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
