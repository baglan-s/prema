@extends('layouts.custom')


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
                            @if(isset($teams))
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