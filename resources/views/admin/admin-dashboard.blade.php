<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl mb-4">Statistics</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg">Total Users</h4>
                        <p class="text-2xl">{{$users}}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg">Active Incidents</h4>
                        <p class="text-2xl">{{$activeincidents}}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="text-lg">Responders Online</h4>
                        <p class="text-2xl">{{$activerespondents}}</p>
                    </div>
                </div>

                <h3 class="text-2xl mt-8 mb-4">Charts</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="w-60 h-60 p-2">
                    <canvas id="incidentsChart" class="w-20 h-20"></canvas>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctxIncidents = document.getElementById('incidentsChart').getContext('2d');
        var incidentsChart = new Chart(ctxIncidents, {
            type: 'pie',
            
           data: {
                labels: ['Solved incidents'],
                datasets: [{
                         label: 'Solved incidents',
                         backgroundColor: ['rgb(234, 179, 8)'],
                         data:[{{$solvedincidents}}],
        }]
      },
        });

        var ctxUsers = document.getElementById('usersChart').getContext('2d');
        var usersChart = new Chart(ctxUsers, {
            type: 'line',

            options: {
                responsive: true,
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-app-layout>
