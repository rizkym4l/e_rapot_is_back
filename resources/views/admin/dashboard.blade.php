@extends('layouts.main')

@section('contentAdmin')
    <div class="min-h-screen bg-slate-900 p-6">
        <div class="container mx-auto space-y-6">
            <!-- Welcome Card -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent mb-2">
                    Admin Dashboard
                </h1>
                <p class="text-slate-400">
                    Welcome to the Admin Dashboard. Here you can monitor important metrics and manage users.
                </p>
            </div>

            <!-- New Data Notifications -->
            @if(Session::has('newData') && count(Session::get('newData')) > 0)
                <div class="bg-green-800/50 backdrop-blur-xl border border-green-700 p-6 rounded-xl shadow-xl" role="alert">
                    <h2 class="text-xl font-semibold text-white mb-2">New Data Added Today</h2>
                    <ul class="list-disc list-inside text-green-300">
                        @foreach(Session::get('newData') as $type => $data)
                            <li>New {{ ucfirst($type) }} added: 
                                @if($type === 'guru' || $type === 'siswa' || $type === 'user')
                                    {{ $data->name }}
                                @else
                                    ID: {{ $data->id }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Teachers Card -->
                <div class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-cyan-900/50 border border-cyan-700/50 text-cyan-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">Total Teachers</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-cyan-400 transition-colors">
                                {{ $totalGuru }}
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Students Card -->
                <div class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-emerald-900/50 border border-emerald-700/50 text-emerald-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">Total Students</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-emerald-400 transition-colors">
                                {{ $totalSiswa }}
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                <div class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-amber-900/50 border border-amber-700/50 text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">Total Users</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-amber-400 transition-colors">
                                {{ $totalUser }}
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- History Card -->
                <div class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-purple-900/50 border border-purple-700/50 text-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-400">Total History</p>
                            <h2 class="text-2xl font-bold text-white group-hover:text-purple-400 transition-colors">
                                {{ $totalHistory }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Growth Chart -->
                <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                    <h3 class="text-xl font-semibold text-white mb-4">User Growth</h3>
                    <canvas id="userGrowthChart" width="400" height="200"></canvas>
                </div>

                <!-- Activity Distribution Chart -->
                <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                    <h3 class="text-xl font-semibold text-white mb-4">Activity Distribution</h3>
                    <canvas id="activityDistributionChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // User Growth Chart (using sample data - update as necessary)
        var userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        var userGrowthChart = new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'User Growth',
                    data: [{{ $totalGuru }}, {{ $totalSiswa }}, {{ $totalUser }}, {{ $totalHistory }}], // Use real data or update monthly data
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Activity Distribution Chart
        var activityDistributionCtx = document.getElementById('activityDistributionChart').getContext('2d');
        var activityDistributionChart = new Chart(activityDistributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Teachers', 'Students', 'Users'],
                datasets: [{
                    data: [{{ $totalGuru }}, {{ $totalSiswa }}, {{ $totalUser }}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Activity Distribution'
                    }
                }
            }
        });
    </script>
@endsection

