<!-- resources/views/searchForm.blade.php -->

@extends('layouts.master')

@section('title', 'Search Form')

@section('content')
    <form action="/searchForm/search" method="GET">
        @csrf
        <input type="text" name="query" placeholder="Search By Student Id">
        <button type="submit">Search</button>
        @error('query')
            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
        @enderror
    </form>
@endsection
