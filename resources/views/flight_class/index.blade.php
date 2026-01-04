@section('content')
<div class="container" style="max-width: 1000px; margin: 40px auto; padding: 0;">
    <!-- Header Section -->
    <div style="
        background: #0056b3;
        color: white;
        padding: 20px 30px;
        border-radius: 12px 12px 0 0;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    ">
        <div style="font-size: 28px;">✈️</div>
        <h1 style="font-size: 22px; font-weight: 700; margin: 0;">Garuda Project - Daftar Kelas Penerbangan</h1>
    </div>

    <!-- Content Section -->
    <div style="
        background: white;
        padding: 40px;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #e0e9f0;
        text-align: center;
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    ">

        @if($flightClasses->isEmpty())
            <div style="color: #888; font-style: italic; font-size: 16px;">
                Tidak ada data kelas penerbangan.
            </div>
        @else
            <!-- Jika ada data, bisa ditampilkan tabel di sini -->
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 15px;">
                <thead>
                    <tr style="background: #f8f9fa; border-bottom: 2px solid #ddd;">
                        <th style="padding: 12px 16px; font-weight: 600;">No</th>
                        <th style="padding: 12px 16px; font-weight: 600;">Nama Kelas</th>
                        <th style="padding: 12px 16px; font-weight: 600;">Deskripsi</th>
                        <th style="padding: 12px 16px; font-weight: 600;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($flightClasses as $index => $class)
                    <tr style="border-bottom: 1px solid #eee; transition: background 0.2s;">
                        <td style="padding: 12px 16px;">{{ $index + 1 }}</td>
                        <td style="padding: 12px 16px; font-weight: 600;">{{ $class->name }}</td>
                        <td style="padding: 12px 16px; color: #555;">{{ Str::limit($class->description, 50, '...') }}</td>
                        <td style="padding: 12px 16px;">
                            <a href="{{ route('flight_class.edit', $class->id) }}"
                               style="
                                   padding: 6px 12px;
                                   background: #007bff;
                                   color: white;
                                   text-decoration: none;
                                   border-radius: 6px;
                                   font-size: 14px;
                                   transition: background 0.2s;
                               "
                               onmouseover="this.style.background='#0056b3'"
                               onmouseout="this.style.background='#007bff'">
                                Edit
                            </a>
                            <form action="{{ route('flight_class.destroy', $class->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="
                                            padding: 6px 12px;
                                            background: #dc3545;
                                            color: white;
                                            border: none;
                                            border-radius: 6px;
                                            font-size: 14px;
                                            cursor: pointer;
                                            transition: background 0.2s;
                                            margin-left: 8px;
                                        "
                                        onmouseover="this.style.background='#c82333'"
                                        onmouseout="this.style.background='#dc3545'"
                                        onclick="return confirm('Yakin ingin menghapus kelas ini?')">
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

    <!-- Tombol Tambah -->
    @if($flightClasses->isEmpty())
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('flight_class.create') }}"
               style="
                   padding: 10px 20px;
                   background: #0056b3;
                   color: white;
                   text-decoration: none;
                   border-radius: 8px;
                   font-weight: 600;
                   transition: all 0.25s ease;
                   box-shadow: 0 3px 6px rgba(0, 86, 179, 0.2);
               "
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 12px rgba(0, 86, 179, 0.3)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 6px rgba(0, 86, 179, 0.2)';">
                ➕ Tambah Kelas Penerbangan
            </a>
        </div>
    @endif
</div>
