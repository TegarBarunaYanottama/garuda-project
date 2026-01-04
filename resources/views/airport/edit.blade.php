<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bandara - Garuda Indonesia</title>
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
            box-shadow: var(--shadow);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 25px;
            text-align: center;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            opacity: 0.95;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        input[type="file"] {
            margin-top: 8px;
        }

        .image-preview {
            margin-top: 10px;
        }

        .image-preview img {
            max-width: 150px;
            border-radius: 10px;
            border: 2px solid white;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-save {
            background: var(--white);
            color: var(--primary);
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid white;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            text-align: center;
        }

        @media (max-width: 600px) {
            .card {
                padding: 30px 20px;
            }
            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>✏️ Edit Bandara</h1>

        @if ($errors->any())
            <div class="alert" style="background: rgba(255, 100, 100, 0.3);">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('airports.update', $airport->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="iata_code">Kode Bandara(3 huruf)</label>
                <input type="text" id="iata_code" name="iata_code" value="{{ old('iata_code', $airport->iata_code) }}" maxlength="3" required>
            </div>

            <div class="form-group">
                <label for="name">Nama Bandara</label>
                <input type="text" id="name" name="name" value="{{ old('name', $airport->name) }}" required>
            </div>

            <div class="form-group">
                <label for="city">Kota</label>
                <input type="text" id="city" name="city" value="{{ old('city', $airport->city) }}" required>
            </div>

            <div class="form-group">
                <label for="country">Negara</label>
                <select name="country" id="country" required>
                    <option value="">-- Pilih Negara --</option>
                    @foreach($countries as $code => $name)
                        <option value="{{ $code }}" {{ (old('country', $airport->country) == $code) ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Gambar Bandara (opsional saat edit, tapi wajib jika ingin ganti)</label>
                <input type="file" id="image" name="image" accept="image/*">
                @if($airport->image)
                    <div class="image-preview">
                        <img src="{{ asset('images/airports/' . $airport->image) }}" alt="Gambar Bandara">
                    </div>
                @endif
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-save">💾 Simpan Perubahan</button>
                <a href="{{ route('airports.index') }}" class="btn btn-cancel">❌ Batal</a>
            </div>
        </form>
    </div>
</body>
</html>