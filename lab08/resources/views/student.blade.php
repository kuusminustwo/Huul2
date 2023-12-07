<!-- resources/views/studentList.blade.php -->

@extends('layouts.master')

@section('title', 'Student List')

@section('content')
    <ul>
        <li>{{$student->student_id}}</li>
        <li>{{$student->first_name}}</li>
        <li>{{$student->surname}}</li>
        <li>{{$student->age}}</li>
        <li>{{$student->gender}}</li>
        <li>{{$student->phone}}</li>
        <li>{{$student->location}}</li>
    </ul>
@endsection
