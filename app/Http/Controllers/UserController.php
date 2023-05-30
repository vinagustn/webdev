<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //viewed
    public function index()
    {
        $users = DB::table('users')->paginate(10);
        return view('layouts.register', [
            'users' => $users,
            'tittle' => 'employees'
        ]);
    }

    //registration
    public function store(Request $request)
    {       
        $validatedUser = $request->validate([
            'username' => 'required|min:6|max:20|unique:users',
            'name' => 'required|max:100',
            'password'=> 'required|min:6'
        ]);


        User::create($validatedUser);
        return redirect('/users')->with('success', 'User create successfully!');
       
    }


    //viewed edit page
    public function edit(User $user)
    {
        return view('editLayouts.editEmployee', [
            'user' => $user,
            'tittle' => 'employees'
        ]);
    }

    //edit employee
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->password = $request->password;
        $users->save();
        
        return redirect('/users')->with('success', 'Data berhasil diupdate!');

    }

    //delete
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('/users')->with('success', 'Data telah dihapus!');
    }

}
