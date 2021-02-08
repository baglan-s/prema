<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $teams = Team::all();
        }
        else {
            $teams = Auth::user()->teams;
        }
//        return view('home', compact('teams'));
        return view('custom.home', compact('teams'));
    }

    public function updateDatabase()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            $teams = Team::all();
            return view('custom.update-database', compact('teams'));
        }

        if ($user->teams->count()) {
            $team = $user->teams()->first();
            return redirect()->route('feeds.index', $team->id);
        }

        return view('custom.message-page', ['message' => 'You don\'t have any team yet!']);
    }

    public function createPresentation()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            $teams = Team::all();
            return view('custom.create-presentation', compact('teams'));
        }

        if ($user->teams->count()) {
            $team = $user->teams()->first();
            return redirect()->route('offers.index', $team->id);
        }

        return view('custom.message-page', ['message' => 'You don\'t have any team yet!']);
    }

    public function newPresentation()
    {
        return view('custom.new-presentation');
    }
}
