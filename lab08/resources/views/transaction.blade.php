@extends('layouts.master')

@section('title', 'Student List')

@section('content')
<form method="POST" action="/transaction/create">
    @csrf
    Шилжүүлэх данс<br>
    <input type="text" name='transaction_from'><br>
    @error('transaction_from')
        <div class="alert alert-danger" style="color: red">{{ $message }}</div>
    @enderror

    Хүлээж авах данс<br>
    <input type="text" name='transaction_to'><br>
    @error('transaction_to')
        <div class="alert alert-danger" style="color: red">{{ $message }}</div>
    @enderror

    Гүйлгээний дүн<br>
    <input type="text" name='transaction_amount'><br>
    @error('transaction_amount')
        <div class="alert alert-danger" style="color: red">{{ $message }}</div>
    @enderror

    Гүйлгээний утга<br>
    <input type="text" name='transaction_description'><br>
    @error('transaction_description')
        <div class="alert alert-danger" style="color: red">{{ $message }}</div>
    @enderror
    <button type="submit">Гүйлгээ хийх</button>
</form>
@endsection