<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Birth;
use App\Models\Health;
use App\Models\Breeding;
use App\Models\Marriage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        //breedings
        $breedings = Breeding::all()->count();
        $male = Breeding::where('gender', 'Jantan')->count();
        $female = Breeding::where('gender', 'Betina')->count();

        //users
        $users = User::where('role', 'admin')->count();
        $isActive = User::where('role', 'admin')->where('status', 'active')->count();
        $isInactive = User::where('role', 'admin')->where('status', 'Inactive')->count();
        // $dataPoints = array(
        //     array('label' => 'Active', 'y' => $isActive),
        //     array('label' => 'Inactive', 'y' => $isInactive)
        // );

        //marriages
        $marriages = Marriage::all()->count();
        $isProcess = Marriage::where('status', 'Proses')->count();
        $isPregnant = Marriage::where('status', 'Hamil')->count();
        $isUnpreg = Marriage::where('status', 'Tidak Hamil')->count();
        // $dataPoints = array(
        //     array('label' => 'Proses', 'y' => $isProcess),
        //     array('label' => 'Hamil', 'y' => $isPregnant),
        //     array('label' => 'Tidak Hamil', 'y' => $isUnpreg)
        // );

        //births
        $births = Birth::all()->count();

        //healthiness
        $healths = Health::all()->count();
        return view('superadmin.dashboard', [
            'tittle' => 'dashboard',
            'alluser' => $users,
            'isActive' => $isActive,
            'isInactive' => $isInactive,

            'breed' => $breedings,

            'marriages' => $marriages,
            'isProcess' => $isProcess,
            'isPregnant' => $isPregnant,
            'isUnpreg' => $isUnpreg,

            'births' => $births,

            'healths' => $healths,

            // 'dataPoints' => $dataPoints
        ]);
    }
}
