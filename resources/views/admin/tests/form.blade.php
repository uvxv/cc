@php
    $value = old('test_date', isset($test) && $test->test_date ? $test->test_date->format('Y-m-d\TH:i') : '');
@endphp

<form action="{{ $action }}" method="POST">
    @csrf
    @if(in_array(strtoupper($method), ['PUT','PATCH','DELETE']))
        @method($method)
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Test Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $test->name ?? '') }}" required>
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="test_date" class="form-label">Test Date & Time</label>
        <input type="datetime-local" id="test_date" name="test_date" class="form-control" value="{{ $value }}" required>
        @error('test_date')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button class="btn btn-primary" type="submit">Save</button>
    <a href="{{ route('admin.tests.index') }}" class="btn btn-secondary">Cancel</a>
</form>
