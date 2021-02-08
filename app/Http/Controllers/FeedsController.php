<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FeedParser\Repository\FeedsTable;

class FeedsController extends Controller
{
    /**
     * Feeds Index Page
     * @param  int  $teamId
     * @return \Illuminate\View\View
     */
    public function index(int $teamId)
    {
        $this->checkAccess($teamId);
        $feed = FeedsTable::getBoth($teamId);
        return view('feeds-index', compact('teamId', 'feed'));
    }

    /**
     * Action for create new feed or update
     * @param  Request $request
     * @param  int     $teamId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, int $teamId)
    {
        $this->checkAccess($teamId);

        $data = [
            'long'  => $request->long,
            'short' => $request->short,
        ];
        $parserUrl = false;

        if ($request->id) {
            $teamFeed = FeedsTable::getBoth($teamId);

			if (! $teamFeed) {
	            return redirect()->route('feeds.index', $teamId)
	                ->with('message', 'Failed to Update Feed! Create the new...')
	                ->with('status', 'danger');
			}

            if ($teamFeed->id != $request->id) {
                abort(403, "Forbidden!");
            }

            $parserUrl = route('parser.index', $teamId);

            $result = FeedsTable::update($teamId, $data);

            if ($result) {
                return redirect()->route('feeds.index', $teamId)
                    ->with('message', sprintf(
                        'Your Feeds Successfully Updated. <a class="ml-2" href="%s">Parse the short feed...</a>',
                        $parserUrl
                    ))
                    ->with('status', 'success');
            }

            return redirect()->route('feeds.index', $teamId)
                ->with('message', 'Failed to Update Feed!')
                ->with('status', 'danger');
        }

        $data['team_id'] = $teamId;
        $result = FeedsTable::create($teamId, $data);

        if ($result) {
            return redirect()->route('feeds.index', $teamId)
                ->with('message', sprintf(
                    'Your New Feed Successfully Created. <a class="ml-2" href="%s">Parse the short feed...</a>',
                    $parserUrl
                ))
                ->with('status', 'success');
        }

        return redirect()->route('feeds.index', $teamId)
            ->with('message', 'Failed to Create New Feed!')
            ->with('status', 'danger');
    }

    /**
     * For access security purpose
     * @param  int    $teamId
     * @return mixed
     */
    protected function checkAccess(int $teamId)
    {
        if (! $user = Auth::user()
            or (! in_array($teamId, $user->teamIds()) && !$user->isAdmin())) {
            abort(403, "Forbidden!");
        }
        return true;
    }

}
