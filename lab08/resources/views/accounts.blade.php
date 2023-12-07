@extends('layouts.master')

@section('title', 'Accounts')

@section('content')
    
    <table border="1">
        <tr>
            <td>#</td>
            <td>Дансны дугаар</td>
            <td>Дансны нэр</td>
            <td>Дансны үлдэгдэл</td>
        </tr>
        @foreach($accounts as $account)
        <tr>
            <td>{{$account->id}}</td>
            <td><a href='/accounts/{{$account->account_number}}'>{{$account->account_number}}</a></td>
            <td>{{$account->account_name}}</td>
            <td>{{$account->account_balance}}</td>
        </tr>
        @endforeach
    </table>
    
@endsection