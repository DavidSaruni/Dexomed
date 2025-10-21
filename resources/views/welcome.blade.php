<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dexomed Biologicals Group - Medical Equipment Services & Solutions</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dexomed: {
                            50: '#7a7a7aff',
                            100: '#1b1b1bff',
                            500: '#e8a00f',
                            600: '#e8a00f',
                            700: '#e8a00f',
                            800: '#2a2a2a',
                            900: '#1a1a1a',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.7s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --brand: #e8a00f;
            --brand-dark: #3b3b3b;
            --accent: #f6911e;
        }

        html, body {
            font-family: "Instrument Sans", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            scroll-behavior: smooth;
            background-color: #f8f8f8;
        }

        .page-container { 
            max-width: 1280px; 
            margin-left: auto; 
            margin-right: auto; 
        }

        /* Navigation */
        .nav-link {
            position: relative;
            padding: 6px 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            height: 2px;
            width: 0%;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -3px;
            background: var(--brand);
            transition: width .3s ease;
            border-radius: 2px;
        }
        .nav-link:hover::after { 
            width: 80%; 
            left: 10%; 
            transform: none; 
        }
        .nav-link.active {
            color: var(--brand);
        }
        .nav-link.active::after {
            width: 80%;
            left: 10%;
            transform: none;
        }

        /* Hero Carousel */
        .carousel-container {
            position: relative;
            height: 600px;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        .carousel-slide.active {
            opacity: 1;
        }
        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(59, 59, 59, 0.28) 0%, rgba(59, 59, 59, 0.15) 50%, rgba(59, 59, 59, 0.5) 100%);
            display: flex;
            align-items: center;
            padding: 0 5%;
        }
        .carousel-content {
            max-width: 600px;
            color: white;
            animation: slideUp 1s ease-out;
        }
        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
        }
        .carousel-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .carousel-indicator.active {
            background: white;
            transform: scale(1.2);
        }
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }
        .carousel-nav:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        .carousel-prev {
            left: 20px;
        }
        .carousel-next {
            right: 20px;
        }

        .service-card {
            background-color:rgba(0, 0, 0, 0.1) ;
            transition: all 0.3s ease;
            border-top: 4px solid transparent;
        }
        .service-card:hover {
            transform: translateY(-10px);
            border-top-color: var(--brand);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .value-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--brand);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        .value-card:hover::before {
            transform: scaleX(1);
        }
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
        .team-card {
            transition: all 0.3s ease;
        }
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .team-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .team-card:hover .team-avatar {
            border-color: var(--brand);
        }
        .partner-logo {
            max-height: 80px;
            
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }

        /* Stats Counter */
        .stat-item {
            transition: all 0.3s ease;
        }
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }
        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        /* Fixed Dark/Light Mode Toggle */
        .fixed-theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 8px 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .dark .fixed-theme-toggle {
            background: rgba(0, 0, 0, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        .fixed-theme-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }
        .fixed-theme-toggle-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #4a5568;
            transition: color 0.3s ease;
        }
        .dark .fixed-theme-toggle-label {
            color: #e2e8f0;
        }
        .fixed-theme-toggle-switch {
            position: relative;
            width: 50px;
            height: 26px;
            background: #e2e8f0;
            border-radius: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #cbd5e0;
        }
        .dark .fixed-theme-toggle-switch {
            background: #4a5568;
            border-color: #2d3748;
        }
        .fixed-theme-toggle-switch::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dark .fixed-theme-toggle-switch::before {
            left: calc(100% - 19px);
            background: #f7fafc;
        }
        .fixed-theme-toggle-icon {
            position: absolute;
            font-size: 8px;
            transition: all 0.3s ease;
            top: 50%;
            transform: translateY(-50%);
        }
        .fixed-theme-toggle-icon.sun {
            left: 8px;
            color: #f6ad55;
        }
        .fixed-theme-toggle-icon.moon {
            right: 8px;
            color: #4a5568;
        }
        .dark .fixed-theme-toggle-icon.sun {
            opacity: 0;
        }
        .dark .fixed-theme-toggle-icon.moon {
            opacity: 1;
            color: #f7fafc;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 800px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateY(20px);
            transition: transform 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .dark .modal-content {
            background: #1a1a1a;
            color: white;
        }
        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }
        .modal-header {
            padding: 20px 30px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: between;
            align-items: center;
        }
        .dark .modal-header {
            border-bottom: 1px solid #374151;
        }
        .modal-body {
            padding: 30px;
        }
        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.3s ease;
        }
        .modal-close:hover {
            color: #ef4444;
        }

        /* Enhanced About Section Styles */
        .about-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .about-card-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background: rgba(232, 160, 15, 0.1);
            color: var(--brand);
            font-size: 28px;
        }
        .about-card-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .about-card-button {
            margin-top: auto;
            padding-top: 20px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .carousel-container {
                height: 500px;
            }
            .carousel-overlay {
                background: linear-gradient(to bottom, rgba(59, 59, 59, 0.32) 0%, rgba(59, 59, 59, 0.3) 50%, rgba(59, 59, 59, 0.3) 100%);
                align-items: flex-end;
                padding-bottom: 60px;
            }
            .carousel-content {
                text-align: center;
            }
            .carousel-nav {
                width: 40px;
                height: 40px;
            }
            .fixed-theme-toggle {
                bottom: 20px;
                left: 20px;
                padding: 6px 12px;
            }
            .fixed-theme-toggle-label {
                font-size: 0.7rem;
            }
            .modal-content {
                width: 95%;
            }
        }

        /* Loading Animation */
        .loading-bar {
            height: 4px;
            width: 100%;
            background: rgba(255, 255, 255, 0.3);
            position: absolute;
            bottom: 0;
            left: 0;
        }
        .loading-progress {
            height: 100%;
            width: 0%;
            background: white;
            transition: width 5s linear;
        }
        .carousel-slide.active .loading-progress {
            width: 100%;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 text-gray-800 dark:bg-dexomed-900 dark:text-gray-100 transition-colors duration-300">
    <div class="min-h-screen flex flex-col">
        <div class="bg-dexomed-700 text-white py-4 text-sm">
            <div class="page-container px-6 flex flex-col md:flex-row justify-between items-center">
                
                <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-2 md:mb-0">
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-dexomed-300"></i>
                        <span>info@dexomedbiologicals.com</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-dexomed-300"></i>
                        <span>info@dexomed.co.ke</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt mr-2 text-dexomed-300"></i>
                        <span>+254 705953914</span>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Main Header with Navigation -->
        <header class="bg-white dark:bg-dexomed-800 shadow-sm sticky top-0 z-50 transition-all duration-300">
            <div class="page-container px-4 py--4 flex items-center justify-between"> 
                <a href="{{ url('/') }}" class="flex items-center gap-3 group ml-4">
                    <div class="flex-shrink-0 relative">
                        <img src="{{ asset('Img/Logo-removebg-preview.png') }}" 
                             alt="Dexomed Biologicals Group" 
                             class="h-32 w-auto transition-all duration-300 group-hover:scale-105 rounded-md">
                    </div>
                </a>

                <div class="flex items-center gap-4">
                    <nav class="hidden md:flex items-center gap-4 text-sm">
                        <a class="nav-link active" href="#home">Home</a>
                        <a class="nav-link" href="#about">About</a>
                        <a class="nav-link" href="#services">Services</a>
                        <a class="nav-link" href="#supplies">Medicals</a>
                        <a class="nav-link" href="#systems">Systems Development</a>
                        <a class="nav-link" href="#contact">Contact</a>

                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="ml-4 px-4 py-2 rounded-md bg-dexomed-500 text-white text-sm hover:bg-dexomed-600 transition-colors">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="ml-4 px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 text-sm hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Get Started</a>
                            @endauth
                        @endif
                    </nav>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center gap-4">
                    <button id="mobileNavBtn" class="p-2 rounded-md border dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobileNav" class="hidden bg-white dark:bg-dexomed-800 border-t dark:border-gray-800 md:hidden">
                <div class="px-6 py-4 flex flex-col gap-3">
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#home">Home</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#about">About</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#vision">Vision & Mission</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#services">Services</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#calibration">Calibration</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#supplies">Medical Supplies</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#systems">Systems Development</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#contact">Contact</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm py-2 mt-2 text-center rounded-md bg-dexomed-500 text-white">Dashboard</a>
                        @else
                            <div class="flex gap-2 mt-2">
                                <a href="{{ route('login') }}" class="flex-1 text-sm py-2 text-center rounded-md border border-gray-300 dark:border-gray-700">Login</a>
                                <a href="{{ route('register') }}" class="flex-1 text-sm py-2 text-center rounded-md bg-dexomed-500 text-white">Register</a>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <main class="flex-1">
            <!-- Hero section -->
            <section id="home" class="relative">
                <div class="carousel-container">
                    <!-- Slide 1 -->
                    <div class="carousel-slide active" style="background-image: url('Img/The-Role-of-High-Quality-Medical.jpg')">
                        <div class="carousel-overlay">
                            <div class="carousel-content">
                                <h2 class="text-4xl md:text-5xl font-bold leading-tight">Comprehensive Medical Equipment Services</h2>
                                <p class="mt-4 text-lg opacity-90">
                                    Dexomed Biologicals Group specializes in service, maintenance, and calibration of medical and biological equipment to enhance healthcare delivery.
                                </p>
                                <div class="mt-6 flex flex-wrap gap-3">
                                    <a href="#services" class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">Our Services</a>
                                    <a href="#contact" class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="loading-bar">
                            <div class="loading-progress"></div>
                        </div>
                    </div>
                    
                    <!-- Slide 2 -->
                    <div class="carousel-slide" style="background-image: url('Img/66c239e5a8b687fd51bc8523_AdobeStock 338447101.jpg')">
                        <div class="carousel-overlay">
                            <div class="carousel-content">
                                <h2 class="text-4xl md:text-5xl font-bold leading-tight">Precision Calibration Services</h2>
                                <p class="mt-4 text-lg opacity-90">
                                    Our meticulous calibration services adhere to international standards, ensuring your medical equipment performs optimally and consistently.
                                </p>
                                <div class="mt-6 flex flex-wrap gap-3">
                                    <a href="#calibration" class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">Calibration Services</a>
                                    <a href="#supplies" class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">Medical Supplies</a>
                                </div>
                            </div>
                        </div>
                        <div class="loading-bar">
                            <div class="loading-progress"></div>
                        </div>
                    </div>
                    
                    <!-- Slide 3 -->
                    <div class="carousel-slide" style="background-image: url('Img/comprehensive-medical-equipment-arrangement-precision-hygiene-clinical-setting-enhanced-healthcare-essential-medical-355575535.webp')">
                        <div class="carousel-overlay">
                            <div class="carousel-content">
                                <h2 class="text-4xl md:text-5xl font-bold leading-tight">Quality Medical Equipment & Supplies</h2>
                                <p class="mt-4 text-lg opacity-90">
                                    We offer a wide range of medical equipment, laboratory instruments, and consumables from reputable manufacturers.
                                </p>
                                <div class="mt-6 flex flex-wrap gap-3">
                                    <a href="#supplies" class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">Our Products</a>
                                    <a href="#contact" class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">Request Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="loading-bar">
                            <div class="loading-progress"></div>
                        </div>
                    </div>
                    
                    <!-- Carousel Navigation -->
                    <div class="carousel-nav carousel-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <div class="carousel-nav carousel-next">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        <div class="carousel-indicator active" data-slide="0"></div>
                        <div class="carousel-indicator" data-slide="1"></div>
                        <div class="carousel-indicator" data-slide="2"></div>
                    </div>
                </div>
                
                <!-- Quick Stats -->
                <div class="page-container px-6 -mt-10 relative z-10">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up">
                            <div class="text-3xl font-bold text-dexomed-500 counter" data-target="100">0</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Equipment Types Serviced</div>
                        </div>
                        <div class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up" style="animation-delay: 0.1s">
                            <div class="text-3xl font-bold text-dexomed-500 counter" data-target="500">0</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Clients Served</div>
                        </div>
                        <div class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up" style="animation-delay: 0.2s">
                            <div class="text-3xl font-bold text-dexomed-500 counter" data-target="24">0</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">/7 Emergency Support</div>
                        </div>
                        <div class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up" style="animation-delay: 0.3s">
                            <div class="text-3xl font-bold text-dexomed-500 counter" data-target="50">0</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Medical Equipment Brands</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ENHANCED ABOUT SECTION -->
            <section id="about" class="py-20 bg-gray-100 dark:bg-dexomed-900 fade-in">
                <div class="page-container px-6">
                    <div class="text-center mb-16">
                        <h3 class="text-3xl md:text-4xl font-bold">About Dexomed Biologicals Group</h3>
                        <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                            Learn more about our company, our mission, and the values that drive us to deliver exceptional service.
                        </p>
                    </div>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Company Overview Card -->
                        <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="about-card-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="about-card-content">
                                <h4 class="text-xl font-bold mb-4">Company Overview</h4>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    <strong>Dexomed Biologicals Group Ltd.</strong> is a registered limited company based in Kenya, specializing in comprehensive service, maintenance, and calibration of medical and biological equipment.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Established with a clear vision to enhance the operational efficiency and accuracy of critical healthcare equipment, our company plays a crucial role in supporting the healthcare infrastructure.
                                </p>
                            </div>
                            <div class="about-card-button">
                                <button class="learn-more-btn w-full px-4 py-2 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors" data-modal="company-overview">
                                    Learn More
                                </button>
                            </div>
                        </div>
                        
                        <!-- Our Mission Card -->
                        <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="about-card-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="about-card-content">
                                <h4 class="text-xl font-bold mb-4">Our Mission</h4>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    Dexomed Biologicals Group Ltd. is committed to delivering superior service, maintenance, and calibration of medical and biological equipment, thereby contributing to the delivery of quality healthcare services.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Our mission is to provide expert technical services that ensure the reliability and precision of medical devices.
                                </p>
                            </div>
                            <div class="about-card-button">
                                <button class="learn-more-btn w-full px-4 py-2 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors" data-modal="our-mission">
                                    Learn More
                                </button>
                            </div>
                        </div>
                        
                        <!-- Our Vision Card -->
                        <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="about-card-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="about-card-content">
                                <h4 class="text-xl font-bold mb-4">Our Vision</h4>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    To lead East Africa in specialized biomedical equipment services, renowned for our dedication to excellence, reliability, and customer satisfaction.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    We aim to be the preferred partner for healthcare institutions seeking reliable equipment maintenance and calibration services.
                                </p>
                            </div>
                            <div class="about-card-button">
                                <button class="learn-more-btn w-full px-4 py-2 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors" data-modal="our-vision">
                                    Learn More
                                </button>
                            </div>
                        </div>
                        
                        <!-- Our Values Card -->
                        <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="about-card-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="about-card-content">
                                <h4 class="text-xl font-bold mb-4">Our Values</h4>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    We are guided by a set of core values that define our approach to business and customer service:
                                </p>
                                <ul class="text-gray-600 dark:text-gray-300 text-sm space-y-2">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                        <span>Integrity and transparency</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                        <span>Professionalism and expertise</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                        <span>Innovation and continuous improvement</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-card-button">
                                <button class="learn-more-btn w-full px-4 py-2 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors" data-modal="our-values">
                                    Learn More
                                </button>
                            </div>
                        </div>
                        
                        <!-- Our Team Card -->
                        <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="about-card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="about-card-content">
                                <h4 class="text-xl font-bold mb-4">Our Team</h4>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    Our team comprises highly skilled and experienced technicians and engineers who are dedicated to maintaining the highest standards in biomedical equipment servicing.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    We invest in continuous training and development to ensure our team stays current with the latest technologies and industry best practices.
                                </p>
                            </div>
                            <div class="about-card-button">
                                <button class="learn-more-btn w-full px-4 py-2 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors" data-modal="our-team">
                                    Learn More
                                </button>
                            </div>
                        </div>
                        
                        <!-- Our Clients Card -->
                        <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="about-card-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="about-card-content">
                                <h4 class="text-xl font-bold mb-4">Our Clients</h4>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    We cater to a wide array of clients, including hospitals, clinics, laboratories, and research institutions, ensuring that their equipment operates flawlessly and meets stringent regulatory requirements.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Our client-centric approach ensures we understand and address the unique needs of each healthcare facility we serve.
                                </p>
                            </div>
                            <div class="about-card-button">
                                <button class="learn-more-btn w-full px-4 py-2 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors" data-modal="our-clients">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- VISION & MISSION -->
            <section id="vision" class="py-20 bg-white dark:bg-dexomed-800">
                <div class="page-container px-6 grid md:grid-cols-2 gap-8">
                    <div class="bg-gradient-to-br from-dexomed-50 to-white dark:from-dexomed-900 dark:to-dexomed-800 rounded-xl p-8 shadow-lg slide-up">
                        <div class="w-14 h-14 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold mb-4">Our Vision</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                            To lead East Africa in specialized biomedical equipment services, renowned for our dedication to excellence, reliability, and customer satisfaction.
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-dexomed-50 to-white dark:from-dexomed-900 dark:to-dexomed-800 rounded-xl p-8 shadow-lg slide-up" style="animation-delay: 0.2s">
                        <div class="w-14 h-14 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold mb-4">Our Mission</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                            Dexomed Biologicals Group Ltd. is committed to delivering superior service, maintenance, and calibration of medical and biological equipment, thereby contributing to the delivery of quality healthcare services.
                        </p>
                    </div>
                </div>

                <!-- Objectives and Values -->
                <div class="page-container px-6 mt-16">
                    <div class="grid md:grid-cols-2 gap-12">
                        <div>
                            <h4 class="text-2xl font-bold mb-6 text-center">Our Objectives</h4>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                        <span class="text-dexomed-500 font-bold">1</span>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300">Exceed customer expectations with top-notch technical services.</p>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                        <span class="text-dexomed-500 font-bold">2</span>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300">Foster enduring partnerships by promptly addressing client needs.</p>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                        <span class="text-dexomed-500 font-bold">3</span>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300">Uphold proficiency through continuous learning and development.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-2xl font-bold mb-6 text-center">Our Values</h4>
                            <div class="space-y-4">
                                <div>
                                    <h5 class="font-bold text-dexomed-500">Integrity</h5>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm mt-1">Conduct all operations with honesty, transparency, and ethical integrity.</p>
                                </div>
                                <div>
                                    <h5 class="font-bold text-dexomed-500">Professionalism</h5>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm mt-1">Demonstrate expertise, reliability, and commitment in every service.</p>
                                </div>
                                <div>
                                    <h5 class="font-bold text-dexomed-500">Innovation</h5>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm mt-1">Embrace technological advancements to enhance service efficiency.</p>
                                </div>
                                <div>
                                    <h5 class="font-bold text-dexomed-500">Customer Focus</h5>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm mt-1">Prioritize client requirements and consistently surpass expectations.</p>
                                </div>
                                <div>
                                    <h5 class="font-bold text-dexomed-500">Teamwork</h5>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm mt-1">Cultivate a collaborative environment valuing each team member's contributions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SERVICES -->
            <section id="services" class="py-20 bg-gray-100 dark:bg-dexomed-900">
                <div class="page-container px-6">
                    <h3 class="text-3xl md:text-4xl font-bold text-center">Service & Maintenance</h3>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 text-center max-w-2xl mx-auto">
                        We offer comprehensive service and maintenance solutions tailored to meet the specific needs of various medical and biological equipment.
                    </p>
                    
                    <div class="mt-12 grid md:grid-cols-2 gap-8">
                        <div class="bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Our Service Process</h4>
                            <div class="space-y-6">
                                <div>
                                    <h5 class="font-bold text-dexomed-500 mb-2">Initial Assessment</h5>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Our certified technicians begin with a thorough initial assessment of each piece of equipment. This includes reviewing the equipment's service history, usage patterns, and current operational status.
                                    </p>
                                </div>
                                <div>
                                    <h5 class="font-bold text-dexomed-500 mb-2">Customized Maintenance Plans</h5>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        We develop customized maintenance plans tailored to the specific needs of each equipment type and client requirements. These plans include regular inspections, preventive maintenance, and timely repairs.
                                    </p>
                                </div>
                                <div>
                                    <h5 class="font-bold text-dexomed-500 mb-2">Preventive Maintenance</h5>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Our preventive maintenance services are designed to identify and address potential issues before they escalate into major problems. This proactive approach helps in extending the lifespan of equipment and minimizing downtime.
                                    </p>
                                </div>
                                <div>
                                    <h5 class="font-bold text-dexomed-500 mb-2">Corrective Maintenance</h5>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        In the event of equipment malfunction, our team provides prompt and effective corrective maintenance. We diagnose the root cause of the problem and implement reliable solutions to restore equipment functionality.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Equipment Categories We Service</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Patient Monitors</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Ventilators</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Defibrillators</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Infusion Pumps</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Anesthesia Machines</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">ECG Machines</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Ultrasound Machines</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">X-ray Machines</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Laboratory Analyzers</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Centrifuges</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Incubators</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">Autoclaves</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CALIBRATION -->
            <section id="calibration" class="py-20 bg-white dark:bg-dexomed-800">
                <div class="page-container px-6">
                    <h3 class="text-3xl md:text-4xl font-bold text-center">Calibration Services</h3>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 text-center max-w-2xl mx-auto">
                        Our calibration services ensure that medical equipment performs accurately and consistently, meeting all regulatory standards.
                    </p>
                    
                    <div class="mt-12 grid md:grid-cols-2 gap-8">
                        <div class="bg-gradient-to-br from-dexomed-50 to-white dark:from-dexomed-900 dark:to-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Our Calibration Process</h4>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                        <span class="text-dexomed-500 font-bold">1</span>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-dexomed-500">Initial Verification</h5>
                                        <p class="text-gray-600 dark:text-gray-300 mt-1">We begin with a comprehensive verification of the equipment's current performance against manufacturer specifications.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                        <span class="text-dexomed-500 font-bold">2</span>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-dexomed-500">Precision Adjustment</h5>
                                        <p class="text-gray-600 dark:text-gray-300 mt-1">Our technicians make precise adjustments to align the equipment with established standards using certified reference instruments.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                        <span class="text-dexomed-500 font-bold">3</span>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-dexomed-500">Documentation & Certification</h5>
                                        <p class="text-gray-600 dark:text-gray-300 mt-1">We provide detailed calibration certificates documenting the process, results, and compliance with relevant standards.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-dexomed-50 to-white dark:from-dexomed-900 dark:to-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Calibration Standards</h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Our calibration services adhere to international standards and manufacturer specifications, ensuring:
                            </p>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Accuracy and reliability of diagnostic results</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Compliance with regulatory requirements</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Optimal equipment performance and longevity</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Patient safety through precise measurements</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- MEDICAL SUPPLIES -->
            <section id="supplies" class="py-20 bg-gray-100 dark:bg-dexomed-900">
                <div class="page-container px-6">
                    <h3 class="text-3xl md:text-4xl font-bold text-center">Medical Equipment & Supplies</h3>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 text-center max-w-2xl mx-auto">
                        We offer a comprehensive range of medical equipment, laboratory instruments, and consumables from reputable manufacturers.
                    </p>
                    
                    <div class="mt-12 grid md:grid-cols-3 gap-8">
                        <div class="service-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="w-16 h-16 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold mb-4">Medical Equipment</h4>
                            <p class="text-gray-600 dark:text-gray-300">
                                We supply a wide range of medical equipment including patient monitors, ventilators, defibrillators, infusion pumps, anesthesia machines, and diagnostic imaging equipment.
                            </p>
                            <a href="#contact" class="inline-block mt-4 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request Quote →</a>
                        </div>
                        <div class="service-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="w-16 h-16 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold mb-4">Laboratory Instruments</h4>
                            <p class="text-gray-600 dark:text-gray-300">
                                Our laboratory equipment portfolio includes centrifuges, incubators, autoclaves, microscopes, spectrophotometers, and various analyzers for clinical and research applications.
                            </p>
                            <a href="#contact" class="inline-block mt-4 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request Quote →</a>
                        </div>
                        <div class="service-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <div class="w-16 h-16 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold mb-4">Consumables & Supplies</h4>
                            <p class="text-gray-600 dark:text-gray-300">
                                We provide a comprehensive range of medical consumables, laboratory reagents, disposables, and other supplies essential for healthcare operations and research activities.
                            </p>
                            <a href="#contact" class="inline-block mt-4 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request Quote →</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SYSTEMS DEVELOPMENT -->
            <section id="systems" class="py-20 bg-white dark:bg-dexomed-800">
                <div class="page-container px-6">
                    <h3 class="text-3xl md:text-4xl font-bold text-center">Laboratory Construction & Systems Development</h3>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 text-center max-w-2xl mx-auto">
                        We offer specialized services in laboratory construction and the development of integrated systems for healthcare facilities.
                    </p>
                    
                    <div class="mt-12 grid md:grid-cols-2 gap-8">
                        <div class="bg-gradient-to-br from-dexomed-50 to-white dark:from-dexomed-900 dark:to-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Laboratory Construction</h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Our laboratory construction services include:
                            </p>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Design and planning of laboratory spaces</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Installation of specialized laboratory equipment</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Integration of safety systems and ventilation</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Compliance with regulatory standards and guidelines</span>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-gradient-to-br from-dexomed-50 to-white dark:from-dexomed-900 dark:to-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Systems Development</h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Our systems development services focus on:
                            </p>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Development of integrated laboratory information systems</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Implementation of quality management systems</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Customized workflow optimization solutions</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Training and support for system implementation</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CONTACT -->
            <section id="contact" class="py-20 bg-dexomed-50 dark:bg-dexomed-900">
                <div class="page-container px-6 max-w-4xl mx-auto">
                    <h3 class="text-3xl md:text-4xl font-bold text-center">Get in Touch</h3>
                    <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 text-center">
                        Have questions or want to discuss your equipment service needs? Contact our team for service inquiries, equipment quotes, or technical support.
                    </p>

                    <div class="mt-12 grid md:grid-cols-2 gap-8">
                        <div class="bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Contact Information</h4>
                            
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="w-10 h-10 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Address</p>
                                        <p class="text-gray-600 dark:text-gray-300 mt-1">Nairobi, Kenya</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Suite 12, LabPark Towers</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="w-10 h-10 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Phone</p>
                                        <p class="text-gray-600 dark:text-gray-300 mt-1">+254 705953914</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="w-10 h-10 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dexomed-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Email</p>
                                        <p class="text-gray-600 dark:text-gray-300 mt-1">info@dexomedbiologicals.com</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">We'll respond within 24 hours</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-8 pt-6 border-t dark:border-gray-700">
                                <h5 class="font-medium mb-4">Follow Us</h5>
                                <div class="flex space-x-4">
                                    <a href="#" class="text-gray-400 hover:text-dexomed-500 transition-colors">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-dexomed-500 transition-colors">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-dexomed-500 transition-colors">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-dexomed-500 transition-colors">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                            <h4 class="text-xl font-bold mb-6">Send us a Message</h4>
                            <form class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Your Name</label>
                                    <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-dexomed-500 focus:border-dexomed-500 dark:bg-dexomed-700">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email Address</label>
                                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-dexomed-500 focus:border-dexomed-500 dark:bg-dexomed-700">
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                                    <input type="text" id="subject" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-dexomed-500 focus:border-dexomed-500 dark:bg-dexomed-700">
                                </div>
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                                    <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-dexomed-500 focus:border-dexomed-500 dark:bg-dexomed-700"></textarea>
                                </div>
                                <button type="submit" class="w-full px-4 py-2 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- FOOTER -->
        <footer class="bg-dexomed-800 text-white">
            <div class="page-container px-6 py-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <h5 class="text-lg font-bold mb-4">Dexomed Biologicals Group</h5>
                        <p class="text-gray-300 text-sm">
                            Specializing in service, maintenance, and calibration of medical and biological equipment to enhance healthcare delivery in East Africa.
                        </p>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-4">Quick Links</h5>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="#home" class="hover:text-white transition-colors">Home</a></li>
                            <li><a href="#about" class="hover:text-white transition-colors">About</a></li>
                            <li><a href="#services" class="hover:text-white transition-colors">Services</a></li>
                            <li><a href="#calibration" class="hover:text-white transition-colors">Calibration</a></li>
                            <li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-4">Services</h5>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="#services" class="hover:text-white transition-colors">Equipment Service & Maintenance</a></li>
                            <li><a href="#calibration" class="hover:text-white transition-colors">Calibration Services</a></li>
                            <li><a href="#supplies" class="hover:text-white transition-colors">Medical Equipment & Supplies</a></li>
                            <li><a href="#systems" class="hover:text-white transition-colors">Laboratory Construction</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-4">Contact Info</h5>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li>Nairobi, Kenya</li>
                            <li>+254 705953914</li>
                            <li>info@dexomedbiologicals.com</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t border-dexomed-700 text-center text-sm text-gray-300">
                    <p>&copy; {{ date('Y') }} Dexomed Biologicals Group Ltd. — All rights reserved.</p>
                    <p class="mt-2">Registered Limited Company in Kenya</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Fixed Dark/Light Mode Toggle -->
    <div id="fixedThemeToggle" class="fixed-theme-toggle">
        <div class="fixed-theme-toggle-switch">
            <i class="fas fa-sun fixed-theme-toggle-icon sun"></i>
            <i class="fas fa-moon fixed-theme-toggle-icon moon"></i>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modalOverlay" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle" class="text-xl font-bold">Modal Title</h3>
                <button id="modalClose" class="modal-close">&times;</button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Modal content will be inserted here -->
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Mobile Navigation Toggle
        const mobileNavBtn = document.getElementById('mobileNavBtn');
        const mobileNav = document.getElementById('mobileNav');
        if (mobileNavBtn) {
            mobileNavBtn.addEventListener('click', () => {
                mobileNav.classList.toggle('hidden');
            });
        }

        // Dark/Light Mode Toggle
        const fixedThemeToggle = document.getElementById('fixedThemeToggle');
        const htmlElement = document.documentElement;

        // Function to toggle theme
        function toggleTheme() {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Initialize theme from localStorage or system preference
        function initTheme() {
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                htmlElement.classList.add('dark');
            } else {
                htmlElement.classList.remove('dark');
            }
        }

        // Add event listener to fixed theme toggle
        if (fixedThemeToggle) {
            fixedThemeToggle.addEventListener('click', toggleTheme);
        }

        // Carousel Functionality
        const carouselSlides = document.querySelectorAll('.carousel-slide');
        const carouselIndicators = document.querySelectorAll('.carousel-indicator');
        const carouselPrev = document.querySelector('.carousel-prev');
        const carouselNext = document.querySelector('.carousel-next');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            // Reset all slides and indicators
            carouselSlides.forEach(slide => slide.classList.remove('active'));
            carouselIndicators.forEach(indicator => indicator.classList.remove('active'));
            
            // Show the selected slide and indicator
            carouselSlides[index].classList.add('active');
            carouselIndicators[index].classList.add('active');
            currentSlide = index;
            
            // Reset the loading animation
            const loadingBars = document.querySelectorAll('.loading-progress');
            loadingBars.forEach(bar => {
                bar.style.width = '0%';
                void bar.offsetWidth; // Trigger reflow
                if (bar.parentElement.parentElement.classList.contains('active')) {
                    bar.style.width = '100%';
                }
            });
        }

        function nextSlide() {
            let next = currentSlide + 1;
            if (next >= carouselSlides.length) next = 0;
            showSlide(next);
        }

        function prevSlide() {
            let prev = currentSlide - 1;
            if (prev < 0) prev = carouselSlides.length - 1;
            showSlide(prev);
        }

        // Initialize carousel
        function initCarousel() {
            // Set up automatic sliding
            slideInterval = setInterval(nextSlide, 5000);
            
            // Add event listeners to navigation buttons
            if (carouselPrev) carouselPrev.addEventListener('click', prevSlide);
            if (carouselNext) carouselNext.addEventListener('click', nextSlide);
            
            // Add event listeners to indicators
            carouselIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    clearInterval(slideInterval);
                    showSlide(index);
                    slideInterval = setInterval(nextSlide, 5000);
                });
            });
            
            // Pause carousel on hover
            const carouselContainer = document.querySelector('.carousel-container');
            if (carouselContainer) {
                carouselContainer.addEventListener('mouseenter', () => {
                    clearInterval(slideInterval);
                });
                carouselContainer.addEventListener('mouseleave', () => {
                    slideInterval = setInterval(nextSlide, 5000);
                });
            }
        }

        // Animated Counter for Stats
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start);
                }
            }, 16);
        }

        // Initialize counters when they come into view
        function initCounters() {
            const counters = document.querySelectorAll('.counter');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseInt(entry.target.getAttribute('data-target'));
                        animateCounter(entry.target, target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => {
                observer.observe(counter);
            });
        }

        // Active Navigation Link on Scroll
        function setActiveNavLink() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let currentSection = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${currentSection}`) {
                    link.classList.add('active');
                }
            });
        }

        // Modal Functionality
        const modalOverlay = document.getElementById('modalOverlay');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        const modalClose = document.getElementById('modalClose');
        const learnMoreButtons = document.querySelectorAll('.learn-more-btn');

        // Modal content data
        const modalContent = {
            'company-overview': {
                title: 'Company Overview',
                content: `
                    <div class="space-y-4">
                        <p><strong>Dexomed Biologicals Group Ltd.</strong> is a registered limited company based in Kenya, specializing in the comprehensive service, maintenance, and calibration of a diverse range of medical and biological equipment.</p>
                        <p>Established with a clear vision to enhance the operational efficiency and accuracy of critical healthcare equipment, our company plays a crucial role in supporting the healthcare infrastructure.</p>
                        <p>At Dexomed Biologicals Group Ltd., we understand the vital importance of well-maintained and accurately calibrated medical equipment in delivering effective patient care. Our team comprises highly skilled and experienced technicians and engineers who are dedicated to maintaining the highest standards in biomedical equipment servicing.</p>
                        <p>We cater to a wide array of clients, including hospitals, clinics, laboratories, and research institutions, ensuring that their equipment operates flawlessly and meets stringent regulatory requirements.</p>
                        <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg mt-6">
                            <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Our Core Focus Areas:</h4>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Medical equipment service and maintenance</li>
                                <li>Precision calibration services</li>
                                <li>Supply of medical equipment and consumables</li>
                                <li>Laboratory construction and systems development</li>
                            </ul>
                        </div>
                    </div>
                `
            },
            'our-mission': {
                title: 'Our Mission',
                content: `
                    <div class="space-y-4">
                        <p>Dexomed Biologicals Group Ltd. is committed to delivering superior service, maintenance, and calibration of medical and biological equipment, thereby contributing to the delivery of quality healthcare services.</p>
                        <p>Our mission is to provide expert technical services that ensure the reliability and precision of medical devices, thereby contributing to the delivery of high-quality healthcare services.</p>
                        <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg mt-6">
                            <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Key Mission Objectives:</h4>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Ensure operational excellence in all service delivery</li>
                                <li>Maintain the highest standards of technical proficiency</li>
                                <li>Provide timely and responsive support to clients</li>
                                <li>Continuously improve our processes and services</li>
                                <li>Build lasting relationships based on trust and reliability</li>
                            </ul>
                        </div>
                    </div>
                `
            },
            'our-vision': {
                title: 'Our Vision',
                content: `
                    <div class="space-y-4">
                        <p>To lead East Africa in specialized biomedical equipment services, renowned for our dedication to excellence, reliability, and customer satisfaction.</p>
                        <p>We envision a future where healthcare facilities across East Africa can rely on our expertise to maintain their critical medical equipment at optimal performance levels, ensuring accurate diagnostics and effective patient care.</p>
                        <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg mt-6">
                            <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Visionary Goals:</h4>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Become the preferred biomedical service provider in East Africa</li>
                                <li>Expand our service coverage to reach more healthcare facilities</li>
                                <li>Invest in advanced training and technology</li>
                                <li>Establish strategic partnerships with equipment manufacturers</li>
                                <li>Contribute to healthcare improvement through reliable equipment maintenance</li>
                            </ul>
                        </div>
                    </div>
                `
            },
            'our-values': {
                title: 'Our Values',
                content: `
                    <div class="space-y-4">
                        <p>We are guided by a set of core values that define our approach to business and customer service:</p>
                        
                        <div class="grid md:grid-cols-2 gap-4 mt-6">
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Integrity</h4>
                                <p class="text-sm">Conduct all operations with honesty, transparency, and ethical integrity. We believe in doing the right thing, even when no one is watching.</p>
                            </div>
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Professionalism</h4>
                                <p class="text-sm">Demonstrate expertise, reliability, and commitment in every service. Our team maintains the highest standards of conduct and technical proficiency.</p>
                            </div>
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Innovation</h4>
                                <p class="text-sm">Embrace technological advancements to enhance service efficiency. We continuously seek better ways to serve our clients and improve our processes.</p>
                            </div>
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Customer Focus</h4>
                                <p class="text-sm">Prioritize client requirements and consistently surpass expectations. We listen to our clients and tailor our services to meet their specific needs.</p>
                            </div>
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg md:col-span-2">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Teamwork</h4>
                                <p class="text-sm">Cultivate a collaborative environment valuing each team member's contributions. We believe that together we can achieve more than any individual could alone.</p>
                            </div>
                        </div>
                    </div>
                `
            },
            'our-team': {
                title: 'Our Team',
                content: `
                    <div class="space-y-4">
                        <p>Our team comprises highly skilled and experienced technicians and engineers who are dedicated to maintaining the highest standards in biomedical equipment servicing.</p>
                        <p>We invest in continuous training and development to ensure our team stays current with the latest technologies and industry best practices.</p>
                        
                        <div class="grid md:grid-cols-2 gap-6 mt-6">
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Technical Expertise</h4>
                                <p class="text-sm">Our technicians are certified and experienced in servicing a wide range of medical equipment from various manufacturers.</p>
                            </div>
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Continuous Training</h4>
                                <p class="text-sm">We regularly update our skills through manufacturer training programs and industry workshops to stay ahead of technological advancements.</p>
                            </div>
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Quality Assurance</h4>
                                <p class="text-sm">Our quality control processes ensure that every service meets or exceeds manufacturer specifications and regulatory requirements.</p>
                            </div>
                            <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg">
                                <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Customer Service</h4>
                                <p class="text-sm">Our customer service team is trained to understand client needs and provide timely, effective solutions to equipment challenges.</p>
                            </div>
                        </div>
                    </div>
                `
            },
            'our-clients': {
                title: 'Our Clients',
                content: `
                    <div class="space-y-4">
                        <p>We cater to a wide array of clients, including hospitals, clinics, laboratories, and research institutions, ensuring that their equipment operates flawlessly and meets stringent regulatory requirements.</p>
                        <p>Our client-centric approach ensures we understand and address the unique needs of each healthcare facility we serve.</p>
                        
                        <div class="mt-6">
                            <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-3">Client Categories We Serve:</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="flex items-start">
                                    <i class="fas fa-hospital text-dexomed-500 mr-2 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium">Hospitals</h5>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Public and private hospitals of all sizes</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-clinic-medical text-dexomed-500 mr-2 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium">Clinics</h5>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Specialized medical clinics and health centers</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-flask text-dexomed-500 mr-2 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium">Laboratories</h5>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Clinical, research, and diagnostic laboratories</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-university text-dexomed-500 mr-2 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium">Research Institutions</h5>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Academic and commercial research facilities</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-dexomed-50 dark:bg-dexomed-800 p-4 rounded-lg mt-6">
                            <h4 class="font-bold text-dexomed-700 dark:text-dexomed-300 mb-2">Our Commitment to Clients:</h4>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Timely response to service requests</li>
                                <li>Transparent communication throughout the service process</li>
                                <li>Comprehensive documentation for all services rendered</li>
                                <li>Follow-up support to ensure client satisfaction</li>
                                <li>Customized service plans based on specific needs</li>
                            </ul>
                        </div>
                    </div>
                `
            }
        };

        // Function to open modal
        function openModal(modalId) {
            if (modalContent[modalId]) {
                modalTitle.textContent = modalContent[modalId].title;
                modalBody.innerHTML = modalContent[modalId].content;
                modalOverlay.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            }
        }

        // Function to close modal
        function closeModal() {
            modalOverlay.classList.remove('active');
            document.body.style.overflow = ''; // Restore scrolling
        }

        // Add event listeners to Learn More buttons
        learnMoreButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal');
                openModal(modalId);
            });
        });

        // Add event listener to close modal
        if (modalClose) {
            modalClose.addEventListener('click', closeModal);
        }

        // Close modal when clicking outside the content
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
                closeModal();
            }
        });

        // Responsive JavaScript enhancements
        function enhanceResponsiveness() {
            // Adjust carousel height based on viewport
            function adjustCarouselHeight() {
                const carousel = document.querySelector('.carousel-container');
                if (carousel && window.innerWidth < 768) {
                    carousel.style.height = '400px';
                } else if (carousel) {
                    carousel.style.height = '600px';
                }
            }

            // Adjust grid layouts for mobile
            function adjustGridLayouts() {
                const aboutCards = document.querySelectorAll('.about-card');
                if (aboutCards.length > 0 && window.innerWidth < 768) {
                    aboutCards.forEach(card => {
                        card.style.marginBottom = '20px';
                    });
                }
            }

            // Initialize responsive adjustments
            adjustCarouselHeight();
            adjustGridLayouts();

            // Add resize listener
            window.addEventListener('resize', () => {
                adjustCarouselHeight();
                adjustGridLayouts();
            });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            initCarousel();
            initCounters();
            enhanceResponsiveness();
            window.addEventListener('scroll', setActiveNavLink);
        });
    </script>
</body>
</html>