<!-- resources/views/studentList.blade.php -->

@extends('layouts.master')

@section('title', 'Student List')

@section('content')
    <form action="/searchForm/search" method="GET">
        @csrf
        <input type="text" name="query" placeholder="Search By Student Id">
        <button type="submit">Search</button>
        @error('query')
            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
        @enderror
    </form>
    @foreach($students as $student)
        <ul>
            <li>{{$student->student_id}}</li>
            <li>{{$student->first_name}}</li>
            <li>{{$student->surname}}</li>
            <li>{{$student->age}}</li>
            <li>{{$student->gender}}</li>
            <li>{{$student->phone}}</li>
            <li>{{$student->location}}</li>
        </ul>
    @endforeach
@endsection
