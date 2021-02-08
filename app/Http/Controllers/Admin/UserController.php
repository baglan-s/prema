<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Все пользователи',
            'users' => User::paginate(20),
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Addition of new user',
            'roles' => Role::all(),
            'teams' => Team::all(),
        ];

        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validated();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        $user->status = $data['status'];
        $user->password = Hash::make($data['status']);

        if ($user->save()) {
            if (isset($data['team_ids']) && !empty($data['team_ids'])) {
                foreach ($data['team_ids'] as $team_id) {
                    $user->teams()->attach($team_id);
                }
            }
            $request->session()->flash('msg_success', 'Data has been added successfully!');
        }
        else {
            $request->session()->flash('msg_error', 'Error! Please try later.');
        }

        return redirect()->route('user.index');
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
        $user = User::findOrFail($id);
        $data = [
            'title' => 'Editing ' . $user->name,
            'roles' => Role::all(),
            'teams' => Team::all(),
            'user' => $user
        ];

        return view('admin.user.edit', $data);
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
        $user = User::findOrFail($id);
        $data = $this->validator($request->all(), $user->id)->validated();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        $user->status = $data['status'];
        if (isset($data['password'])) $user->password = Hash::make($data['password']);

        $user->teams()->detach();
        if (isset($data['team_ids']) && !empty($data['team_ids'])) {
            foreach ($data['team_ids'] as $team_id) {
                $user->teams()->attach($team_id);
            }
        }

        if ($user->save()) {
            $request->session()->flash('msg_success', 'Data has been changed successfully!');
        }
        else {
            $request->session()->flash('msg_error', 'Error! Please try later');
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->teams->count()) {
            $user->teams()->detach();
        }

        if ($user->delete()) {
            $request->session()->flash('msg_success', 'Data has been deleted successfully!');
        }
        else {
            $request->session()->flash('msg_error', 'Error! Please try later.');
        }

        return redirect()->route('user.index');
    }

    protected function validator(array $data, $user_id = false)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'integer', 'max:10'],
            'status' => ['required', 'string', 'max:20'],
            'team_ids' => [],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        if ($user_id) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user_id];
            $rules['password'] = ['nullable'];
        }
        return Validator::make($data, $rules);
    }
}
