<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function loadAllUsers(){
        $all_users=User::all();
        return view('users',compact('all_users'));
    }
    public function addUsers(){
        return view('add-user');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'password' => 'required|min:4|max:8',
            'register_date' => 'required|date',
        ]);

        // Create the user data array without double array brackets
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'register_date' => $request->register_date,
        ];

        // Create the user
        $user = User::create($data);

        return redirect()->back()->with('success', 'Student added successfully');
    }

    //update form logic
    public function edituser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->user_id,
            'phone_number' => 'required',
            'password' => 'required|min:4|max:8',
            'register_date' => 'required|date',
        ]);

        // Find the user by ID
        $user = User::find($request->user_id);

        if ($user) {
            // Update user details
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = $request->password;
            $user->register_date = $request->register_date;
            $user->save();

            return redirect()->back()->with('Updated', 'Student data updated successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function editform($id){
        // Retrieve the user by ID
        $user = User::find($id);

        // Check if the user exists
        if ($user) {
            // Return the form view with the user data
            return view('edit-user', ['user' => $user]);
        } else {
            // If the user is not found, redirect back with an error message
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function deleteForm($id) {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('deleted', 'Student Data Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

}
