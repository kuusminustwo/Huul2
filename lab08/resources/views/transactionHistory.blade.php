@extends('layouts.master')

@section('title', 'Student List')

@section('content')
<table border="1">
    <tr>
        <td>#</td>
        <td>Хэнээс</td>
        <td>Хэнд</td>
        <td>Гүйлгээний дүн</td>
        <td>Гүйлгээний утга</td>
    </tr>
    @php
        $transactions = $transactions->sortByDesc('id');
    @endphp
    @foreach($transactions as $transaction)
    <tr>
        <td>{{$transaction->id}}</td>
        <td>{{$transaction->transaction_from}}</a></td>
        <td>{{$transaction->transaction_to}}</td>
        <td>{{$transaction->transaction_amount}}</td>
        <td>{{$transaction->transaction_description}}</td>
    </tr>
    @endforeach
</table>
@endsection