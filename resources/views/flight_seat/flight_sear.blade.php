<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Seat - Garuda Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f5ff;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #003B6D;
            font-size: 28px;
            margin: 0;
        }

        .header p {
            color: #666;
            font-size: 16px;
        }

        .seat-layout {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .seat-label {
            font-weight: bold;
            width: 20px;
            text-align: center;
            color: #003B6D;
        }

        .seat {
            width: 40px;
            height: 40px;
            border: 2px solid #ccc;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .seat.available {
            background: #e6f7ff;
            border-color: #007bff;
            color: #007bff;
        }

        .seat.booked {
            background: #ffcccc;
            border-color: #cc0000;
            color: #cc0000;
            cursor: not-allowed;
        }

        .seat.selected {
            background: #ffe066;
            border-color: #ff9900;
            color: #333;
        }

        .legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        .legend-available { background: #e6f7ff; border: 1px solid #007bff; }
        .legend-booked { background: #ffcccc; border: 1px solid #cc0000; }
        .legend-selected { background: #ffe066; border: 1px solid #ff9900; }

        .form-group {
            margin: 20px 0;
            text-align: center;
        }

        .form-group input {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 200px;
        }

        .btn-reserve {
            display: inline-block;
            padding: 12px 40px;
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

        .btn-reserve:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.5);
            background: linear-gradient(135deg, #FFE033 0%, #FFD000 100%);
        }

        .btn-reserve:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .alert {
            padding: 12px;
            margin: 15px 0;
            border-radius: 8px;
            text-align: center;
        }

        .alert-success { background: #d4edda; color: #155724; }
        .alert-error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✈️ Flight Seat Selection</h1>
            <p>Pilih kursi Anda untuk penerbangan GA 123 • Jakarta → Denpasar</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('flight_seat.store') }}">
            @csrf

            <input type="hidden" id="selected_seat_id" name="seat_id" required>

            <div class="seat-layout">
                @php
                    $rows = ['A','B','C','D','E','F'];
                    $numbers = [1,2,3,4,5];
                @endphp

                @foreach($rows as $row)
                    <div class="row">
                        <div class="seat-label">{{ $row }}</div>
                        @foreach($numbers as $num)
                            @php
                                $seat = $seats->firstWhere('seat_code', $row . $num);
                            @endphp
                            @if($seat)
                                <div 
                                    class="seat {{ $seat->status }} {{ old('seat_id') == $seat->id ? 'selected' : '' }}"
                                    data-id="{{ $seat->id }}"
                                    data-status="{{ $seat->status }}"
                                    onclick="selectSeat(this)"
                                >
                                    {{ $num }}
                                </div>
                            @else
                                <div class="seat booked" style="cursor: not-allowed;">
                                    {{ $num }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="legend">
                <div class="legend-item"><div class="legend-color legend-available"></div> Tersedia</div>
                <div class="legend-item"><div class="legend-color legend-booked"></div> Terisi</div>
                <div class="legend-item"><div class="legend-color legend-selected"></div> Dipilih</div>
            </div>

            <div class="form-group">
                <input type="text" name="passenger_name" placeholder="Nama Lengkap" value="{{ old('passenger_name') }}" required>
                <input type="email" name="passenger_email" placeholder="Email" value="{{ old('passenger_email') }}" required>
            </div>

            <button type="submit" class="btn-reserve" id="reserve-btn" disabled>
                Reservasi Kursi
            </button>
        </form>
    </div>

    <script>
        let selectedSeat = null;
        const reserveBtn = document.getElementById('reserve-btn');
        const seatIdInput = document.getElementById('selected_seat_id');

        function selectSeat(seatElement) {
            if (seatElement.classList.contains('booked')) {
                alert('Kursi ini sudah dipesan!');
                return;
            }

            // Hapus selected dari semua
            document.querySelectorAll('.seat').forEach(s => s.classList.remove('selected'));
            // Tambahkan ke yang dipilih
            seatElement.classList.add('selected');
            selectedSeat = seatElement.dataset.id;
            seatIdInput.value = selectedSeat;
            reserveBtn.disabled = false;
        }
    </script>
</body>
</html>