@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h1 class="text-center">Edit User</h1>
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 shadow-lg p-4 bg-white rounded">
      <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" id="editForm">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
          <span class="text-danger d-none" id="nameError">Name is required.</span>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
          <span class="text-danger d-none" id="emailError">Email is required.</span>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone:</label>
          <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
          <span class="text-danger d-none" id="phoneError">Phone is required.</span>
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Role:</label>
          <select name="role" id="role" class="form-control">
            <option value="">Select Role</option>
            <option value="Developer" {{ old('role', $user->role) == 'Developer' ? 'selected' : '' }}>Developer</option>
            <option value="Tester" {{ old('role', $user->role) == 'Tester' ? 'selected' : '' }}>Tester</option>
            <option value="Designer" {{ old('role', $user->role) == 'Designer' ? 'selected' : '' }}>Designer</option>
          </select>
          <span class="text-danger d-none" id="roleError">Role is required.</span>
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address:</label>
          <input type="text" name="address" id="address" class="form-control"
            value="{{ old('address', $user->address) }}">
          <span class="text-danger d-none" id="addressError">Address is required.</span>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Profile Image (optional):</label>
          <input type="file" name="image" id="image" class="form-control">

          @if ($user->image && file_exists(public_path('userimage/' . $user->image)))
        <div class="mt-2">
        <img src="{{ asset('userimage/' . $user->image) }}" alt="Profile Image" class="img-thumbnail" width="100">
        </div>
      @else
      <span class="text-muted">No image available</span>
    @endif
        </div>


        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-warning">Update User</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('editForm').addEventListener('submit', function (event) {
    let isValid = true;

    // Fields to validate (excluding image)
    const fields = ['name', 'email', 'phone', 'role', 'address'];

    fields.forEach(field => {
      const input = document.getElementById(field);
      const errorSpan = document.getElementById(field + 'Error');

      if (input.value.trim() === '') {
        input.classList.add('is-invalid');
        errorSpan.classList.remove('d-none');
        isValid = false;
      } else {
        input.classList.remove('is-invalid');
        errorSpan.classList.add('d-none');
      }
    });

    if (!isValid) {
      event.preventDefault(); // Stop form submission if validation fails
    }
  });
</script>

@endsection