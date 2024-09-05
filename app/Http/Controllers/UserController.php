<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function loadAllUsers(){
        $all_users=User::with('address')->get();

        return view('users',compact('all_users'));

        //return view('users');
    }
    public function addUsers(){
        return view('add-user');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|max:10',
            'password' => 'required|min:4|max:8',
            'register_date' => 'required|date',
            'address' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'register_date' => $request->register_date,
            'address' => $request->address,
        ];

        //User Create
        $user = User::create($data);
        $userId = $user->id;

        $addressdata = [
            'user_id' => $userId,
            'address' => $request->address
         ];
        //  dd($addressdata);
         $address= Address::create($addressdata);

        return redirect('/add/user')->back()->with('success', 'Student added successfully');
    }

    //update logic
    public function edituser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->users_id,
            'phone_number' => 'required',
            'password' => 'required|min:4|max:8',
            'register_date' => 'required|date',
            'address' => 'required',
        ]);

        // Find the user by ID
        $user = User::find($request->users_id);
        if ($user) {
            // Update user details
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = $request->password;
            $user->register_date = $request->register_date;
            $user->address = $request->address;
            $user->save();

            $address = Address::where('user_id', $user->id)->first();
        if ($address) {
            $address->address = $request->address;
            $address->save();
        } else {

            Address::create([
                'user_id' => $user->id,
                'address' => $request->address,
            ]);
        }
            return redirect()->back()->with('Updated', 'Student data updated successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function editform($id){

        $user = User::find($id);

        if ($user) {
            return view('edit-user', ['user' => $user]);
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function deleteForm($id) {
        $user = User::find($id);
        $userId = Address::find($user->id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('deleted', 'Student Data Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

}
