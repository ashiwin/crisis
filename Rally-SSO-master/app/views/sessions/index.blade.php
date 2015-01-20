@extends('layouts.default')

@section('content')

    @include('flash::message')
    <!-- Page Title -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Home Page
            </h1>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>System 1</h4>
                </div>
                <div class="panel-body">
                    <p>Column 1 goes here :3</p>
                    <a href="http://localhost:8000/oauth/authorize?client_id=oSrQBhSVIzxx1js7&redirect_uri=http://localhost/system1/public/sso_auth&response_type=code" class="btn btn-default">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Column 2</h4>
                </div>
                <div class="panel-body">
                    <p>Column 2 goes here :D</p>
                    <a href="#" class="btn btn-default">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Column 3</h4>
                </div>
                <div class="panel-body">
                    <p>Column 3 goes here :P</p>
                    <a href="#" class="btn btn-default">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@stop