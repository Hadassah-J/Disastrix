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
                            <form action="{{route('incident-send',['id'=>$incident->id])}}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Select
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>



                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($responders as $responder)


                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <input type="checkbox" name="responders[]" value="{{$responder->id}}">
                                             </td>

                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                 {{ $users[$responder->user_id]->name}}
                                             </td>

                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                 {{ $users[$responder->user_id]->email}}
                                             </td>
                                            </tr>
                                    @endforeach
                                        </tbody>
                                    </table>
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
