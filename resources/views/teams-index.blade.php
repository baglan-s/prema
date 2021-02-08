@extends('layouts.custom')

@section('title', __('Team Managements'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="{{ route('home') }}">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> Team Managements
                </div>
                <div class="card-body">
                    @if($status = session('status'))
                        <x-common.flash-message :status="$status"/>
                    @endif
                    <h5>Create New Team</h5>
                    <form method="POST" action="{{ route('teams.save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="teamName">Team Name</label>
                            <input
                                type="text"
                                name="name"
                                value=""
                                class="form-control"
                                id="teamName"
                            >
                        </div>
                        <div class="form-group">
                            <label for="teamDescription">Team Description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                id="teamDescription"
                                rows="3"
                            ></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Save My Team</button>
                    </form>
                    @if(count($teams) && auth()->user()->isAdmin())
                        <hr>
                        <h5>Edit Exists Team</h5>
                        @foreach($teams as $team)
                            <form method="POST" action="{{ route('teams.save') }}">
                                @csrf
                                <input type="hidden" name="team_id" value="{{ $team->id }}">
                                <div class="form-group">
                                    <label for="teamName_{{ $team->id }}">Team Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ $team->name ?? '' }}"
                                        class="form-control"
                                        id="teamName_{{ $team->id ?? '' }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="teamDescription_{{ $team->id }}">Team Description</label>
                                    <textarea
                                        class="form-control"
                                        name="description"
                                        id="teamDescription_{{ $team->id }}"
                                        rows="3"
                                    >{{ $team->description ?? '' }}</textarea>
                                <button type="submit" class="btn btn-primary mt-3">Save My Team</button>
                            </form>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
