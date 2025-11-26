@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Scheduled Tests</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.tests.create') }}" class="btn btn-primary">Create Test</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Test Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($tests as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>{{ $test->name }}</td>
                <td>{{ $test->test_date?->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('admin.tests.edit', $test) }}" class="btn btn-sm btn-secondary">Edit</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No scheduled tests</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
