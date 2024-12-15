<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/aboutusstyle.css') }}">

</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <a href="#" class="logo">
            <img src="{{ asset('image/delhi_metro_logo.png') }}" alt="Company Logo" class="brand-logo" style="width: 150px; height: auto;" />
        </a>
        <nav class="nav">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('notification') }}">Notifications</a>
            <a href="{{ route('reports') }}">Reports</a>
            <a href="{{ route('aboutus') }}" class="active">About Us</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="about-container">
        <!-- Mission Statement Section -->
        <section class="mission-section">
            <h2>Our Mission</h2>
            <p>
                We, Wired_Wizard, are committed to enhancing the safety and efficiency of public transportation
                through innovative technologies, rigorous standards, and a passionate team dedicated to ensuring
                a safe and seamless commuting experience.
            </p>
        </section>

        <!-- Team Section -->
        <section class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-image-container">
                <img src="{{ asset('/image/team_photo.png') }}" alt="Team Image" class="team-image">
            </div>
            <ul class="team-list">
                <li class="team-member"><span class="team-name">Ayush Shah</span></li>
                <li class="team-member"><span class="team-name">Hiya Shah</span></li>
                <li class="team-member"><span class="team-name">Husain Daginawala</span></li>
                <li class="team-member"><span class="team-name">Siddhi Lad</span></li>
                <li class="team-member"><span class="team-name">Rushi Bhansali</span></li>
                <li class="team-member"><span class="team-name">Krushna Sonawane</span></li>
            </ul>
        </section>

        <!-- Certifications Section -->
        {{-- <section class="certifications-section">
            <h2>Certifications & Affiliations</h2>
            <p>We hold certifications and partnerships with several renowned organizations to ensure we adhere to the highest standards in the industry:</p>
            <ul>
                <li>ISO 9001: Quality Management System</li>
                <li>ISO 14001: Environmental Management</li>
                <li>Partnership with Indian Railways</li>
                <li>Member of International Transport Safety Association</li>
            </ul>
        </section> --}}

        <!-- Contact Section -->
        <section class="contact-section">
            <h2>Contact Us</h2>
            <p>If you have any inquiries, feel free to reach out to us:</p>
            <ul>
                <li><strong>Address:</strong> SVKM's Dwarkadas J. Sanghvi College Of Engineering , [Address]</li>
                <li><strong>Email:</strong> <a href="mailto:contact@delhimetro.com">contact@Wired_Wizard.com</a></li>
                <li><strong>Phone:</strong> +91 123 456 7890</li>
            </ul>
        </section>
    </main>
</body>
</html>
