@extends('layouts.admin')


@section('content')

    <form action="{{ route('team.store') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="teamName">Name</label>
                    <input type="text" id="teamName" name="name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="teamStatus">Status</label>
                    <select name="status" id="teamStatus" class="form-control">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="teamDesc">Description</label>
                    <textarea name="description" id="teamDesc" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Choose the user for this team</div>
            <div class="card-body">
                <div class="form-row">
                    @if ($users->count())
                        @foreach($users as $user)
                            @if ($loop->iteration == 1 || $loop->iteration%6 == 0)
                                <div class="col-md-4">
                            @endif
                                    <div class="form-check">
                                        <input class="form-check-input" name="user_ids[]" type="checkbox" id="teamUser{{ $loop->iteration }}" value="{{ $user->id }}">
                                        <label class="form-check-label" for="teamUser{{ $loop->iteration }}">{{ $user->name }}</label>
                                    </div>
                            @if ($loop->last || $loop->iteration%5 == 0)
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Choose the templates for this team</div>
            <div class="card-body">
                <div class="form-row">
                    @if ($templates->count())
                        @foreach($templates as $template)
                            @if ($loop->iteration == 1 || $loop->iteration%6 == 0)
                                <div class="col-md-4">
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" name="template_ids[]" type="checkbox" id="teamTemplate{{ $loop->iteration }}" value="{{ $template->id }}">
                                        <label class="form-check-label" for="teamTemplate{{ $loop->iteration }}">{{ $template->name }}</label>
                                    </div>
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