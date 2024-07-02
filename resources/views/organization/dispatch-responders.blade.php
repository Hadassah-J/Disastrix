<!-- resources/views/incidents/dispatch.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dispatch Responders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    

                      <h5 class="mt-4 text-lg font-semibold">Online Responders:</h5>
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-2">
                                    @foreach ($responders as $responder)
                                        <div>
                                            <input type="checkbox" name="responders[]" value="{{ $responder->id }}">
                                            <label>{{ $responder->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Dispatch Selected Responders
                                </button>
                            </form>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
