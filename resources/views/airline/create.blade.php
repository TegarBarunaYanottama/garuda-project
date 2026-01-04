<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Maskapai - Garuda Indonesia Airport</title>
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
            color: #333;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow);
            max-width: 600px;
            width: 100%;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: var(--primary);
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .header p {
            color: #666;
            margin-top: 8px;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary);
            font-size: 0.95rem;
        }

        input,
        select {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 178, 0.15);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 102, 178, 0.3);
        }

        .btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 102, 178, 0.4);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: opacity 0.2s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        /* Responsif */
        @media (max-width: 600px) {
            .card {
                padding: 30px 20px;
            }
            .header h1 {
                font-size: 1.7rem;
            }
            .btn {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h1>✈️ Tambah Maskapai Baru</h1>
            <p>Daftarkan maskapai baru ke dalam sistem Garuda Indonesia</p>
        </div>

        <form action="{{ route('airline.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="code">Kode Maskapai (IATA)</label>
                <input type="text" id="code" name="code" required maxlength="3" placeholder="Contoh: GA">
            </div>

            <div class="form-group">
                <label for="name">Nama Maskapai</label>
                <input type="text" id="name" name="name" required placeholder="Contoh: Garuda Indonesia">
            </div>

            <div class="form-group">
                <label for="country">Negara Asal</label>
                <select id="country" name="country" required>
                    <option value="">-- Pilih Negara --</option>
                    @foreach($countries as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn">
                <span>💾</span> Simpan Maskapai
            </button>
        </form>

        <a href="{{ route('airline.index') }}" class="back-link">
            ← Kembali ke Daftar Maskapai
        </a>
    </div>
</body>
</html>