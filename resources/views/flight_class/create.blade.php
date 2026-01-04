@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; padding: 0;">
    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid #eee;">
        <h2 style="text-align: center; margin-bottom: 24px; color: #222; font-weight: 700; font-size: 24px;">
            <span style="color: #C6001E;">➕</span> Tambah Kelas Penerbangan
        </h2>

        <form action="{{ route('flight_class.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Nama Kelas</label>
                <input type="text" id="name" name="name" required
                       style="width: 100%; padding: 12px 16px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; transition: border-color 0.3s;"
                       onfocus="this.style.borderColor='#C6001E'" onblur="this.style.borderColor='#ddd'">
            </div>

            <div style="margin-bottom: 24px;">
                <label for="description" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Deskripsi (Opsional)</label>
                <textarea id="description" name="description" rows="3"
                          style="width: 100%; padding: 12px 16px; border: 1px solid #ddd; border-radius: 8px; font-size: 15px; resize: vertical; transition: border-color 0.3s;"
                          onfocus="this.style.borderColor='#C6001E'" onblur="this.style.borderColor='#ddd'"></textarea>
            </div>

            <div style="text-align: center; display: flex; justify-content: center; gap: 12px; margin-top: 10px;">
                <a href="{{ route('flight_class.index') }}"
                   style="padding: 10px 24px; text-decoration: none; background: #f1f1f1; color: #333; border-radius: 8px; font-weight: 600; transition: background 0.2s;"
                   onmouseover="this.style.background='#e0e0e0'" onmouseout="this.style.background='#f1f1f1'">
                    Batal
                </a>
                <button type="submit"
                        style="padding: 10px 24px; background: #C6001E; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 16px; transition: background 0.2s;"
                        onmouseover="this.style.background='#a50019'" onmouseout="this.style.background='#C6001E'">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
