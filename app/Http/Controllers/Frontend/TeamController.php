<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(12);
        return view('frontend.team', compact('teams'));
    }

    public function show($slug)
    {
        $team = Team::where('slug', $slug)->first();

        if (!$team) {
            \Log::error("Team not found for slug: " . $slug); // Add this line
            return redirect()->route('teams.index')->with('error', 'Team not found.');
        }

        return view('frontend.team-details', compact('team'));
    }
}
