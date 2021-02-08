@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    {{ __('Dashboard') }}<big>&nbsp;</big>
                </div>
                <div class="card-body">
                    <ul class="navbar-nav ml-auto font-weight-bold">
                        <h6 class="font-weight-bold">Exports Test</h6>
                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                            <a class="nav-link pl-3" href="{{ route('exports.test') }}">Show HTML</a>
                        </li>
                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                            <a class="nav-link pl-3" href="{{ route('exports.test', 'pdf') }}">Show PDF</a>
                        </li>
                        @if (auth()->user() && auth()->user()->isAdmin())
                            <h6 class="mt-4 font-weight-bold">Teams Management</h6>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="{{ route('teams.index') }}">Create or edit your Teams</a>
                            </li>
                        @endif
                        @if(isset($teams))
                            <h6 class="mt-4 font-weight-bold">Feeds Management</h6>
                            @if(count($teams))
                                @foreach($teams as $team)
                                    <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                        <a class="nav-link pl-3" href="{{ route('feeds.index', $team->id) }}">For your team "{{$team->name}}"</a>
                                    </li>
                                @endforeach
                            @else
                                <small>You don't have any company for feeds...</small>
                            @endif
                            <h6 class="mt-4 font-weight-bold">Parsing Offers by Feed</h6>
                            @if(count($teams))
                                @foreach($teams as $team)
                                    <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                        <a class="nav-link pl-3" href="{{ route('parser.index', $team->id) }}">For your team "{{$team->name}}"</a>
                                    </li>
                                @endforeach
                            @else
                                <small>You don't have any active feed...</small>
                            @endif
                            <h6 class="mt-4 font-weight-bold">Offers List</h6>
                            @if(count($teams))
                                @foreach($teams as $team)
                                    <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                        <a class="nav-link pl-3" href="{{ route('offers.index', $team->id) }}">For your team "{{$team->name}}"</a>
                                    </li>
                                @endforeach
                            @else
                                <small>You don't have any offer list...</small>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
