<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
  // Display all users
  public function index()
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }

  // Show create user form
  public function create()
  {
    return view('users.create');
  }

  // Store new user
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|regex:/^[a-zA-Z\s]+$/u',
      'email' => 'required|email|unique:users',
      'phone' => 'required|digits:10',
      'role' => 'required',
      'password' => 'required|min:8',
      'address' => 'required|string|max:255',
      'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->role = $request->role;
    $user->address = $request->address;
    $user->password = Hash::make($request->password);

    if ($request->hasFile('image')) {
      $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
      $request->file('image')->move(public_path('userimage'), $imageName); // Save image in public/userimage folder
      $user->image = $imageName; // Store the image name in the database
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'User added successfully!');
  }
  // Show edit user form
  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
  }
  // Update user information
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|regex:/^[a-zA-Z\s]+$/u',
      'email' => 'required|email|unique:users,email,' . $id,
      'phone' => 'required|digits_between:10,12',
      'role' => 'required',
      'address' => 'nullable|string|max:255',
      'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->role = $request->role;
    $user->address = $request->address;

    if ($request->password) {
      $user->password = Hash::make($request->password);
    }

    if ($request->hasFile('image')) {
      if ($user->image && file_exists(public_path('userimage/' . $user->image))) {
        unlink(public_path('userimage/' . $user->image));
      }

      $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
      $request->file('image')->move(public_path('userimage'), $imageName);
      $user->image = $imageName;
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
  }


  // Delete a user from the database
  public function destroy($id)
  {
    $user = User::findOrFail($id);

    if ($user->image && file_exists(public_path('userimage/' . $user->image))) {
      unlink(public_path('userimage/' . $user->image));
    }

    $user->forceDelete();

    return redirect()->route('users.index')->with('success', 'User deleted permanently!');
  }

  // Export users data to CSV
  public function export()
  {
    $users = User::all(['name', 'email', 'phone', 'role', 'address', 'image']);
    $fileName = 'users_' . now()->format('Y-m-d_H-i-s') . '.csv';

    $handle = fopen('php://output', 'w');
    fputcsv($handle, ['Name', 'Email', 'Phone', 'Role', 'Address', 'Image']);
    foreach ($users as $user) {
      $image = $user->image ? asset('userimage/' . $user->image) : asset('userimage/default.jpg');
      fputcsv($handle, [
        $user->name,
        $user->email,
        $user->phone,
        $user->role,
        $user->address,
        $image
      ]);
    }

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Pragma: no-cache');
    header('Expires: 0');

    fclose($handle);
    exit();
  }

  public function exportPdf()
  {
    $users = User::all(['name', 'email', 'phone', 'role', 'address', 'image']);
    $pdf = Pdf::loadView('users.export_pdf', compact('users'));

    foreach ($users as $user) {
      if ($user->image) {
        $imagePath = public_path('userimage/' . $user->image);
        if (file_exists($imagePath)) {
          $user->imagePath = $imagePath;
        } else {
          $user->imagePath = public_path('userimage/default.jpg');
        }
      } else {
        $user->imagePath = public_path('userimage/default.jpg');
      }
    }

    return $pdf->download('users_' . now()->format('Y-m-d_H-i-s') . '.pdf');
  }
}
