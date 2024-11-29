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

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Teachers Card -->
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-cyan-900/50 border border-cyan-700/50 text-cyan-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-emerald-900/50 border border-emerald-700/50 text-emerald-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
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
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-amber-900/50 border border-amber-700/50 text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
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
                <div
                    class="group bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-xl bg-purple-900/50 border border-purple-700/50 text-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
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
                    data: [{{ $totalGuru }}, {{ $totalSiswa }}, {{ $totalUser }},
                        {{ $totalHistory }}
                    ], // Use real data or update monthly data
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
