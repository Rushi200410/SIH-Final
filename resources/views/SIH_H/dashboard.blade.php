<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMRC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboardstyle.css') }}">

</head>
<body>
    <!-- Navigation Bar -->
    <header class="header">
        <a href="#" class="logo">
            <img src="{{ asset('image/delhi_metro_logo.png') }}" alt="Company Logo" class="brand-logo" style="width: 150px; height: auto;" />
        </a>
        <nav class="nav">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
            <a href="{{ route('notification') }}">Notifications</a>
            <a href="{{ route('reports') }}">Reports</a>
            <a href="{{ route('aboutus') }}">About Us</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Key Metrics Section -->
        <section class="key-metrics">
            <h2>Key Metrics</h2>
            <div class="metrics-chart-container" style="margin-top: -25px;">
                <div class="metrics-container">
                    <div class="card">
                        <h3>Location</h3>
                        <p>Station A, B, C</p>
                    </div>
                    <div class="card">
                        <h3>Total Sensors Used</h3>
                        <p>150</p>
                    </div>
                    <div class="card">
                        <h3>Good Condition %</h3>
                        <p>85%</p>
                    </div>
                    <div class="card">
                        <h3>Bad Condition %</h3>
                        <p>15%</p>
                    </div>
                </div>


                <div class="pie-chart-container" style="margin-top: -37px">
                    <h2>Sensor Health Distribution</h2>
                    <svg class="pie-chart" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                        <!-- Background circle -->
                        <circle class="bg" r="15.9" cx="18" cy="18" stroke="#e6e6e6" stroke-width="3" fill="#ffffff"></circle>

                        <!-- Good condition pie slice -->
                        <circle class="good" r="15.9" cx="18" cy="18"
                                stroke="#d30505"
                                stroke-width="3"
                                stroke-dasharray="85 15"
                                fill="none">
                            <title>85% Good</title>
                        </circle>

                        <!-- Text inside pie -->
                        <text x="50%" y="50%" text-anchor="middle" dy=".3em" font-size="1em" fill="#333">85% Good</text>
                    </svg>
                </div>

            </div>
        </section>

        <!-- Defect Overview Section -->
        <section class="defect-overview">
            <h2>Defect Overview</h2>
            <table>
                <thead>
                    <tr>
                        <th>Defect ID</th>
                        <th>Location</th>
                        <th>Severity</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date Detected</th>
                        <th>Inspection Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>D001</td>
                        <td>Track Near Station A</td>
                        <td>High</td>
                        <td>Crack</td>
                        <td>Pending</td>
                        <td>12/12/2024</td>
                        <td>13/12/2024</td>
                    </tr>
                    <tr>
                        <td>D002</td>
                        <td>Station B Curve</td>
                        <td>Medium</td>
                        <td>Rust</td>
                        <td>Resolved</td>
                        <td>10/12/2024</td>
                        <td>11/12/2024</td>
                    </tr>
                    <tr>
                        <td>D003</td>
                        <td>Bridge Track C</td>
                        <td>High</td>
                        <td>Misalignment</td>
                        <td>In Progress</td>
                        <td>08/12/2024</td>
                        <td>10/12/2024</td>
                    </tr>
                    <tr>
                        <td>D004</td>
                        <td>Station D Tunnel</td>
                        <td>Low</td>
                        <td>Weld Issue</td>
                        <td>Pending</td>
                        <td>06/12/2024</td>
                        <td>07/12/2024</td>
                    </tr>
                    <tr>
                        <td>D005</td>
                        <td>Track E</td>
                        <td>Medium</td>
                        <td>Surface Wear</td>
                        <td>Resolved</td>
                        <td>04/12/2024</td>
                        <td>05/12/2024</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
