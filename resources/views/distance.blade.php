@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h1 class="text-center">Calculate Distance</h1>
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 shadow-lg p-4 bg-white rounded">
      <!-- Form to input latitude and longitude -->
      <form action="{{ route('distance.calculate') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="latitude1" class="form-label">Latitude 1:</label>
          <input type="text" name="latitude1" id="latitude1" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="longitude1" class="form-label">Longitude 1:</label>
          <input type="text" name="longitude1" id="longitude1" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="latitude2" class="form-label">Latitude 2:</label>
          <input type="text" name="latitude2" id="latitude2" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="longitude2" class="form-label">Longitude 2:</label>
          <input type="text" name="longitude2" id="longitude2" class="form-control" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-success">Calculate Distance</button>
        </div>
      </form>

      @if (session('success'))
      <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

      @if (session('error'))
      <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    </div>
  </div>
</div>
@endsection