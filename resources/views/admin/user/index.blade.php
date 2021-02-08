@extends('layouts.admin')


@section('content')
    @if (session()->has('msg_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('msg_success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('msg_error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('msg_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="table-actions d-flex justify-content-end mb-2">
        <a href="{{ route('user.create') }}" class="btn btn-success">Add new user</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Teams count</th>
            <th scope="col">Role</th>
            <th scope="col">Date created</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($users->count())
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->teams->count() }}</td>
                    <td>{{ $user->role->name ?? '' }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm mr-1">Изменить</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">You don't have any users yet!</td>
            </tr>
        @endif
        </tbody>
    </table>
    @if ($users->count())
        {{ $users->links() }}
    @endif

@endsection