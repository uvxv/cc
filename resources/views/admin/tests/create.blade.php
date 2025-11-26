@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Test</h1>

    @include('admin.tests.form', ['action' => route('admin.tests.store'), 'method' => 'POST'])
</div>
@endsection
