<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursi - Garuda Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Sama seperti create.blade.php */
        body { font-family: 'Poppins', sans-serif; background: #f8f9fa; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        h1 { color: #003B6D; text-align: center; margin-bottom: 20px; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; font-weight: 500; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; }
        button { background: #003B6D; color: white; border: none; padding: 12px 20px; border-radius: 6px; cursor: pointer; font-weight: 600; }
        button:hover { background: #002a50; }
        .btn-back { background: #6c757d; display: inline-block; margin-top: 10px; text-decoration: none; padding: 8px 16px; font-size: 14px; }
        .alert { padding: 12px; margin: 15px 0; border-radius: 6px; }
        .alert-success { background: #d4edda; color: #155724; }
        .btn-delete { background: #dc3545; }
        .btn-delete:hover { background: #c82333; }
    </style>
</head>
<body>
    <div class="container">
        <h1>✏️ Edit Kursi: {{ $seat->seat_code }}</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('flight_seat.update', $seat) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="flight_number">Nomor Penerbangan</label>
                <input type="text" id="flight_number" name="flight_number" value="{{ old('flight_number', $seat->flight_number) }}" required>
            </div>

            <div class="form-group">
                <label for="seat_row">Baris Kursi</label>
                <select id="seat_row" name="seat_row" required>
                    <option value="">-- Pilih Baris --</option>
                    <option value="A" {{ old('seat_row', $seat->seat_row) == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('seat_row', $seat->seat_row) == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('seat_row', $seat->seat_row) == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('seat_row', $seat->seat_row) == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('seat_row', $seat->seat_row) == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('seat_row', $seat->seat_row) == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="seat_number">Nomor Kursi</label>
                <input type="number" id="seat_number" name="seat_number" min="1" max="10" value="{{ old('seat_number', $seat->seat_number) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="available" {{ old('status', $seat->status) == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="booked" {{ old('status', $seat->status) == 'booked' ? 'selected' : '' }}>Terisi</option>
                </select>
            </div>

            <div class="form-group">
                <label for="passenger_name">Nama Penumpang</label>
                <input type="text" id="passenger_name" name="passenger_name" value="{{ old('passenger_name', $seat->passenger_name) }}">
            </div>

            <div class="form-group">
                <label for="passenger_email">Email Penumpang</label>
                <input type="email" id="passenger_email" name="passenger_email" value="{{ old('passenger_email', $seat->passenger_email) }}">
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit">Perbarui Kursi</button>
                <a href="{{ route('flight_seat.index') }}" class="btn-back">Batal</a>
                <form method="POST" action="{{ route('flight_seat.destroy', $seat) }}" onsubmit="return confirm('Yakin ingin hapus kursi ini?')" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Hapus Kursi</button>
                </form>
            </div>
        </form>
    </div>
</body>
</html>