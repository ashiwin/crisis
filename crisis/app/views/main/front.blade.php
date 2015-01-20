@extends('layout.main')
@section('content')
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4 white-content">
        {{ Form::open(array('url' => 'oauth/token')) }}
            {{ Form::label('email', 'E-Mail Address') }}
            {{ Form::email($name = 'u_email', $value = null, $attributes = array('class' => 'form-control')) }}
            {{ Form::label('password', 'Password') }}
            {{ Form::password($name = 'u_password', array('class' => 'form-control')) }}
            <br />
            {{  Form::submit('Login', ['class' => 'btn btn-large btn-danger form-control']) }}
        {{ Form::close() }}
    </div>
    <div class="col-lg-4">
    </div>
@stop
