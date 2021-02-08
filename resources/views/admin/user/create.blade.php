@extends('layouts.admin')


@section('content')

    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userName">Name</label>
                    <input type="text" name="name" id="userName" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userEmail">E-mail</label>
                    <input type="email" name="email" id="userEmail" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userStatus">Status</label>
                    <select name="status" id="userStatus" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Unconfirmed">Unconfirmed</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                @if ($roles->count())
                    <div class="form-group">
                        <label for="userRole">Role</label>
                        <select name="role_id" id="userRole" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input type="password" name="password" id="userPassword" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userConfirm">Password Confirm</label>
                    <input type="password" name="password_confirmation" id="userConfirm" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Choose the team for this user</div>
            <div class="card-body">
                <div class="form-row">
                    @if ($teams->count())
                        @foreach($teams as $team)
                            @if ($loop->iteration == 1 || $loop->iteration%6 == 0)
                                <div class="col-md-4">
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" name="team_ids[]" type="checkbox" id="userTeam{{ $loop->iteration }}" value="{{ $team->id }}">
                                        <label class="form-check-label" for="userTeam{{ $loop->iteration }}">{{ $team->name }}</label>
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
                    <button class="btn btn-success mr-2" type="submit">Сохранить</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Отменить</a>
                </div>
            </div>
        </div>
    </form>

@endsection