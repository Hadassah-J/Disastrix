<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notifications
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white rounded-lg shadow border border-gray-200 hover:bg-gray-50">
                    @forelse($notifications as $notification)
                    <div class="mb-4 bg-zinc-200">
                        <strong>Message:</strong> {{ $notification->data['message']}}
                    </div>



                    @empty
                    <p>No notifications available.</p>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
</x-app-layout>




