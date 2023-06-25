<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Birth;
use App\Models\Health;
use App\Models\Breeding;
use App\Models\Marriage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        //breedings
        $breedings = Breeding::all()->count();
        $male = Breeding::where('gender', 'Jantan')->count();
        $female = Breeding::where('gender', 'Betina')->count();

        //users
        $users = User::where('role', 'karyawan')->count();
        $isActive = User::where('role', 'karyawan')->where('status', 'active')->count();
        $isInactive = User::where('role', 'karyawan')->where('status', 'Inactive')->count();

        //marriages
        $marriages = Marriage::all()->count();
        $isProcess = Marriage::where('status', 'Proses')->count();
        $isPregnant = Marriage::where('status', 'Hamil')->count();
        $isUnpreg = Marriage::where('status', 'Tidak Hamil')->count();

        //births
        $births = Birth::all()->count();
        $january = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',1)->count();
        $february = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',2)->count();
        $march = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',3)->count();
        $april = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',4)->count();
        $may = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',5)->count();
        $june = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',6)->count();
        $july = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',7)->count();
        $august = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',8)->count();
        $sept = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir', 9)->count();
        $oct = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',10)->count();
        $nov = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',11)->count();
        $dec = Birth::whereYear('tgl_lahir', 2023)
                        ->whereMonth('tgl_lahir',12)->count();

        //healthiness
        $healths = Health::all()->count();
        // $counts = Health::select('id_ternak')
        //         ->selectRaw('count(id_ternak) as qty')
        //         ->groupBy('id_ternak')
        //         ->get();
        $counts = DB::table('healths')
                    ->select('id_ternak', DB::raw('count(id_ternak) as qty'))
                    ->groupBy('id_ternak')
                    ->havingRaw('count(id_ternak) >= 1')
                    ->get();
        
        return view('superadmin.dashboard', [
            'tittle' => 'dashboard',
            'alluser' => $users,

            'breed' => $breedings,
            'male' => $male,
            'female' => $female,

            'marriages' => $marriages,
            'isProcess' => $isProcess,
            'isPregnant' => $isPregnant,
            'isUnpreg' => $isUnpreg,

            'births' => $births,
            'jan' => $january,
            'feb' => $february,
            'march' => $march,
            'apr' => $april,
            'may' => $may,
            'jun' => $june,
            'jul' => $july,
            'aug' => $august,
            'sept' => $sept,
            'oct' => $oct,
            'nov' => $nov,
            'dec' => $dec,

            'healths' => $healths,
            'counts' => $counts
        ]);
    }
}
