<!-- resources/views/flight_class/edit.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; padding: 0;">
    <div style="
        background: white;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12), 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #f0f0f0;
        position: relative;
        overflow: hidden;
    ">
        <!-- Garuda accent bar -->
        <div style="height: 6px; background: linear-gradient(to right, #C6001E, #e60026); margin: -30px -30px 24px -30px;"></div>

        <h2 style="text-align: center; margin-bottom: 24px; color: #222; font-weight: 700; font-size: 24px;">
            <span style="color: #C6001E;">✏️</span> Edit Kelas Penerbangan
        </h2>

        <form action="{{ route('flight_class.update', $flightClass->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Nama Kelas</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $flightClass->name) }}"
                       required
                       style="
                           width: 100%;
                           padding: 12px 16px;
                           border: 1px solid #ddd;
                           border-radius: 10px;
                           font-size: 16px;
                           transition: all 0.3s ease;
                           box-shadow: 0 2px 4px rgba(0,0,0,0.03);
                       "
                       onfocus="this.style.borderColor='#C6001E'; this.style.boxShadow='0 0 0 3px rgba(198, 0, 30, 0.15)';"
                       onblur="this.style.borderColor='#ddd'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.03)';">
            </div>

            <div style="margin-bottom: 24px;">
                <label for="description" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Deskripsi</label>
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    style="
                        width: 100%;
                        padding: 12px 16px;
                        border: 1px solid #ddd;
                        border-radius: 10px;
                        font-size: 15px;
                        resize: vertical;
                        transition: all 0.3s ease;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.03);
                    "
                    onfocus="this.style.borderColor='#C6001E'; this.style.boxShadow='0 0 0 3px rgba(198, 0, 30, 0.15)';"
                    onblur="this.style.borderColor='#ddd'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.03)';"
                >{{ old('description', $flightClass->description) }}</textarea>
            </div>

            <div style="text-align: center; display: flex; justify-content: center; gap: 14px; margin-top: 10px;">
                <a href="{{ route('flight_class.index') }}"
                   style="
                       padding: 11px 26px;
                       text-decoration: none;
                       background: #f8f9fa;
                       color: #495057;
                       border: 1px solid #dee2e6;
                       border-radius: 10px;
                       font-weight: 600;
                       transition: all 0.25s ease;
                       box-shadow: 0 3px 6px rgba(0,0,0,0.06);
                   "
                   onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 12px rgba(0,0,0,0.1)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 6px rgba(0,0,0,0.06)';">
                    Batal
                </a>

                <button type="submit"
                        style="
                            padding: 11px 26px;
                            background: linear-gradient(to bottom, #C6001E, #a00018);
                            color: white;
                            border: none;
                            border-radius: 10px;
                            font-weight: 600;
                            font-size: 16px;
                            cursor: pointer;
                            transition: all 0.25s ease;
                            box-shadow: 0 4px 8px rgba(198, 0, 30, 0.3);
                        "
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 14px rgba(198, 0, 30, 0.4)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 8px rgba(198, 0, 30, 0.3)';">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection