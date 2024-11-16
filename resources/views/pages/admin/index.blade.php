@extends('layout.pegawai.main')

@section('title')
    Dashboard || {{ Auth::user()->role == 0 ? 'Admin' : 'Pegawai' }}
@endsection

@section('pages')
    Dashboard
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container ml-2">
        <p>Hello, Selamat Datang {{ Auth::user()->name }}!</p>

        <div class="row">
            <!-- Total Jobcards -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title p-3">
                        <p class="fw-bolder">Total Jobcards</p>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 24px;" class="fw-bold">{{ $totalJobcards }}</p>
                        <img src="" alt="">
                    </div>
                </div>
            </div>

            <!-- Total Revisions -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title p-3">
                        <p class="fw-bolder">Total Revisions</p>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 24px;" class="fw-bold">{{ $totalRevisions }}</p>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart Section -->
        <div class="row mt-5">
            <div class="card p-3">
                <div class="card-title">
                    <p class="fw fw-bolder">Total Jobcards</p>
                </div>
                <div class="card-body">
                    <!-- Fixed size canvas for the chart -->
                    <canvas id="jobcardChart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('jobcardChart').getContext('2d');
    const jobcardChart = new Chart(ctx, {
        type: 'bar', // Change to bar chart
        data: {
            labels: {!! json_encode($monthlyJobcardLabels) !!}, // Months
            datasets: [{
                label: 'Total Jobcards',
                data: {!! json_encode($monthlyJobcardData) !!}, // Jobcard counts per month
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Bar color
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false, // Disable responsiveness to use fixed size
            maintainAspectRatio: false, // Ignore default aspect ratio
            animation: false, // Disable animations
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1, // Set step size to 1
                        callback: function(value) {
                            return Number.isInteger(value) ? value : null; // Display only integers
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
