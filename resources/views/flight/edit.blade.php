<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerbangan - Garuda Indonesia Airport</title>
    <style>
        :root {
            --primary: #0066b2;
            --secondary: #004d8c;
            --white: #ffffff;
            --light: rgba(255, 255, 255, 0.1);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            --danger: #e53935;
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
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow);
            max-width: 700px;
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

        .error-list {
            background: #ffebee;
            color: var(--danger);
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid var(--danger);
        }

        .error-list ul {
            list-style: none;
            padding-left: 0;
        }

        .error-list li {
            margin: 6px 0;
            font-size: 0.95rem;
        }

        /* Grid untuk form lebih rapi */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            .card {
                padding: 30px 20px;
            }
            .header h1 {
                font-size: 1.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h1>✏️ Edit Penerbangan</h1>
            <p>Perbarui data penerbangan "{{ $flight->flight_number }}"</p>
        </div>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('flight.update', $flight->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="airline_id">Maskapai</label>
                <select id="airline_id" name="airline_id" required>
                    <option value="">-- Pilih Maskapai --</option>
                    @foreach($airlines as $airline)
                        <option value="{{ $airline->id }}" {{ $airline->id == $flight->airline_id ? 'selected' : '' }}>
                            {{ $airline->name }} ({{ $airline->code }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="flight_number">Nomor Penerbangan</label>
                    <input type="text" id="flight_number" name="flight_number" value="{{ old('flight_number', $flight->flight_number) }}" required placeholder="Contoh: GA123">
                </div>

                <div class="form-group">
                    <label for="base_price">Harga Dasar (IDR)</label>
                    <input type="number" id="base_price" name="base_price" value="{{ old('base_price', $flight->base_price) }}" required min="0" placeholder="Contoh: 1500000">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="origin">Bandara Asal</label>
                    <input type="text" id="origin" name="origin" value="{{ old('origin', $flight->origin) }}" required placeholder="Contoh: CGK">
                </div>

                <div class="form-group">
                    <label for="destination">Bandara Tujuan</label>
                    <input type="text" id="destination" name="destination" value="{{ old('destination', $flight->destination) }}" required placeholder="Contoh: DPS">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="departure_time">Waktu Berangkat</label>
                    <input type="datetime-local" id="departure_time" name="departure_time" 
                           value="{{ old('departure_time', \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i')) }}" required>
                </div>

                <div class="form-group">
                    <label for="arrival_time">Waktu Tiba</label>
                    <input type="datetime-local" id="arrival_time" name="arrival_time" 
                           value="{{ old('arrival_time', \Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d\TH:i')) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="status">Status Penerbangan</label>
                <select id="status" name="status" required>
                    @foreach (['scheduled','delayed','cancelled','completed'] as $status)
                        <option value="{{ $status }}" {{ (old('status', $flight->status) == $status) ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn">
                <span>💾</span> Perbarui Penerbangan
            </button>
        </form>

        <a href="{{ route('flight.index') }}" class="back-link">
            ← Kembali ke Daftar Penerbangan
        </a>
    </div>
</body>
</html>