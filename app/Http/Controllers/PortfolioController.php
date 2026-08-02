<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $profil  = Auth::user()->profile;
        $kontaks = Auth::user()->kontaks()->latest()->get();

        return view('portofolio.index', compact('profil', 'kontaks'));
    }

    public function about()
    {
        $profil            = Auth::user()->profile;
        $pendidikanTerakhir = Auth::user()->pendidikans()->latest()->first();
        $projectTerbaru     = Auth::user()->projects()->latest()->first();
        $totalProjects      = Auth::user()->projects()->count();

        return view('portofolio.about', compact('profil', 'pendidikanTerakhir', 'projectTerbaru', 'totalProjects'));
    }

    public function biodata()
    {
        $profil = Auth::user()->profile;

        return view('portofolio.biodata', compact('profil'));
    }

    public function pendidikan()
    {
        $profil      = Auth::user()->profile;
        $pendidikans = Auth::user()->pendidikans()->latest()->get();

        return view('portofolio.pendidikan', compact('profil', 'pendidikans'));
    }

    public function project()
    {
        $profil   = Auth::user()->profile;
        $projects = Auth::user()->projects()->latest()->get();

        return view('portofolio.project', compact('profil', 'projects'));
    }

    public function activity()
    {
        $profil          = Auth::user()->profile;
        $totalActivities = Auth::user()->activities()->count();

        return view('portofolio.activity', compact('profil', 'totalActivities'));
    }

    public function activityDetail()
    {
        $profil     = Auth::user()->profile;
        $activities = Auth::user()->activities()->latest()->get();

        return view('portofolio.activity-detail', compact('profil', 'activities'));
    }
}
