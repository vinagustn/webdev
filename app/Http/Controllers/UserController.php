<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enum\EUserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //viewed
    public function index()
    {
        $statuses = EUserStatus::cases();
        $users = DB::table('users')->latest()->paginate(10);
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
            'password'=> 'required|min:6',
            'status' => [new Enum(EUserStatus::class)]
        ]);


        User::create($validatedUser);
        return redirect('/users')->with('success', 'User create successfully!');
       
    }


    //viewed edit page
    public function edit($id)
    {
        $users = User::find($id);
        return view('editLayouts.editEmployee', [
            'users' => $users,
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
        $users->status = $request->status;
        $users->save();
        
        return redirect('/users')->with('success', 'Data berhasil diupdate!');

    }

    //delete
    // public function destroy($id)
    // {
    //     User::where('id',$id)->delete();
    //     return redirect('/users')->with('success', 'Data telah dihapus!');
    // }

}
