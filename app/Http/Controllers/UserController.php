<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enum\EUserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:superadmin');
    }

    //viewed
    public function index()
    {
        $users = User::sortable(['name', 'username', 'status'])->latest()->filter(request(['search']))->paginate(10);
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
        $this->validate($request, [
            'username' => 'required|min:6|max:20|unique:users',
            'name' => 'required|max:100',
            'password'=> 'required|min:6',
        ]);

        $users = User::find($id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->save();
        
        return redirect('/users')->with('success', 'Data berhasil diupdate!');

    }

    //delete
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('/users')->with('success', 'Data karyawan telah dihapus!');
    }

}
