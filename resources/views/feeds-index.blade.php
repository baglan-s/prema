@extends('layouts.custom')

@section('title', __('Feed Managements'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="{{ route('home') }}">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> {{ __('Feed Managements') }}
                </div>
                <div class="card-body">
                    @if($status = session('status'))
                        <x-common.flash-message :status="$status"/>
                    @endif
                    <form method="POST" action="{{ route('feeds.save', $teamId) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $feed->id ?? null }}">
                        <div class="form-group">
                            <label for="longUrl">{{ __('Long URL') }}</label>
                            <input type="text" name="long" value="{{ $feed->long ?? '' }}" class="form-control" id="longUrl" aria-describedby="longUrlHelp">
                            <small id="longUrlHelp" class="form-text text-muted">{{ __('Enter the feed url to load the list of all objects') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="shortUrl">{{ __('Short URL') }}</label>
                            <input type="text" name="short" value="{{ $feed->short ?? '' }}" class="form-control" id="shortUrl" aria-describedby="shortUrlHelp">
                            <small id="shortUrlHelp" class="form-text text-muted">{{ __('Enter the feed url to load the list of 100 or less objects') }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Save My Feeds') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
