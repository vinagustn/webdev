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
    //viewed
    public function index()
    {
        $users = User::sortable(['name', 'username', 'status'])->latest()->filter(request(['search']))->paginate(10);
        $statuses = EUserStatus::cases(); 

        return view('layouts.register', [
            'statuses' => $statuses,
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
        $statuses = EUserStatus::cases();
        return view('editLayouts.editEmployee', [
            'statuses' => $statuses,
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
            'status' => [new Enum(EUserStatus::class)]
        ]);

        $users = User::find($id);
        $users->name = $request->name;
        $users->username = $request->username;
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
