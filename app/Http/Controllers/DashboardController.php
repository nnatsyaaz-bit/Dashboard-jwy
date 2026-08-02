<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $profil = $user->profile;

        $totalProjects   = $user->projects()->count();
        $totalActivities = $user->activities()->count();
        $totalPendidikan = $user->pendidikans()->count();
        $totalKontak     = $user->kontaks()->count();

        $projects   = $user->projects()->latest()->take(5)->get();
        $activities = $user->activities()->latest()->take(5)->get();

        return view('dashboard.view', compact(
            'profil',
            'totalProjects',
            'totalActivities',
            'totalPendidikan',
            'totalKontak',
            'projects',
            'activities'
        ));
    }
}
