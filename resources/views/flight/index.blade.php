<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerbangan - Garuda Indonesia Airport</title>
    <style>
        :root {
            --primary: #0066b2;
            --secondary: #004d8c;
            --success: #43a047;
            --danger: #e53935;
            --white: #ffffff;
            --light: #f5f5f5;
            --dark: #333;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: var(--dark);
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        header {
            background: var(--primary);
            color: white;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: white;
            color: var(--primary);
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            background: #f0f7ff;
        }

        .alert-success {
            padding: 14px 20px;
            background: #e8f5e9;
            color: var(--success);
            font-weight: 500;
            border-left: 4px solid var(--success);
            margin: 20px 30px;
            border-radius: 0 8px 8px 0;
        }

        .table-container {
            padding: 20px 30px 30px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            background: #f5f9ff;
            color: var(--secondary);
            font-weight: 600;
            padding: 16px 12px;
            text-align: left;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid #eee;
            color: #444;
        }

        tr:hover {
            background: #f9fbfd;
        }

        .price {
            font-weight: bold;
            color: var(--primary);
        }

        .status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-active {
            background: #e8f5e9;
            color: var(--success);
        }

        .status-inactive {
            background: #ffebee;
            color: var(--danger);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit, .btn-delete {
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-edit {
            background: #e3f2fd;
            color: var(--primary);
        }

        .btn-edit:hover {
            background: #bbdefb;
        }

        .btn-delete {
            background: #ffebee;
            color: var(--danger);
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #ffcdd2;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            h1 {
                justify-content: center;
            }

            .table-container {
                padding: 15px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
                margin-bottom: 15px;
                border-radius: 10px;
                padding: 15px;
                background: white;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            }

            td {
                border: none;
                position: relative;
                padding-left: 50%;
                padding-top: 12px;
                padding-bottom: 12px;
            }

            td:before {
                content: attr(data-label) ": ";
                position: absolute;
                left: 15px;
                width: 45%;
                font-weight: bold;
                color: var(--secondary);
                font-size: 0.9rem;
            }

            .actions {
                justify-content: flex-start;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>✈️ Daftar Penerbangan</h1>
            <a href="{{ route('flight.create') }}" class="btn-create">
                <span>➕</span> Tambah Penerbangan
            </a>
        </header>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            @if($flights->isEmpty())
                <p style="text-align: center; padding: 40px; color: #777; font-style: italic;">
                    Belum ada data penerbangan.
                </p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Maskapai</th>
                            <th>No. Penerbangan</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Berangkat</th>
                            <th>Tiba</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flights as $flight)
                            <tr>
                                <td data-label="ID">{{ $flight->id }}</td>
                                <td data-label="Maskapai">{{ $flight->airline->name ?? '—' }}</td>
                                <td data-label="No. Penerbangan">{{ $flight->flight_number }}</td>
                                <td data-label="Asal">{{ $flight->origin }}</td>
                                <td data-label="Tujuan">{{ $flight->destination }}</td>
                                <td data-label="Berangkat">{{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y H:i') }}</td>
                                <td data-label="Tiba">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M Y H:i') }}</td>
                                <td data-label="Harga" class="price">Rp{{ number_format($flight->base_price, 0, ',', '.') }}</td>
                                <td data-label="Status">
                                    <span class="status {{ $flight->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                        {{ ucfirst($flight->status) }}
                                    </span>
                                </td>
                                <td data-label="Aksi" class="actions">
                                    <a href="{{ route('flight.edit', $flight->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('flight.destroy', $flight->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus penerbangan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>