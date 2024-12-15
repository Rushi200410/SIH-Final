<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/reportsstyle.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for interactive graphs -->
</head>
<body>
    <!-- Navigation Bar -->
    <header class="header">
        <a href="#" class="logo">
            <img src="{{ asset('image/delhi_metro_logo.png') }}" alt="Company Logo" class="brand-logo" style="width: 150px; height: auto;" />
        </a>
        <nav class="nav">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('notification') }}">Notifications</a>
            <a href="{{ route('reports') }}" class="active">Reports</a>
            <a href="{{ route('aboutus') }}">About Us</a>
        </nav>
    </header>

    <!-- Reports Page Content -->
    <main class="reports-container">
        <!-- Filters for Reports -->
        <section class="report-filters">
            <input type="date" class="filter-input">
            <select class="filter-select">
                <option value="all">All Regions</option>
                <option value="north">North</option>
                <option value="south">South</option>
                <option value="east">East</option>
                <option value="west">West</option>
            </select>
            <button class="filter-btn">Generate Report</button>
        </section>

        <!-- Report Charts -->
        <section class="charts-container">
            <div class="chart-card">
                <h3>Defect Trends Over Time</h3>
                <img src="{{ asset('AI_Model/public/graphs/waveform_with_defects.png') }}" alt="Waveform with Defects" class="img-fluid" style="width: 750px; height:400px; margin-top: -20px">
            </div>
            <div class="chart-card">
                <h3>Defects by Region</h3>
                <canvas id="regionChart"></canvas>
            </div>
        </section>

        <!-- Download Reports -->
        <section class="download-section">
            <a href="{{ route('download.csv') }}" class="btn btn-secondary"><button class="download-btn">Export as CSV</button></a>
            <a href="{{ route('download.pdf') }}" class="btn btn-primary"><button class="download-btn">Export as PDF</button></a>
            <a href="{{ route('download.csv') }}" class="btn btn-secondary"><button class="download-btn">Export as Excel</button></a>

        </section>
    </main>

    <!-- JavaScript for Charts -->
    <script>
        // const ctx1 = document.getElementById('defectChart').getContext('2d');
        // new Chart(ctx1, {
        //     type: 'line',
        //     data: {
        //         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        //         datasets: [{
        //             label: 'Number of Defects',
        //             data: [12, 19, 8, 15, 20, 10],
        //             borderColor: '#c32227',
        //             backgroundColor: 'rgba(192, 40, 44, 0.2)',
        //             borderWidth: 2,
        //             fill: true,
        //         }]
        //     }
        // });

        const ctx2 = document.getElementById('regionChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['North', 'South', 'East', 'West'],
                datasets: [{
                    label: 'Defects',
                    data: [5, 10, 7, 3],
                    backgroundColor: ['#C0282C', '#f5a623', '#4caf50', '#4287f5']
                }]
            }
        });
    </script>
</body>
</html>
