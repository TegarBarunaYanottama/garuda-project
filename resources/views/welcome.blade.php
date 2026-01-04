@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    .hero-section {
        background: url('https://image.shutterstock.com/z/stock-photo-garuda-indonesia-airline-logo-and-plane-flying-in-the-sky-240903677.jpg') center center;
        background-size: cover;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        position: relative;
        color: white;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 86, 179, 0.75) 0%, rgba(0, 40, 90, 0.85) 100%);
        z-index: 0;
    }

    .content-box {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        padding: 48px 40px;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
        text-align: center;
        max-width: 520px;
        width: 100%;
        position: relative;
        z-index: 2;
        border: 1px solid rgba(255, 255, 255, 0.15);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .content-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 50px rgba(0, 30, 80, 0.4);
    }

    .logo-icon {
        font-size: 56px;
        margin-bottom: 20px;
        color: #FFD700; /* Emas Garuda */
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    .brand-title {
        font-size: 32px;
        font-weight: 700;
        margin: 0 0 12px;
        letter-spacing: 0.5px;
        color: white;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    }

    .subtitle {
        font-size: 15px;
        opacity: 0.85;
        margin-bottom: 24px;
        font-weight: 500;
    }

    .welcome-text {
        font-size: 17px;
        line-height: 1.6;
        opacity: 0.92;
        margin-bottom: 32px;
        font-weight: 400;
    }

    .btn-enter {
        display: inline-block;
        padding: 14px 40px;
        background: linear-gradient(135deg, #FFD700 0%, #FFC400 100%);
        color: #003B6D;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 17px;
        transition: all 0.35s ease;
        box-shadow: 0 4px 20px rgba(255, 215, 0, 0.3);
        letter-spacing: 0.5px;
        border: none;
        cursor: pointer;
    }

    .btn-enter:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.5);
        background: linear-gradient(135deg, #FFE033 0%, #FFD000 100%);
    }

    .footer-text {
        position: absolute;
        bottom: 20px;
        width: 100%;
        text-align: center;
        font-size: 13px;
        opacity: 0.7;
        z-index: 2;
        font-weight: 500;
    }

    @media (max-width: 600px) {
        .content-box {
            padding: 36px 24px;
            margin: 0 10px;
        }

        .brand-title {
            font-size: 26px;
        }

        .welcome-text {
            font-size: 15px;
        }

        .btn-enter {
            padding: 12px 32px;
            font-size: 16px;
        }
    }
</style>

<div class="hero-section">
    <div class="overlay"></div>

    <div class="content-box">
        <img src="{{ asset('images/Garuda-Logo-Vertical-dalam.jpg') }}" class="logo">   
        <h1 class="brand-title">Garuda Indonesia</h1>
        <div class="subtitle">National Flag Carrier • Tahun 2025</div>

        <h2 class="brand-title" style="font-size: 24px; margin-top: 10px;">Airport Operations Dashboard</h2>

        <p class="welcome-text">
            Selamat Datang di Garuda Indonesia dan selamat berlibur.
        </p>

        <a href="/dashboard" class="btn-enter">
            Enter Dashboard
        </a>
    </div>

    <div class="footer-text">
        © 2025 Garuda Indonesia Airport Operations. All rights reserved.
    </div>
</div>
