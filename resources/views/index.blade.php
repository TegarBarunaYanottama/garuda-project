@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Tombol Kembali ke Dashboard -->
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary mb-3">
        ← Kembali ke Dashboard
    </a>

    <h1>Airlines List</h1>
    <a href="{{ route('airlines.create') }}" class="btn btn-primary mb-3">Add New Airline</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($airlines as $airline)
                <tr>
                    <td>{{ $airline->code }}</td>
                    <td>{{ $airline->name }}</td>
                    <td><img src="{{ asset('storage/' . $airline->logo) }}" width="100"></td>
                    <td>
                        <a href="{{ route('airlines.edit', $airline->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('airlines.destroy', $airline->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection