<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Garuda Indonesia Airport</title>
    <style>
        :root {
            --primary: #0066b2;
            --secondary: #004d8c;
            --white: #ffffff;
            --green: #00c853;
            --light-gray: #f5f5f5;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            min-height: 100vh;
            color: white;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }

        .menu-toggle {
            position: relative;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            transition: background 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .hamburger {
            width: 24px;
            height: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hamburger span {
            display: block;
            width: 100%;
            height: 3px;
            background: var(--white);
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .badge {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 16px;
            height: 16px;
            background: var(--green);
            border-radius: 50%;
            border: 2px solid var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
            color: var(--white);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            width: 280px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.2);
            transition: left 0.3s ease;
            z-index: 1000;
            padding: 20px;
            color: #333;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar h3 {
            margin-bottom: 20px;
            color: var(--primary);
        }

        .sidebar a {
            display: block;
            padding: 12px 15px;
            text-decoration: none;
            color: #333;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: background 0.2s ease;
        }

        .sidebar a:hover {
            background: var(--primary);
            color: white;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 10px 15px;
            }
            .hamburger span {
                height: 2px;
            }
            .badge {
                width: 12px;
                height: 12px;
                font-size: 0.6rem;
            }
        }
    </style>
</head>
<body>

    <!-- Header dengan Menu Toggle -->
    <div class="header">
        <div class="menu-toggle" id="menuToggle">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="badge">•</div> <!-- Badge notifikasi -->
        </div>
        <h2>Garuda Indonesia Airport Dashboard</h2>
        <div style="width: 24px;"></div> <!-- Placeholder untuk balance layout -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3>Menu Navigasi</h3>
        <a href="/welcome">🏠 Home</a>
        <a href="/airline">✈️ Airline</a>
        <a href="/airport">🛫 Airport</a>
        <a href="/facility">🛠️ Facility</a>
        <a href="/flight">🛫 Flight</a>
        <a href="/flight_class">💺 Flight Class</a>
        <a href="/flight_seat">🪑 Flight Seat</a>
        <a href="/flight_segment">🧳 Flight Segment</a>
        <a href="/promo_code">🎟️ Promo Code</a>
        <a href="/transaction">💳 Transaction</a>
        <a href="/transaction_passenger">👥 Transaction Passenger</a>
    </div>

    <!-- Overlay untuk tutup sidebar saat klik luar -->
    <div class="overlay" id="overlay"></div>

    <div class="container">
        <h2>Selamat Datang Pengguna Baru di Garuda Indonesia</h2>
    </div>

    <script>
        // Toggle Sidebar
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        // Optional: Close sidebar when clicking outside on desktop
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !menuToggle.contains(e.target) && window.innerWidth > 768) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        });
    </script>

</body>
</html>