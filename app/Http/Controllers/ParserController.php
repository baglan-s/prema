<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FeedParser\Repository\FeedsTable;
use App\Services\FeedParser\FeedParserService as Parser;

class ParserController extends Controller
{
    /**
     * Parser Index Page
     * @param  int  $teamId
     * @return \Illuminate\View\View
     */
    public function index(int $teamId)
    {
        $this->checkAccess($teamId);
        $feed = FeedsTable::getBoth($teamId);
        return view('parser-index', compact('feed', 'teamId'));
    }

    /**
     * Start the parsing process
     * @param  Request $request
     * @param  int     $teamId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function parse(Request $request, int $teamId)
    {
        $this->checkAccess($teamId);

        $result = Parser::make($teamId, 'short');

        return redirect()->route('parser.index', $teamId)
            ->with('message', $result['message'])
            ->with('status', $result['status']);
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
