@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"> <h4>Sign Up</h4>

                </div>
                <div class="panel-body">
                    @include('layouts.partials.errors')
                    {{ Form::open(['class' => 'form-horizontal']) }}
                        <!-- Username form input -->
                        <div class="form-group">
                            {{ Form::label('username', 'Username', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-7">
                                {{ Form::text('username', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <!-- Email form input -->
                        <div class="form-group">
                            {{ Form::label('email', 'Email', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-7">
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <!-- Firstname form input -->
                        <div class="form-group">
                            {{ Form::label('firstname', 'First Name', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-7">
                                {{ Form::text('firstname', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <!-- Lastname form input -->
                        <div class="form-group">
                            {{ Form::label('lastname', 'Last Name', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-7">
                                {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <!-- Password form input -->
                        <div class="form-group">
                            {{ Form::label('password', 'Password', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-7">
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <!-- Password_confirmation form input -->
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Password Confirmation', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-7">
                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div class="form-group last">
                            <div class="col-sm-offset-4 col-sm-8">
                                {{ Form::submit('Create', ['class' => 'btn btn-success btn-sm']) }}
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <a href="#">Need Help?</a>
                </div>
                <div class="panel-footer">
                    {{ link_to_route('login', 'Back to login page') }}
                </div>
            </div>
        </div>
    </div>

@stop