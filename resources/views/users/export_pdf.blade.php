<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List PDF</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <h1>User List</h1>
  <table>
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
      <td>
        @if(file_exists($user->imagePath))
      <img src="{{ $user->imagePath }}" alt="Profile Image" class="img-thumbnail"
      style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd;">
    @else
    <img src="{{ public_path('userimage/default.jpg') }}" alt="Default Image"
    style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd;">
  @endif
      </td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->role }}</td>
      <td>{{ $user->address }}</td>
      </tr>
    @endforeach

    </tbody>
  </table>
</body>

</html>