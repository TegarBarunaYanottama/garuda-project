<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Maskapai - {{ $airline->name }}</title>
    <style>
        :root {
            --primary: #0066b2;
            --secondary: #004d8c;
            --white: #ffffff;
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
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .header {
            background: var(--primary);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-size: 1.8rem;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .btn-edit {
            background: #ffeb3b;
            color: #333;
            margin-right: 10px;
        }

        .btn-delete {
            background: #e53935;
            color: white;
        }

        .btn-edit:hover {
            background: #ffc107;
        }

        .btn-delete:hover {
            background: #c62828;
        }

        .content {
            padding: 30px;
        }

        .detail-item {
            display: flex;
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            border-left: 4px solid var(--primary);
        }

        .detail-label {
            font-weight: bold;
            width: 150px;
            color: var(--secondary);
        }

        .detail-value {
            flex: 1;
        }

        .actions {
            margin-top: 30px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .detail-item {
                flex-direction: column;
            }
            .detail-label {
                width: 100%;
                margin-bottom: 5px;
            }
            td:before {
                content: attr(data-label) ": ";
                font-weight: bold;
                float: left;
                width: 45%;
                color: var(--primary);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✈️ {{ $airline->name }}</h1>
            <div>
                <a href="{{ route('airline.edit', $airline->id) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('airline.destroy', $airline->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus maskapai ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Hapus</button>
                </form>
                <a href="{{ route('airline.index') }}" class="btn btn-back">← Kembali</a>
            </div>
        </div>

        <div class="content">
            <div class="detail-item">
                <div class="detail-label">Kode Maskapai:</div>
                <div class="detail-value">{{ $airline->code }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Negara Asal:</div>
                <div class="detail-value">{{ $airline->country ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Dibuat pada:</div>
                <div class="detail-value">{{ $airline->created_at->format('d M Y H:i') }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Diupdate pada:</div>
                <div class="detail-value">{{ $airline->updated_at->format('d M Y H:i') }}</div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('airline.index') }}" class="btn btn-back">← Kembali ke Daftar Maskapai</a>
        </div>
    </div>
</body>
</html>