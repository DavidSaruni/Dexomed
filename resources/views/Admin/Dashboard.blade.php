
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dexomed Biologicals Group - Admin Dashboard</title>

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
                            50: '#181818ff',
                            100: '#1b1b1bff',
                            500: '#e8a00f',
                            600: '#e8a00f',
                            700: '#e8a00f',
                            800: '#1a1919ff',
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
            --brand-dark: #101010ff;
            --accent: #f6911e;
        }

        html, body {
            font-family: "Instrument Sans", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            scroll-behavior: smooth;
            background-color: #151515ff;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
            background-image: linear-gradient(rgba(9, 9, 9, 0.08), rgba(9, 9, 9, 0.15)), 
                              url('Img/wmremove-transformed.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 150px;
            background:  rgba(204, 204, 204, 0.22);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar.collapsed .sidebar-header {
            justify-content: center;
            padding: 20px 10px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar.collapsed .logo-text {
            display: none;
        }

        .sidebar.collapsed .toggle-btn i {
            transform: rotate(180deg);
        }

        .user-profile {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar.collapsed .user-profile {
            padding: 15px 5px;
        }

        .user-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e8a00f;
            margin: 0 auto 8px;
        }

        .sidebar.collapsed .user-avatar {
            width: 40px;
            height: 40px;
        }

        .sidebar.collapsed .user-info {
            display: none;
        }

        .status-indicator {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            text-color: #000;
            background: #10b981;
            margin-right: 5px;
        }

        .sidebar-menu {
            flex: 1;
            padding: 15px 0;
            overflow-y: auto;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: #000000ff;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-size: 14px;
            cursor: pointer;
        }

        .menu-item:hover, .menu-item.active {
            background: #f9fafb;
            color: #e8a00f;
            border-left-color: #e8a00f;
        }

        .menu-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar.collapsed .menu-item span {
            display: none;
        }

        .sidebar.collapsed .menu-item {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed .menu-item i {
            margin-right: 0;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .header {
            background:  rgba(204, 204, 204, 0.22);
            backdrop-filter: blur(10px);
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 50;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: #f9fafb;
            border-radius: 8px;
            padding: 8px 15px;
            width: 400px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            outline: none;
            width: 100%;
            padding: 0 10px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .action-btn {
            position: relative;
            background: #f9fafb;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #e8a00f;
            color: white;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .user-menu:hover {
            background: #f9fafb;
        }

        .user-avatar-small {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }


        .user-menu {
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
            gap: 6px;
        }

        .user-avatar-small {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e8a00f; 
        }

        /* Dropdown Container */
        #dropdownMenu {
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 8px;
            width: 190px;
            background-color: #9a9a9a95;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            overflow: hidden;
            z-index: 50;
        }

        /* Dropdown Links */
        #dropdownMenu a {
            display: block;
            padding: 10px 14px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s ease;
        }

        /* Hover effect */
        #dropdownMenu a:hover {
            background-color: #f5f5f5;
            color: #e8a00f; /* theme orange */
        }

        /* Logout Button (inside form) */
        #dropdownMenu form {
            margin: 0;
        }

        #dropdownMenu form a {
            color: #c0392b; /* red tone for logout */
        }

        #dropdownMenu form a:hover {
            background-color: #ffecec;
            color: #a93226;
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 25px;
            overflow-y: auto;
            background: transparent;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1f2937;
        }

        /* Dashboard Cards */
        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .card-action {
            color: #e8a00f;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 20px;
        }

        .stat-info {
            flex: 1;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
            gap: 20px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Activity Feed */
        .activity-item {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            background: #f3f4f6;
            color: #e8a00f;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: #9ca3af;
        }

        /* Equipment Health */
        .health-indicator {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .health-bar {
            flex: 1;
            height: 8px;
            background: #f3f4f6;
            border-radius: 4px;
            overflow: hidden;
            margin: 0 10px;
        }

        .health-progress {
            height: 100%;
            border-radius: 4px;
        }

        .health-label {
            font-size: 14px;
            font-weight: 500;
            width: 120px;
        }

        /* Tables */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            color: #6b7280;
            font-size: 14px;
        }

        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #f3f4f6;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-operational {
            background: #d1fae5;
            color: #065f46;
        }

        .status-maintenance {
            background: #fef3c7;
            color: #92400e;
        }

        .status-attention {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-pending {
            background: #e0e7ff;
            color: #3730a3;
        }

        .status-completed {
            background: #d1fae5;
            color: #065f46;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            outline: none;
        }

        .btn-primary {
            background: #e8a00f;
            color: white;
        }

        .btn-primary:hover {
            background: #d1910e;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #d1d5db;
            color: #4b5563;
        }

        .btn-outline:hover {
            background: #f9fafb;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 14px;
        }

        /* Enhanced Calendar Styles */
        .calendar-container {
            width: 100%;
        }

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 0 10px;
        }

        .calendar-nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .calendar-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            background: transparent;
            border: none;
        }

        .calendar-day {
            background: white;
            padding: 12px 8px;
            min-height: 100px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .calendar-day:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .calendar-day.header {
            background: #f8fafc;
            font-weight: 600;
            text-align: center;
            min-height: auto;
            padding: 12px 8px;
            box-shadow: none;
            font-size: 14px;
            color: #6b7280;
        }

        .calendar-day.header:hover {
            transform: none;
            box-shadow: none;
        }

        .calendar-day.other-month {
            color: #9ca3af;
            background: #f9fafb;
        }

        .calendar-day.today {
            background: #fff8e1;
            border: 2px solid #e8a00f;
        }

        .day-number {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .calendar-event {
            background: #e8a00f;
            color: white;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 11px;
            margin-top: 4px;
            cursor: pointer;
            line-height: 1.2;
        }

        .calendar-event.maintenance {
            background: #3b82f6;
        }

        .calendar-event.calibration {
            background: #10b981;
        }

        .calendar-event.urgent {
            background: #ef4444;
        }

        .event-count {
            position: absolute;
            top: 8px;
            right: 8px;
            background: #e8a00f;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Content Sections */
        .content-section {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .content-section.active {
            display: block;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.3s ease-out;
        }

        .dark .modal-content {
            background: #1f2937;
            color: #f9fafb;
        }

        .modal-header {
            padding: 20px 24px 0;
            display: flex;
            justify-content: between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 16px;
        }

        .dark .modal-header {
            border-bottom-color: #374151;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
        }

        .dark .modal-title {
            color: #f9fafb;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: #374151;
        }

        .dark .modal-close {
            color: #9ca3af;
        }

        .dark .modal-close:hover {
            color: #d1d5db;
        }

        .modal-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #374151;
        }

        .dark .form-label {
            color: #d1d5db;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .dark .form-input, .dark .form-select, .dark .form-textarea {
            background-color: #374151;
            border-color: #4b5563;
            color: #f9fafb;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #e8a00f;
            box-shadow: 0 0 0 3px rgba(232, 160, 15, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .modal-footer {
            padding: 0 24px 24px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                height: 100%;
                transform: translateX(-100%);
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 99;
                display: none;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            .mobile-menu-btn {
                display: flex;
            }
            
            .search-bar {
                width: 200px;
            }

            .grid-2 {
                grid-template-columns: 1fr;
            }

            .calendar-day {
                min-height: 80px;
                padding: 8px 4px;
            }

            .calendar-event {
                font-size: 10px;
                padding: 2px 4px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .stats-grid, .grid-2, .grid-3 {
                grid-template-columns: 1fr;
            }
            
            .header {
                padding: 15px;
            }
            
            .search-bar {
                display: none;
            }
            
            .content {
                padding: 15px;
            }

            .calendar-grid {
                gap: 4px;
            }

            .calendar-day {
                min-height: 70px;
                padding: 6px 2px;
                font-size: 12px;
            }

            .calendar-event {
                font-size: 9px;
                padding: 1px 3px;
            }

            .day-number {
                font-size: 12px;
            }

            .modal-content {
                width: 95%;
                margin: 20px;
            }
        }

        @media (max-width: 480px) {
            .calendar-day {
                min-height: 60px;
            }

            .event-count {
                width: 16px;
                height: 16px;
                font-size: 9px;
                top: 4px;
                right: 4px;
            }

            .modal-footer {
                flex-direction: column;
            }
        }

        /* Dark Mode Styles */
        .dark .sidebar {
            background: rgba(0, 0, 0, 0.95);
            color: #e5e7eb;
        }

        .dark .sidebar-header {
            border-bottom-color: #000000ff;
        }

        .dark .user-profile {
            border-bottom-color: #000000ff;
        }

        .dark .menu-item {
            color: #d1d5db;
        }

        .dark .menu-item:hover, .dark .menu-item.active {
            background: #000000ff;
        }

        .dark .header {
            background: rgba(26, 26, 26, 0.9);
            color: #e5e7eb;
        }

        .dark .search-bar {
            background: #000000ff;
        }

        .dark .search-bar input {
            color: #e5e7eb;
        }

        .dark .action-btn {
            background: rgba(0, 0, 0, 1)ff;
            color: #e5e7eb;
        }

        .dark .user-menu:hover {
            background: #000000ff;
        }

        .dark .content {
            background: transparent;
        }

        .dark .card, .dark .stat-card {
            background: rgba(26, 26, 26, 0.9);
            color: #e5e7eb;
        }

        .dark .card-title, .dark .stat-value {
            color: #e5e7eb;
        }

        .dark .stat-label {
            color: #000000ff;
        }

        .dark .activity-icon {
            background: #000000ff;
        }

        .dark .activity-item {
            border-bottom-color: #374151;
        }

        .dark .health-bar {
            background: #374151;
        }

        .dark .table th {
            color: #9ca3af;
            border-bottom-color: #374151;
        }

        .dark .table td {
            border-bottom-color: #374151;
            color: #e5e7eb;
        }

        .dark .calendar-day {
            background: #1a1a1a;
            color: #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .dark .calendar-day.header {
            background: #000000ff;
            color: #9ca3af;
        }

        .dark .calendar-day.other-month {
            color: #6b7280;
            background: #3a3a3aff;
        }

        .dark .calendar-day.today {
            background: #374151;
            border-color: #e8a00f;
        }

        .dark .btn-outline {
            border-color: #4b5563;
            color: #e5e7eb;
        }

        .dark .btn-outline:hover {
            background: #2a2a2a;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 text-gray-800 dark:bg-dexomed-900 dark:text-gray-100">
    <div class="dashboard-container">
        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <div class="flex-shrink-0 relative">
                        <img src="{{ asset('Img/Logo-removebg-preview.png') }}" 
                             alt="Dexomed Biologicals Group" 
                             class="h-12 w-auto rounded-md"
                             onerror="this.style.display='none';">
                    </div>
                </div>
                <button class="toggle-btn text-gray-500" id="toggleSidebar">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
            
            <div class="sidebar-menu">
                <a href="#" class="menu-item active" data-section="dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="menu-item" data-section="clients">
                    <i class="fas fa-users"></i>
                    <span>Clients</span>
                </a>
                <a href="#" class="menu-item" data-section="technicians">
                    <i class="fas fa-user-cog"></i>
                    <span>Technicians</span>
                </a>
                <a href="#" class="menu-item" data-section="service-requests">
                    <i class="fas fa-tools"></i>
                    <span>Service Requests</span>
                </a>
                <a href="#" class="menu-item" data-section="equipment">
                    <i class="fas fa-microscope"></i>
                    <span>Equipment</span>
                </a>
                <a href="#" class="menu-item" data-section="calibration">
                    <i class="fas fa-ruler-combined"></i>
                    <span>Calibration</span>
                </a>
                <a href="#" class="menu-item" data-section="invoices">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Invoices</span>
                </a>
                <a href="#" class="menu-item" data-section="reports">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
                <a href="#" class="menu-item" data-section="settings">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div class="mt-2">
                        <span class="status-indicator"></span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Admin Account</span>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="flex items-center">
                    <button class="mobile-menu-btn mr-4 md:hidden" id="mobileMenuBtn">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="search-bar">
                        <i class="fas fa-search text-gray-400"></i>
                        <input type="text" placeholder="Search clients, technicians...">
                    </div>
                </div>
                
                <div class="header-actions">
                    <button class="action-btn" id="darkModeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                    
                    <div class="action-btn notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">5</span>
                    </div>
                    
                    <button class="btn btn-primary btn-sm" id="newClientBtn">
                        <i class="fas fa-plus mr-2"></i>
                        Add Client
                    </button>
                    
                    <div class="user-menu relative">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=e8a00f&color=fff" 
                             alt="User Avatar" class="user-avatar-small cursor-pointer">
                        <div class="hidden md:block cursor-pointer">
                            <div class="font-medium">Admin</div>
                            <div class="text-xs text-gray-500">System Administrator</div>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 ml-2 cursor-pointer" 
                           onclick="document.getElementById('dropdownMenu').classList.toggle('hidden')"></i>

                        <!-- Dropdown Content -->
                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <div class="border-t border-gray-100"></div>
                            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="#" 
       class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50" 
       onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
       Log Out
    </a>
</form>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Sections -->
            <div class="content">
                <!-- Dashboard Section -->
                <div id="dashboard" class="content-section active">
                    <h1 class="page-title">Admin Dashboard</h1>
                    
                    <!-- Welcome Card -->
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">System Overview</h2>
                            <span class="text-sm text-gray-500">Last updated: Today, 09:42 AM</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Welcome to the Dexomed Biologicals Group Admin Dashboard. You have <span class="font-semibold text-dexomed-500">12 pending service requests</span> and <span class="font-semibold text-dexomed-500">5 overdue calibrations</span> to address.
                        </p>
                        <div class="flex gap-3">
                            <button class="btn btn-primary">
                                <i class="fas fa-tools mr-2"></i>
                                Manage Service Requests
                            </button>
                            <button class="btn btn-outline" id="generateReportBtn">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Generate Report
                            </button>
                        </div>
                    </div>
                    
                    <!-- Quick Stats -->
                    <div class="stats-grid">
                        <div class="stat-card slide-up">
                            <div class="stat-icon bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value">48</div>
                                <div class="stat-label">Active Clients</div>
                            </div>
                        </div>
                        
                        <div class="stat-card slide-up" style="animation-delay: 0.1s">
                            <div class="stat-icon bg-yellow-100 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-300">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value">15</div>
                                <div class="stat-label">Technicians</div>
                            </div>
                        </div>
                        
                        <div class="stat-card slide-up" style="animation-delay: 0.2s">
                            <div class="stat-icon bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-300">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value">12</div>
                                <div class="stat-label">Active Requests</div>
                            </div>
                        </div>
                        
                        <div class="stat-card slide-up" style="animation-delay: 0.3s">
                            <div class="stat-icon bg-purple-100 text-purple-600 dark:bg-purple-900 dark:text-purple-300">
                                <i class="fas fa-microscope"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value">342</div>
                                <div class="stat-label">Total Equipment</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid-2">
                        <!-- Recent Activity -->
                        <div class="card slide-up">
                            <div class="card-header">
                                <h2 class="card-title">Recent System Activity</h2>
                                <a href="#" class="card-action">View All</a>
                            </div>
                            <div class="activity-feed">
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">New client registered: General Hospital</div>
                                        <div class="activity-time">2 hours ago</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Service request #SR-2023-128 assigned to Tech Johnson</div>
                                        <div class="activity-time">Yesterday, 3:45 PM</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Critical alert: Ventilator calibration overdue at City Clinic</div>
                                        <div class="activity-time">October 12, 2023</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Monthly invoice report generated</div>
                                        <div class="activity-time">October 10, 2023</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-user-cog"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">New technician account created</div>
                                        <div class="activity-time">October 8, 2023</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Service Request Status -->
                        <div class="card slide-up" style="animation-delay: 0.2s">
                            <div class="card-header">
                                <h2 class="card-title">Service Request Status</h2>
                                <a href="#" class="card-action">Details</a>
                            </div>
                            <div class="health-indicators">
                                <div class="health-indicator">
                                    <span class="health-label">Pending</span>
                                    <div class="health-bar">
                                        <div class="health-progress bg-yellow-500" style="width: 40%"></div>
                                    </div>
                                    <span class="text-sm font-medium">12</span>
                                </div>
                                <div class="health-indicator">
                                    <span class="health-label">In Progress</span>
                                    <div class="health-bar">
                                        <div class="health-progress bg-blue-500" style="width: 35%"></div>
                                    </div>
                                    <span class="text-sm font-medium">10</span>
                                </div>
                                <div class="health-indicator">
                                    <span class="health-label">Completed</span>
                                    <div class="health-bar">
                                        <div class="health-progress bg-green-500" style="width: 25%"></div>
                                    </div>
                                    <span class="text-sm font-medium">7</span>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <h3 class="font-medium mb-3">Urgent Alerts</h3>
                                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-3">
                                    <div class="flex items-start">
                                        <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-2"></i>
                                        <div>
                                            <div class="font-medium text-red-800 dark:text-red-200">Critical equipment failure at General Hospital</div>
                                            <div class="text-sm text-red-600 dark:text-red-300 mt-1">Response required within 2 hours</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Service Requests -->
                    <div class="card slide-up mt-6">
                        <div class="card-header">
                            <h2 class="card-title">Recent Service Requests</h2>
                            <div class="flex gap-2">
                                <button class="btn btn-outline btn-sm">
                                    <i class="fas fa-filter mr-1"></i>
                                    Filter
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-1"></i>
                                    Assign Technician
                                </button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Client</th>
                                        <th>Equipment</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Assigned To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">SR-2023-128</td>
                                        <td>General Hospital</td>
                                        <td>Ventilator V-200</td>
                                        <td><span class="status-badge status-attention">Urgent</span></td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">SR-2023-127</td>
                                        <td>City Clinic</td>
                                        <td>Centrifuge CF-2000</td>
                                        <td><span class="status-badge status-maintenance">High</span></td>
                                        <td><span class="status-badge status-pending">In Progress</span></td>
                                        <td>Tech Johnson</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">SR-2023-126</td>
                                        <td>Medical Center</td>
                                        <td>ECG Machine</td>
                                        <td><span class="status-badge status-operational">Medium</span></td>
                                        <td><span class="status-badge status-completed">Completed</span></td>
                                        <td>Tech Williams</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">SR-2023-125</td>
                                        <td>Community Hospital</td>
                                        <td>Ultrasound System</td>
                                        <td><span class="status-badge status-operational">Low</span></td>
                                        <td><span class="status-badge status-completed">Completed</span></td>
                                        <td>Tech Brown</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Clients Section -->
                <div id="clients" class="content-section">
                    <h1 class="page-title">Client Management</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">All Clients</h2>
                            <div class="flex gap-2">
                                <button class="btn btn-outline btn-sm">
                                    <i class="fas fa-filter mr-1"></i>
                                    Filter
                                </button>
                                <button class="btn btn-primary btn-sm" id="newClientBtn2">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Client
                                </button>
                            </div>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Contact Person</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Equipment Count</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">General Hospital</td>
                                        <td>Dr. Sarah Johnson</td>
                                        <td>s.johnson@generalhospital.com</td>
                                        <td>(555) 123-4567</td>
                                        <td>42</td>
                                        <td><span class="status-badge status-operational">Active</span></td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">City Clinic</td>
                                        <td>Dr. Michael Brown</td>
                                        <td>m.brown@cityclinic.com</td>
                                        <td>(555) 987-6543</td>
                                        <td>28</td>
                                        <td><span class="status-badge status-operational">Active</span></td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">Medical Center</td>
                                        <td>Dr. Emily Wilson</td>
                                        <td>e.wilson@medicalcenter.org</td>
                                        <td>(555) 456-7890</td>
                                        <td>35</td>
                                        <td><span class="status-badge status-operational">Active</span></td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">Community Hospital</td>
                                        <td>Dr. Robert Davis</td>
                                        <td>r.davis@communityhospital.net</td>
                                        <td>(555) 234-5678</td>
                                        <td>19</td>
                                        <td><span class="status-badge status-attention">Inactive</span></td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Technicians Section -->
                <div id="technicians" class="content-section">
                    <h1 class="page-title">Technician Management</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">All Technicians</h2>
                            <div class="flex gap-2">
                                <button class="btn btn-outline btn-sm">
                                    <i class="fas fa-filter mr-1"></i>
                                    Filter
                                </button>
                                <button class="btn btn-primary btn-sm" id="newTechnicianBtn">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Technician
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid-3">
                            <div class="card">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user-cog text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold">Tech Johnson</h3>
                                        <p class="text-sm text-gray-500">Senior Technician</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="status-badge status-operational">Active</span>
                                    <button class="btn btn-outline btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user-cog text-yellow-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold">Tech Williams</h3>
                                        <p class="text-sm text-gray-500">Calibration Specialist</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="status-badge status-operational">Active</span>
                                    <button class="btn btn-outline btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user-cog text-green-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold">Tech Brown</h3>
                                        <p class="text-sm text-gray-500">Field Technician</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="status-badge status-attention">On Leave</span>
                                    <button class="btn btn-outline btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Service Requests Section -->
                <div id="service-requests" class="content-section">
                    <h1 class="page-title">Service Request Management</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">All Service Requests</h2>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-plus mr-1"></i>
                                Create Request
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Client</th>
                                        <th>Equipment</th>
                                        <th>Issue</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Assigned To</th>
                                        <th>Submitted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">SR-2023-128</td>
                                        <td>General Hospital</td>
                                        <td>Ventilator V-200</td>
                                        <td>Critical failure</td>
                                        <td><span class="status-badge status-attention">Urgent</span></td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>-</td>
                                        <td>Oct 15, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">SR-2023-127</td>
                                        <td>City Clinic</td>
                                        <td>Centrifuge CF-2000</td>
                                        <td>Unusual noise</td>
                                        <td><span class="status-badge status-maintenance">High</span></td>
                                        <td><span class="status-badge status-pending">In Progress</span></td>
                                        <td>Tech Johnson</td>
                                        <td>Oct 10, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">SR-2023-126</td>
                                        <td>Medical Center</td>
                                        <td>ECG Machine</td>
                                        <td>Calibration required</td>
                                        <td><span class="status-badge status-operational">Medium</span></td>
                                        <td><span class="status-badge status-completed">Completed</span></td>
                                        <td>Tech Williams</td>
                                        <td>Oct 5, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Equipment Section -->
                <div id="equipment" class="content-section">
                    <h1 class="page-title">Equipment Management</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">All Equipment</h2>
                            <div class="flex gap-2">
                                <button class="btn btn-outline btn-sm">
                                    <i class="fas fa-filter mr-1"></i>
                                    Filter
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Equipment
                                </button>
                            </div>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Equipment Name</th>
                                        <th>Model</th>
                                        <th>Serial No.</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Last Service</th>
                                        <th>Next Calibration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">Ventilator</td>
                                        <td>V-200</td>
                                        <td>SN-784512</td>
                                        <td>General Hospital</td>
                                        <td><span class="status-badge status-attention">Attention</span></td>
                                        <td>Sep 15, 2023</td>
                                        <td>Oct 20, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">Centrifuge</td>
                                        <td>CF-2000</td>
                                        <td>SN-451269</td>
                                        <td>City Clinic</td>
                                        <td><span class="status-badge status-maintenance">Maintenance</span></td>
                                        <td>Aug 22, 2023</td>
                                        <td>Nov 15, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">ECG Machine</td>
                                        <td>ECG-Pro</td>
                                        <td>SN-963258</td>
                                        <td>Medical Center</td>
                                        <td><span class="status-badge status-operational">Operational</span></td>
                                        <td>Oct 5, 2023</td>
                                        <td>Feb 5, 2024</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Calibration Section -->
                <div id="calibration" class="content-section">
                    <h1 class="page-title">Calibration Management</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">Upcoming Calibrations</h2>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-plus mr-1"></i>
                                Schedule Calibration
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Equipment</th>
                                        <th>Client</th>
                                        <th>Last Calibration</th>
                                        <th>Next Due</th>
                                        <th>Status</th>
                                        <th>Assigned To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">Ventilator V-200</td>
                                        <td>General Hospital</td>
                                        <td>Apr 20, 2023</td>
                                        <td>Oct 20, 2023</td>
                                        <td><span class="status-badge status-attention">Due Soon</span></td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">
                                                Schedule
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">Hematology Analyzer</td>
                                        <td>Medical Center</td>
                                        <td>Jul 15, 2023</td>
                                        <td>Jan 15, 2024</td>
                                        <td><span class="status-badge status-operational">On Track</span></td>
                                        <td>Tech Williams</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">ECG Machine</td>
                                        <td>City Clinic</td>
                                        <td>Aug 5, 2023</td>
                                        <td>Feb 5, 2024</td>
                                        <td><span class="status-badge status-operational">On Track</span></td>
                                        <td>Tech Johnson</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Invoices Section -->
                <div id="invoices" class="content-section">
                    <h1 class="page-title">Invoice Management</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">Recent Invoices</h2>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-plus mr-1"></i>
                                Create Invoice
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">INV-2023-128</td>
                                        <td>General Hospital</td>
                                        <td>Oct 12, 2023</td>
                                        <td>$1,250.00</td>
                                        <td><span class="status-badge status-operational">Paid</span></td>
                                        <td>Nov 12, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">INV-2023-127</td>
                                        <td>City Clinic</td>
                                        <td>Sep 28, 2023</td>
                                        <td>$850.00</td>
                                        <td><span class="status-badge status-operational">Paid</span></td>
                                        <td>Oct 28, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">INV-2023-126</td>
                                        <td>Medical Center</td>
                                        <td>Sep 15, 2023</td>
                                        <td>$2,100.00</td>
                                        <td><span class="status-badge status-operational">Paid</span></td>
                                        <td>Oct 15, 2023</td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Reports Section -->
                <div id="reports" class="content-section">
                    <h1 class="page-title">Reports & Analytics</h1>
                    
                    <div class="grid-2">
                        <div class="card slide-up">
                            <div class="card-header">
                                <h2 class="card-title">Generate Reports</h2>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <div>
                                        <div class="font-medium">Service Request Report</div>
                                        <div class="text-sm text-gray-500">Monthly service request statistics</div>
                                    </div>
                                    <button class="btn btn-primary btn-sm">
                                        Generate
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <div>
                                        <div class="font-medium">Equipment Performance</div>
                                        <div class="text-sm text-gray-500">Equipment uptime and maintenance history</div>
                                    </div>
                                    <button class="btn btn-primary btn-sm">
                                        Generate
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <div>
                                        <div class="font-medium">Financial Summary</div>
                                        <div class="text-sm text-gray-500">Revenue and invoice tracking</div>
                                    </div>
                                    <button class="btn btn-primary btn-sm">
                                        Generate
                                    </button>
                                </div>
                                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <div>
                                        <div class="font-medium">Technician Performance</div>
                                        <div class="text-sm text-gray-500">Technician workload and efficiency</div>
                                    </div>
                                    <button class="btn btn-primary btn-sm">
                                        Generate
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card slide-up" style="animation-delay: 0.2s">
                            <div class="card-header">
                                <h2 class="card-title">System Analytics</h2>
                            </div>
                            <div class="space-y-6">
                                <div>
                                    <h3 class="font-medium mb-2">Service Request Trends</h3>
                                    <div class="bg-gray-100 dark:bg-gray-800 h-32 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-500">Chart visualization would appear here</span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-medium mb-2">Equipment Health Overview</h3>
                                    <div class="bg-gray-100 dark:bg-gray-800 h-32 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-500">Chart visualization would appear here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Settings Section -->
                <div id="settings" class="content-section">
                    <h1 class="page-title">System Settings</h1>
                    
                    <div class="grid-2">
                        <div class="card slide-up">
                            <div class="card-header">
                                <h2 class="card-title">General Settings</h2>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">System Name</label>
                                    <input type="text" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700" value="Dexomed Biologicals Group">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Default Service Response Time</label>
                                    <select class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700">
                                        <option>24 hours</option>
                                        <option selected>48 hours</option>
                                        <option>72 hours</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Calibration Reminder Period</label>
                                    <select class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700">
                                        <option>7 days before</option>
                                        <option selected>14 days before</option>
                                        <option>30 days before</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Invoice Payment Terms</label>
                                    <select class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700">
                                        <option>Net 15</option>
                                        <option selected>Net 30</option>
                                        <option>Net 45</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary">
                                    Save Settings
                                </button>
                            </div>
                        </div>
                        
                        <div class="card slide-up" style="animation-delay: 0.2s">
                            <div class="card-header">
                                <h2 class="card-title">Notification Settings</h2>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Email Notifications</div>
                                        <div class="text-sm text-gray-500">Receive system alerts via email</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">SMS Alerts</div>
                                        <div class="text-sm text-gray-500">Critical alerts via SMS</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Maintenance Reminders</div>
                                        <div class="text-sm text-gray-500">Upcoming maintenance alerts</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Calibration Notices</div>
                                        <div class="text-sm text-gray-500">Upcoming calibration alerts</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Client Modal -->
    <div id="addClientModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Client</h2>
                <button class="modal-close" id="closeClientModal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="clientForm">
                    <div class="form-group">
                        <label class="form-label">Client Name</label>
                        <input type="text" class="form-input" placeholder="Enter client name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Contact Person</label>
                            <input type="text" class="form-input" placeholder="Enter contact person" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-input" placeholder="Enter phone number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-input" placeholder="Enter email address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-textarea" rows="3" placeholder="Enter client address" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Client Type</label>
                            <select class="form-select" required>
                                <option value="">Select client type</option>
                                <option value="hospital">Hospital</option>
                                <option value="clinic">Clinic</option>
                                <option value="laboratory">Laboratory</option>
                                <option value="research">Research Facility</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Notes (Optional)</label>
                        <textarea class="form-textarea" rows="3" placeholder="Any additional notes about the client"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelClient">Cancel</button>
                <button class="btn btn-primary" id="submitClient">Add Client</button>
            </div>
        </div>
    </div>

    <!-- Add Technician Modal -->
    <div id="addTechnicianModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Technician</h2>
                <button class="modal-close" id="closeTechnicianModal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="technicianForm">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-input" placeholder="Enter technician name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-input" placeholder="Enter phone number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Specialization</label>
                        <select class="form-select" required>
                            <option value="">Select specialization</option>
                            <option value="general">General Equipment</option>
                            <option value="diagnostic">Diagnostic Equipment</option>
                            <option value="surgical">Surgical Equipment</option>
                            <option value="laboratory">Laboratory Equipment</option>
                            <option value="calibration">Calibration Specialist</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Experience Level</label>
                            <select class="form-select" required>
                                <option value="junior">Junior Technician</option>
                                <option value="senior">Senior Technician</option>
                                <option value="specialist">Specialist</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="on_leave">On Leave</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Assigned Regions</label>
                        <div class="flex flex-wrap gap-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>North Region</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>South Region</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>East Region</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>West Region</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Notes (Optional)</label>
                        <textarea class="form-textarea" rows="3" placeholder="Any additional notes about the technician"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelTechnician">Cancel</button>
                <button class="btn btn-primary" id="submitTechnician">Add Technician</button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle Sidebar
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
        
        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.add('mobile-open');
            sidebarOverlay.classList.add('active');
        });
        
        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('mobile-open');
            sidebarOverlay.classList.remove('active');
        });
        
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const html = document.documentElement;
        
        // Check for saved theme preference or respect OS setting
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
        
        darkModeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
        });
        
        // Active Menu Item and Content Switching
        const menuItems = document.querySelectorAll('.menu-item');
        const contentSections = document.querySelectorAll('.content-section');
        
        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Update active menu item
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Get the target section
                const targetSection = this.getAttribute('data-section');
                
                // Hide all content sections
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show the target section
                document.getElementById(targetSection).classList.add('active');
                
                // Update page title based on active section
                updatePageTitle(targetSection);
                
                // Close mobile sidebar after selection
                if (window.innerWidth < 1024) {
                    sidebar.classList.remove('mobile-open');
                    sidebarOverlay.classList.remove('active');
                }
            });
        });
        
        // Update page title based on active section
        function updatePageTitle(section) {
            const titles = {
                'dashboard': 'Admin Dashboard',
                'clients': 'Client Management',
                'technicians': 'Technician Management',
                'service-requests': 'Service Request Management',
                'equipment': 'Equipment Management',
                'calibration': 'Calibration Management',
                'invoices': 'Invoice Management',
                'reports': 'Reports & Analytics',
                'settings': 'System Settings'
            };
            
            const pageTitle = document.querySelector('.page-title');
            if (pageTitle && titles[section]) {
                pageTitle.textContent = titles[section];
            }
        }
        
        // Calendar Functionality
        let currentDate = new Date();
        const calendarGrid = document.getElementById('calendarGrid');
        const calendarTitle = document.getElementById('calendarTitle');
        const prevMonthBtn = document.getElementById('prevMonth');
        const nextMonthBtn = document.getElementById('nextMonth');

        // Sample events data
        const events = [
            { date: new Date(2023, 9, 15), title: 'Service: General Hospital', type: 'maintenance' },
            { date: new Date(2023, 9, 20), title: 'Calibration: City Clinic', type: 'calibration' },
            { date: new Date(2023, 9, 22), title: 'Training: New Technicians', type: 'urgent' },
            { date: new Date(2023, 9, 25), title: 'Meeting: Monthly Review', type: 'urgent' },
            { date: new Date(2023, 9, 28), title: 'Calibration: Medical Center', type: 'calibration' },
            { date: new Date(2023, 10, 5), title: 'Service: Community Hospital', type: 'maintenance' }
        ];

        function renderCalendar() {
            // Clear previous calendar
            if (calendarGrid) {
                calendarGrid.innerHTML = '';

                // Set calendar title
                const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December'
                ];
                calendarTitle.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

                // Create day headers
                const dayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                dayHeaders.forEach(day => {
                    const dayElement = document.createElement('div');
                    dayElement.className = 'calendar-day header';
                    dayElement.textContent = day;
                    calendarGrid.appendChild(dayElement);
                });

                // Get first day of month and total days
                const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
                const totalDays = lastDay.getDate();
                const startingDay = firstDay.getDay();

                // Add empty days for previous month
                for (let i = 0; i < startingDay; i++) {
                    const prevMonthDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), -i);
                    const dayElement = document.createElement('div');
                    dayElement.className = 'calendar-day other-month';
                    dayElement.innerHTML = `<div class="day-number">${prevMonthDay.getDate()}</div>`;
                    calendarGrid.appendChild(dayElement);
                }

                // Add current month days
                const today = new Date();
                for (let day = 1; day <= totalDays; day++) {
                    const dayDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                    const dayElement = document.createElement('div');
                    
                    // Check if this is today
                    const isToday = dayDate.toDateString() === today.toDateString();
                    
                    dayElement.className = `calendar-day ${isToday ? 'today' : ''}`;
                    dayElement.innerHTML = `<div class="day-number">${day}</div>`;
                    
                    // Add events for this day
                    const dayEvents = events.filter(event => 
                        event.date.toDateString() === dayDate.toDateString()
                    );
                    
                    dayEvents.forEach(event => {
                        const eventElement = document.createElement('div');
                        eventElement.className = `calendar-event ${event.type}`;
                        eventElement.textContent = event.title;
                        eventElement.title = event.title;
                        dayElement.appendChild(eventElement);
                    });
                    
                    // Add event count badge if there are events
                    if (dayEvents.length > 0) {
                        const eventCount = document.createElement('div');
                        eventCount.className = 'event-count';
                        eventCount.textContent = dayEvents.length;
                        dayElement.appendChild(eventCount);
                    }
                    
                    calendarGrid.appendChild(dayElement);
                }

                // Calculate how many empty days we need to add to complete the grid (always 42 cells total)
                const totalCells = 42; // 6 rows x 7 days
                const existingCells = startingDay + totalDays;
                const remainingCells = totalCells - existingCells;

                // Add empty days for next month
                for (let i = 1; i <= remainingCells; i++) {
                    const nextMonthDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, i);
                    const dayElement = document.createElement('div');
                    dayElement.className = 'calendar-day other-month';
                    dayElement.innerHTML = `<div class="day-number">${nextMonthDay.getDate()}</div>`;
                    calendarGrid.appendChild(dayElement);
                }
            }
        }

        // Navigation between months
        if (prevMonthBtn && nextMonthBtn) {
            prevMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });

            nextMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });
        }

        // Initialize calendar
        renderCalendar();
        
        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe elements with animation classes
        document.addEventListener('DOMContentLoaded', () => {
            const animatedElements = document.querySelectorAll('.slide-up, .fade-in');
            animatedElements.forEach(el => {
                // Set animation to paused initially
                el.style.animationPlayState = 'paused';
                observer.observe(el);
            });
        });
        
        // Responsive adjustments
        function handleResize() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('mobile-open');
                sidebarOverlay.classList.remove('active');
            }
        }
        
        window.addEventListener('resize', handleResize);

        // Modal Functionality
        const addClientModal = document.getElementById('addClientModal');
        const addTechnicianModal = document.getElementById('addTechnicianModal');

        // Get all buttons that should open modals
        const newClientBtns = [
            document.getElementById('newClientBtn'),
            document.getElementById('newClientBtn2')
        ];
        
        const newTechnicianBtn = document.getElementById('newTechnicianBtn');

        // Close buttons
        const closeClientModal = document.getElementById('closeClientModal');
        const closeTechnicianModal = document.getElementById('closeTechnicianModal');

        // Cancel buttons
        const cancelClient = document.getElementById('cancelClient');
        const cancelTechnician = document.getElementById('cancelTechnician');

        // Submit buttons
        const submitClient = document.getElementById('submitClient');
        const submitTechnician = document.getElementById('submitTechnician');

        // Function to open modal
        function openModal(modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Function to close modal
        function closeModal(modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Add event listeners for client modal
        newClientBtns.forEach(btn => {
            if (btn) {
                btn.addEventListener('click', () => openModal(addClientModal));
            }
        });

        // Add event listener for technician modal
        if (newTechnicianBtn) {
            newTechnicianBtn.addEventListener('click', () => openModal(addTechnicianModal));
        }

        // Close modal events
        if (closeClientModal) {
            closeClientModal.addEventListener('click', () => closeModal(addClientModal));
        }
        if (closeTechnicianModal) {
            closeTechnicianModal.addEventListener('click', () => closeModal(addTechnicianModal));
        }

        // Cancel button events
        if (cancelClient) {
            cancelClient.addEventListener('click', () => closeModal(addClientModal));
        }
        if (cancelTechnician) {
            cancelTechnician.addEventListener('click', () => closeModal(addTechnicianModal));
        }

        // Submit button events
        if (submitClient) {
            submitClient.addEventListener('click', (e) => {
                e.preventDefault();
                // In a real application, you would submit the form data here
                alert('Client added successfully!');
                closeModal(addClientModal);
                document.getElementById('clientForm').reset();
            });
        }

        if (submitTechnician) {
            submitTechnician.addEventListener('click', (e) => {
                e.preventDefault();
                // In a real application, you would submit the form data here
                alert('Technician added successfully!');
                closeModal(addTechnicianModal);
                document.getElementById('technicianForm').reset();
            });
        }

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === addClientModal) {
                closeModal(addClientModal);
            }
            if (e.target === addTechnicianModal) {
                closeModal(addTechnicianModal);
            }
        });
    </script>
</body>
</html>





