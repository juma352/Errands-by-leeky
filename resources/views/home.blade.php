<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Errands Management System</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --text-light: #fff;
            --text-dark: #333;
            --overlay-color: rgba(0, 0, 0, 0.6);
        }

        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .hero-section {
            min-height: 100vh;
            background: url('{{ asset('Images/samsung-memory-pz67hBsfbJ4-unsplash.jpg') }}') no-repeat center center/cover; 
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--overlay-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            color: var(--text-light);
            text-align: center;
            position: relative;
            z-index: 1; 
        }

        .main-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .subtitle {
            font-size: 1.25rem;
            margin-bottom: 3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .service-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: var(--text-dark);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .service-card h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .service-card p {
            margin-bottom: 1rem;
        }

        .service-card ul {
            list-style-type: none;
            padding-left: 0;
            text-align: left; 
        }

        .service-card li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem; 
        }

        .service-card li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-color);
        }

        .cta-button {
            display: inline-block;
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        /* Example Media Query for smaller screens */
        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr; /* Single column layout on smaller screens */
            }
            .main-title {
                font-size: 2rem; 
            }
        }
    </style>
</head>
<body>
    <div class="hero-section" aria-label="Hero section with an image of errands"> 
        <div class="container">
            <h1 class="main-title">Simplify Your Tasks with Our Errands Management System</h1>
            <p class="subtitle">Organize, prioritize, and track your errands efficiently. Never forget a task again!</p>

            <div class="services-grid">
                <div class="service-card">
                    <h2>Basic Errands</h2>
                    <p>Take the hassle out of your everyday tasks. We'll handle the essentials, so you can focus on what matters most.</p>
                    <ul>
                        <li>Grocery shopping</li>
                        <li>Dry cleaning pickup/drop-off</li>
                        <li>Post office runs</li>
                        <li>Prescription refills</li>
                        <li>And more!</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h2>Specialized Errands</h2>
                    <p>Got a unique request? We've got you covered. Our specialized services cater to your specific needs</p>
                    <ul>
                        <li>Waiting in line for tickets or events</li>
                        <li>Home organization and decluttering</li>
                        <li>Pet care and dog walking</li>
                        <li>Gift shopping and delivery</li> 
                        <li>And much more!</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h2>Concierge Services</h2>
                    <p>Experience the ultimate convenience with our personalized concierge services. We'll take care of everything on your to-do list.</p>
                    <ul>
                        <li>Travel arrangements and bookings</li>
                        <li>Restaurant reservations</li>
                        <li>Personal shopping</li>
                        <li>Event planning assistance</li>
                        <li>And any other tasks you need help with!</li>
                    </ul>
                </div>
            </div>

            <div class="container">
            </div>
            <a href="{{ route('auth.create') }}" class="cta-button">Get Started</a>
            <a href="tel:+254723708814" class="cta-button">
                <i class="fas fa-phone"></i> Call Us 
            </a>
        </div>
        </div>
    </div>
</body>
</html>