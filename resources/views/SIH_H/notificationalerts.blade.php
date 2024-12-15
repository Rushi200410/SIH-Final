<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/notificationalertsstyle.css') }}">

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
            <a href="{{ route('notification') }}" class="active">Notifications</a>
            <a href="{{ route('reports') }}">Reports</a>
            <a href="{{ route('aboutus') }}">About Us</a>
        </nav>
    </header>

    <!-- Main Dashboard Section -->
    <main class="dashboard">
        <!-- Page Title -->
        <section class="dashboard-header">
            <br>
            <h1>Notifications Center</h1>
            <p>Monitor, analyze, and respond to critical alerts.</p>
        </section>

        <!-- Search and Filter Section -->
        <section class="search-filter">
            <input type="text" placeholder="Search alerts..." class="search-bar">
            <select class="filter-select">
                <option value="all">Severity: All</option>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
            <select class="filter-select">
                <option value="all">Region: All</option>
                <option value="north">North</option>
                <option value="south">South</option>
                <option value="east">East</option>
                <option value="west">West</option>
            </select>
            <button class="filter-btn">Apply Filters</button>
        </section>

        <!-- Alerts Overview Section -->
        <section class="overview">
            <div class="overview-card high">
                <h2>12</h2>
                <p>High Severity Alerts</p>
            </div>
            <div class="overview-card medium">
                <h2>8</h2>
                <p>Medium Severity Alerts</p>
            </div>
            <div class="overview-card low">
                <h2>5</h2>
                <p>Low Severity Alerts</p>
            </div>
        </section>

        <!-- Alerts List Section -->
        <section class="alerts-section" style="margin-top: 50px;">
            <h2>Future Goals</h2>
            <div class="alerts-list" style="margin-top: -20px">
                <!-- High Severity Alerts -->
                <div class="alert-item high">
                    <h3>Track Crack Detected</h3>
                    <p><strong>Location:</strong> Station A</p>
                    <p><strong>Severity:</strong> High</p>
                    <p><strong>Time:</strong> 10:30 AM</p>
                    {{-- <button class="details-btn">View Details</button> --}}
                </div>
                <div class="alert-item high">
                    <h3>Signal Failure</h3>
                    <p><strong>Location:</strong> Station D</p>
                    <p><strong>Severity:</strong> High</p>
                    <p><strong>Time:</strong> 8:50 AM</p>
                    {{-- <button class="details-btn">View Details</button> --}}
                </div>

                <!-- Medium Severity Alerts -->
                <div class="alert-item medium">
                    <h3>Track Wear</h3>
                    <p><strong>Location:</strong> Station E</p>
                    <p><strong>Severity:</strong> Medium</p>
                    <p><strong>Time:</strong> 8:15 AM</p>
                    {{-- <button class="details-btn">View Details</button> --}}
                </div>

                <!-- Low Severity Alerts -->
                <div class="alert-item low">
                    <h3>Small Debris on Track</h3>
                    <p><strong>Location:</strong> Station J</p>
                    <p><strong>Severity:</strong> Low</p>
                    <p><strong>Time:</strong> 5:30 AM</p>
                    {{-- <button class="details-btn">View Details</button> --}}
                </div>
            </div>
        </section>
    </main>
</body>
</html>
