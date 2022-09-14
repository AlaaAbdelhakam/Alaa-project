@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new student</h2>
        <div class="lead">
            Add new student.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('students.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input value="{{ old('phone') }}" type="text" class="form-control" name="phone"
                        placeholder="phone" required>

                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="grade" class="form-label">grade</label>
                    <textarea class="form-control" name="grade" placeholder="grade" required>{{ old('grade') }}</textarea>

                    @if ($errors->has('grade'))
                        <span class="text-danger text-left">{{ $errors->first('grade') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Save </button>
                <a href="{{ route('students.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
