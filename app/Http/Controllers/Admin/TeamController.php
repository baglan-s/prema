<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Template;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Teams list',
            'teams' => Team::paginate(20),
        ];

        return view('admin.team.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Addition of new team',
            'users' => User::all(),
            'templates' => Template::all(),
        ];
        return view('admin.team.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has(['name'])) {
            $team = new Team();
            $team->name = $request->name;

            if ($request->has('description')) {
                $team->description = $request->description;
            }
            if ($request->has('status')) {
                $team->status = $request->status;
            }

            if ($team->save()) {
                $request->session()->flash('msg_success', 'Data has been added successfully!');

                if ($request->has('user_ids') && !empty($request->user_ids)) {
                    foreach ($request->user_ids as $userId) {
                        $team->users()->attach($userId);
                    }
                }

                if ($request->has('template_ids') && !empty($request->template_ids)) {
                    foreach ($request->template_ids as $templateId) {
                        $team->templates()->attach($templateId);
                    }
                }
            }
            else {
                $request->session()->flash('msg_error', 'Error! Please try later');
            }
        }

        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);

        $data = [
            'title' => 'Editing ' . $team->name,
            'team' => $team,
            'users' => User::all(),
            'templates' => Template::all(),
        ];

        return view('admin.team.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        if ($request->has(['name'])) {
            $team->name = $request->name;

            if ($request->has('description')) {
                $team->description = $request->description;
            }
            if ($request->has('status')) {
                $team->status = $request->status;
            }

            if ($team->save()) {
                $request->session()->flash('msg_success', 'Data has been changed successfully!');

                $team->users()->detach();
                if ($request->has('user_ids') && !empty($request->user_ids)) {
                    foreach ($request->user_ids as $userId) {
                        $team->users()->attach($userId);
                    }
                }

                $team->templates()->detach();
                if ($request->has('template_ids') && !empty($request->template_ids)) {
                    foreach ($request->template_ids as $templateId) {
                        $team->templates()->attach($templateId);
                    }
                }
            }
            else {
                $request->session()->flash('msg_error', 'Error! Please try later');
            }
        }

        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        if ($team->users->count()) {
            $team->users()->detach();
        }

        if ($team->templates->count()) {
            $team->templates()->detach();
        }

        if ($team->delete()) {
            $request->session()->flash('msg_success', 'Data has been deleted successfully!');
        }
        else {
            $request->session()->flash('msg_error', 'Error! Please try later');
        }

        return redirect()->route('team.index');
    }
}
