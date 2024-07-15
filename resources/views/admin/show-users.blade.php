<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users List
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Roles
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->email }}
                                        </td>
                                        @if($user->is_online)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Online
                                        </td>
                                        @else
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Offline
                                        </td>

                                        @endif



                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                           @foreach($roles as $role)
                                             @if($user->role_id==$role->id)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                   {{$role->name}}
                                                </span>
                                             @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                           
                                            <form class="inline-block" action="{{route('delete-user',['id'=>$user->id])}}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2 w-60 h-60">
                <canvas class="items-center" id="user-roles"></canvas>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('user-roles').getContext('2d');

    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Organization heads','Admins'],
        datasets: [{
          label: 'User roles',
          backgroundColor: ['rgb(234, 179, 8)', 'rgb(34, 197, 94)'],
          data:[{{$admincount}},{{$organization_headcount}}],
        }]
      },
    });
</script>


        </div>
    </div>
</x-app-layout>
