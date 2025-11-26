@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Test #{{ $test->id }}</h1>

    @include('admin.tests.form', ['action' => route('admin.tests.update', $test), 'method' => 'PUT', 'test' => $test])
</div>
@endsection
