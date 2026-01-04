@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Airline</h1>

    <form action="{{ route('airlines.php') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-2">Save</button>
    </form>
</div>
@endsection
