@extends('layouts.default')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Users Management</h4>
        </div>

        @include('flash::message')

        <div class="panel-body">
        
            <p>
                <table class="table table-striped">
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  @foreach($users->all() as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ link_to_route('user_edit', 'Edit', $user->id,['class' => 'btn btn-xs btn-warning']) }}</td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['user_destroy', $user->id]]) }}
                                <div class="form-group">
                                    {{ Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) }}
                                </div>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </table>
            {{ $users->links() }}
            </p>
        </div>
    </div>
    
@stop