@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h1 class="text-center">Create User</h1>
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 shadow-lg p-4 bg-white rounded">
      <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}">
          @error('name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}">
          @error('email')
        <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone:</label>
          <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone') }}">
          @error('phone')
        <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Role:</label>
          <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
            <option value="">Select Role</option>
            <option value="Developer" {{ old('role') == 'Developer' ? 'selected' : '' }}>Developer</option>
            <option value="Tester" {{ old('role') == 'Tester' ? 'selected' : '' }}>Tester</option>
            <option value="Designer" {{ old('role') == 'Designer' ? 'selected' : '' }}>Designer</option>
          </select>
          @error('role')
        <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address:</label>
          <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
            value="{{ old('address') }}">
          @error('address')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" name="password" id="password"
            class="form-control @error('password') is-invalid @enderror">
          @error('password')
        <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>

        <!-- In create.blade.php or edit.blade.php -->
        <div class="mb-3">
          <label for="image" class="form-label">Profile Image:</label>
          <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
          @error('image')
        <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>


        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Create User</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection