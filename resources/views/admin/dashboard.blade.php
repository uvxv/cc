@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Admin Dashboard</h1>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Welcome, {{ Auth::guard('admin')->user()->name }}!</h5>
                            <p class="card-text">You are logged in as an administrator.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Tests</h5>
                            <p class="card-text">Schedule and manage driving license tests.</p>
                            <a href="{{ route('admin.tests.index') }}" class="btn btn-primary">View Tests</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Quick Actions</h5>
                            <p class="card-text">Create a new test schedule.</p>
                            <a href="{{ route('admin.tests.create') }}" class="btn btn-success">Create Test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
