@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h1 class="text-center">Check Audio Duration</h1>

  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 shadow-lg p-4 bg-white rounded">
      <!-- Form to upload an audio file -->
      <form action="{{ route('audio.duration') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="audio" class="form-label">Upload Audio File:</label>
          <input type="file" name="audio" id="audio" class="form-control">
          @error('audio')
        <div class="text-danger mt-2">{{ $message }}</div>
      @enderror
        </div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Check Duration</button>
        </div>
      </form>

      <!-- Display success or error messages -->
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