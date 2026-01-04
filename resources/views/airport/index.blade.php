<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport - Garuda Indonesia</title>
    <style>
        :root {
            --primary: #0066b2;
            --secondary: #004d8c;
            --white: #ffffff;
            --light: rgba(255, 255, 255, 0.1);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
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
            color: var(--white);
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: var(--shadow);
            max-width: 600px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 2.4rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0.95;
        }

        .btn {
            display: inline-block;
            padding: 14px 32px;
            background: var(--white);
            color: var(--primary);
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .btn:hover {
            background: #f0f0f0;
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            color: var(--secondary);
        }

        .logo {
            margin-bottom: 20px;
            font-size: 1.2rem;
            opacity: 0.8;
            font-weight: 500;
        }

        /* Animasi muncul */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeInUp 0.8s ease-out;
        }

        /* Responsif */
        @media (max-width: 600px) {
            .card {
                padding: 30px 20px;
            }
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
            .btn {
                padding: 12px 28px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">Garuda Indonesia Airport</div>
        <h1>✈️ Halaman Bandara</h1>
        <p>Selamat datang di halaman manajemen bandara. Di sini Anda dapat mengelola data bandara secara efisien dan aman.</p>
        <a href="{{ route('airport.create') }}" class="btn">➕ Tambah Bandara</a>
    </div>
</body>
</html>