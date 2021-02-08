@extends('layouts.custom')

@section('title', __('Parsing Offers By Feeds'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="{{ route('home') }}">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> {{ __('Parsing Offers By Feeds') }}
                </div>
                <div class="card-body">
                    @if($status = session('status'))
                        <x-common.flash-message :status="$status"/>
                    @endif
                    <div class="my-4">
                        <h6 class="font-weight-bold">Currentrly we have the next active feeds</h5>
                         <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Long Feed:</b>
                                @if(! empty($feed->long))
                                    {{ $feed->long }}
                                @else
                                    Not defined yet.
                                    <a class="col-2 text-md-center" href="{{ route('feeds.index', $teamId) }}">Add New</a>
                                @endif
                                @if(! empty($feed->long) and ! empty($feed->long_end))
                                    <span class="p-2 badge badge-dark badge-pill">Last usage: {{ $feed->long_end }}</span>
                                @endif
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Short Feed:</b>
                                @if(! empty($feed->short))
                                    {{ $feed->short }}
                                @else
                                    Not defined yet.
                                    <a class="col-2 text-md-center" href="{{ route('feeds.index', $teamId) }}">Add New</a>
                                @endif
                                @if(! empty($feed->short) and ! empty($feed->short_end))
                                    <span class="p-2 badge badge-dark badge-pill">Last usage: {{ $feed->short_end }}</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <form method="POST" action="{{ route('parser.parse', $teamId) }}">
                        @csrf
                        <input type="hidden" name="feed_type" value="__short">
                        <label class="d-block my-3" for="parseFeedBtn">Using the current short feed you may refresh the offers data.</label>
                        <button type="submit" class="btn btn-primary" id="parseFeedBtn">{{ __('Refresh My Offers') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
