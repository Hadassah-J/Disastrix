<!-- resources/views/incidents/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Incident Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">Incident #{{ $incident->id }}</h3>
                    <div class="mb-4">
                        <strong>Title:</strong> {{ $incident->incident_type }}
                    </div>

                    <div class="mb-4">
                        <strong>Location:</strong> {{ $incident->location }}
                    </div>
                    <div class="mb-4">
                        <strong>Date:</strong> {{ $incident->time_of_incident}}
                    </div>
                    <div class="mb-4">
                        <strong>Status:</strong> <span class="bg-red-200 border-red-100 border rounded-lg p-2 text-red-700 hover:text-white">{{ $incident->status }}</span>
                    </div>
                    @if(Auth::user()->role_id==3)
                    <div class="mt-6">
                        <a href="{{route('dispatch-incident',['id'=>$incident->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Dispatch respondents
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
