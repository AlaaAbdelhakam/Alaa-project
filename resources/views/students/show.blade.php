@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Show student</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Title: {{ $student->name }}
            </div>
            <div>
                Description: {{ $student->phone }}
            </div>
            <div>
                Body: {{ $student->grade }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
