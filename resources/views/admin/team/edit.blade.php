@extends('layouts.admin')


@section('content')

    <form action="{{ route('team.update', $team->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="teamName">Name</label>
                    <input type="text" id="teamName" name="name" class="form-control" value="{{ $team->name ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="teamStatus">Status</label>
                    <select name="status" id="teamStatus" class="form-control">
                        <option value="0" @if($team->status == 0) selected @endif>Inactive</option>
                        <option value="1" @if($team->status == 1) selected @endif>Active</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="teamDesc">Description</label>
                    <textarea name="description" id="teamDesc" cols="30" rows="5" class="form-control">{{ $team->description }}</textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Choose the user for this team</div>
            <div class="card-body">
                <div class="form-row">
                    @if ($users->count())
                        @foreach($users as $user)
                            @if ($loop->iteration == 1 || $loop->iteration%5 == 0)
                                <div class="col-md-4">
                                    @endif
                                    @if ($team->users->count() && in_array($user->id, $team->users()->pluck('id')->toArray()))
                                        <div class="form-check">
                                            <input class="form-check-input" checked name="user_ids[]" type="checkbox" id="teamUser{{ $loop->iteration }}" value="{{ $user->id }}">
                                            <label class="form-check-label" for="teamUser{{ $loop->iteration }}">{{ $user->name }}</label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" name="user_ids[]" type="checkbox" id="teamUser{{ $loop->iteration }}" value="{{ $user->id }}">
                                            <label class="form-check-label" for="teamUser{{ $loop->iteration }}">{{ $user->name }}</label>
                                        </div>
                                    @endif
                                    @if ($loop->last || $loop->iteration%5 == 0)
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-sm-12">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success mr-2" type="submit">Save</button>
                    <a href="{{ route('team.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </form>

@endsection