<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;

class TeamsController extends Controller
{
    /**
     * Teams Index Page
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $teams  = $user->teams()->get();
        return view('teams-index', compact('teams'));
    }

    /**
     * Action to update or create new team
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        if ($teamId = $request->team_id) {
            $this->checkAccess($teamId);
        }

        $teamName = $request->name ?? 'No Name Company';

        if ($teamId) {
            $team = Team::findOrFail($teamId);
            $team->name        = $teamName;
            $team->description = $request->description;
            $team->save();

            return redirect()->route('teams.index')
                ->with('message', sprintf('Your Team "%s" Successfully Updates.', $teamName))
                ->with('status', 'success');
        }

        $team = new Team;
        $team->user_id     = Auth::user()->id;
        $team->name        = $teamName;
        $team->description = $request->description;
        $team->save();
        Auth::user()->teams()->attach($team->id);
        return redirect()->route('teams.index')
            ->with('message', sprintf('New Team "%s" Successfully Created.', $teamName))
            ->with('status', 'success');
    }

    /**
     * For access security purpose
     * @param  int    $teamId
     * @return mixed
     */
    protected function checkAccess(int $teamId)
    {
        if (! $user = Auth::user()
            or ! in_array($teamId, $user->teamIds())) {
            abort(403, "Forbidden!");
        }
        return true;
    }

}
