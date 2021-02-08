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
        <a href="{{ route('team.create') }}" class="btn btn-success">Add new team</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Users count</th>
            <th scope="col">Date created</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($teams->count())
            @foreach($teams as $team)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->users->count() }}</td>
                    <td>{{ $team->created_at }}</td>
                    <td>
                        <a href="{{ route('team.edit', $team->id) }}" class="btn btn-warning btn-sm mr-1">Edit</a>
                        <form action="{{ route('team.destroy', $team->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">You don't have any teams yet!</td>
            </tr>
        @endif
        </tbody>
    </table>
    @if ($teams->count())
        {{ $teams->links() }}
    @endif

@endsection