<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function userList(){
       $users = User::where('status', 'pending')->get();
       return view('admin-dashboard', compact('users'));
   }

    public function userDelete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function approveUser($id){
        User::where('id', $id)->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'User status updated to approved successfully.');
    }

    public function userDashboard(){
        return view('user-dashboard');
    }

    public function unapproved(){
        return view('unapproved');
    }


}
