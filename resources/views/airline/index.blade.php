<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Maskapai - Garuda Indonesia Airport</title>
    <style>
        :root {
            --primary: #0066b2;
            --danger: #e53935;
            --success: #43a047;
            --light: #f5f5f5;
            --dark: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            padding: 20px;
            color: var(--dark);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        header {
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
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: white;
            color: var(--primary);
        }

        .btn-primary:hover {
            background: #e3f2fd;
            transform: translateY(-2px);
        }

        .table-container {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f5f9ff;
            color: var(--primary);
            font-weight: 600;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.85rem;
            border-radius: 4px;
        }

        .btn-edit {
            background: #e3f2fd;
            color: var(--primary);
            margin-right: 6px;
        }

        .btn-delete {
            background: #ffebee;
            color: var(--danger);
        }

        .btn-edit:hover {
            background: #bbdefb;
        }

        .btn-delete:hover {
            background: #ffcdd2;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
            font-style: italic;
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th, td {
                width: 100%;
                padding: 12px 15px;
                border: none;
                border-bottom: 1px solid #eee;
            }
            th {
                position: relative;
                padding-left: 50%;
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
        <header>
            <h1>Daftar Maskapai</h1>
            <a href="{{ route('airline.create') }}" class="btn btn-primary">
                + Tambah Maskapai
            </a>
        </header>

        <div class="table-container">
            @if(session('success'))
                <div style="padding: 12px; background: #e8f5e9; color: var(--success); border-radius: 6px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($airlines->isEmpty())
                <div class="empty">
                    Belum ada data maskapai.
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Maskapai</th>
                            <th>Negara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($airlines as $airline)
                            <tr>
                                <td data-label="Kode">{{ $airline->code }}</td>
                                <td data-label="Nama">{{ $airline->name }}</td>
                                <td data-label="Negara">{{ $airline->country ?? '—' }}</td>
                                <td data-label="Aksi">
                                    <a href="{{ route('airline.edit', $airline) }}" class="btn btn-sm btn-edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('airline.destroy', $airline) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus maskapai ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-delete">
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