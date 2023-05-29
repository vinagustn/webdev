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
    public function edit(User $users)
    {
        return view('layouts.editEmployee', [
            'users' => $users,
            'tittle' => 'employees'
        ]);
    }

    //edit employee
    public function update(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password
        ]);
        
        return redirect('/users');

    }

    //delete
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('/users')->with('success', 'Data telah dihapus');
    }

}
