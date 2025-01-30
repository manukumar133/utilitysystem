@extends('layouts.app')

@section('content')
<div class="container">
  <h1>User List</h1>

  <div class="d-flex justify-content-between mb-3">
    <a href="{{ route('users.create') }}" class="btn btn-primary mt-1">Add User</a>

    <div>
      <a href="{{ route('users.export') }}" class="btn btn-success mt-1 ms-1">Export as CSV</a>
      <a href="{{ route('users.exportPdf') }}" class="btn btn-danger mt-1 ms-1">Export as PDF</a>
    </div>
  </div>

  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
      <td>
        @if ($user->image && file_exists(public_path('userimage/' . $user->image)))
      <img src="{{ asset('userimage/' . $user->image) }}" alt="User Image"
      style="width: 50px; height: 50px; border-radius: 50%;">
    @else
    <span>No Image</span>
  @endif
      </td>


      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->role }}</td>
      <td>{{ $user->address }}</td>
      <td>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm mt-2">Edit</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm mt-2"
          onclick="return confirm('Are you sure want to delete')">Delete</button>
        </form>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection