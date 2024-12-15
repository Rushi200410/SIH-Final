<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DMRC</title>
    <link rel="stylesheet" href="{{ asset('css/homepagestyle.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <header class="header" style="margin-top:-2px;">
        <a href="https://delhimetrorail.com/" class="logo">
            <img src="{{ asset('image/delhi_metro_logo.png') }}" alt="Company Logo" class="brand-logo" style="width: 150px; height: auto;" />
        </a>
        <nav class="nav">
            <a href="{{ route('home') }}" class="active">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('notification') }}">Notifications</a>
            <a href="{{ route('reports') }}">Reports</a>
            <a href="{{ route('aboutus') }}">About Us</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-text">
            <h1>Revolutionizing Rail Track Safety with AI-Powered Insights</h1>
            <p>Efficiently detect defects and ensure rail safety with real-time monitoring and AI-driven analytics.</p>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="key-features">
        <h2>Key Features</h2>
        <div class="feature-cards">

            <div class="feature-card">
                <a href="#">
                    <div>
                        <h3>Real-time Monitoring</h3>
                        <p>Continuous tracking of rail conditions using ultrasonic probes and AI-based analysis.</p>
                    </div>
                </a>
            </div>
            <div class="feature-card">
                <a href="{{ route('reports') }}">
                    <div>
                        <h3>Predictive Analysis</h3>
                        <p>Advanced machine learning models predict future defects, enabling proactive maintenance.</p>
                    </div>
                </a>
            </div>

            <div class="feature-card">
                <a href="{{ route('notification') }}">
                    <div>
                        <h3>Instant Alerts</h3>
                        <p>Immediate notifications of critical issues, ensuring timely repairs and safety compliance.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- <footer>
        <p>&copy; 2024 AI Rail Track Safety</p>
    </footer> -->
</body>
</html>
