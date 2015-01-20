@extends('layouts.default')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Edit Users</h4>
    </div>
    <div class="panel-body">

        @include('layouts.partials.errors')
        {{ Form::open(['method' => 'PUT', 'class' => 'form-horizontal','route' => ['user_update', $user->id]]) }}
            <!-- Username form input -->
            <div class="form-group">
                {{ Form::label('username', 'Username', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('username', $user->username, ['class' => 'form-control']) }}
                </div>
            </div>
            <!-- Email form input -->
            <div class="form-group">
                {{ Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
                </div>
            </div>
            <!-- Firstname form input -->
            <div class="form-group">
                {{ Form::label('firstname', 'First Name', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('firstname', $user->firstname, ['class' => 'form-control']) }}
                </div>
            </div>
            <!-- Lastname form input -->
            <div class="form-group">
                {{ Form::label('lastname', 'Last Name', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-8">
                    {{ Form::text('lastname', $user->lastname, ['class' => 'form-control']) }}
                </div>
            </div>
            <!-- Submit button -->
            <div class="form-group last">
                <div class="col-sm-offset-3 col-sm-8">
                    {{ Form::submit('Edit', ['class' => 'btn btn-success btn-sm']) }}
                    {{ link_to_route('users', 'Back', null, ['class' => 'btn btn-default btn-sm']) }}
                </div>
            </div>
        {{ Form::close() }}

    </div>
</div>



@stop