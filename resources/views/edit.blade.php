@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Airline</h1>

    <form action="{{ route('airlines.update', $airline->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{ $airline->code }}" required>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $airline->name }}" required>
        </div>

        <div class="form-group">
            <label>Logo</label><br>
            <img src="{{ asset('storage/' . $airline->logo) }}" width="100"><br>
            <input type="file" name="logo" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
