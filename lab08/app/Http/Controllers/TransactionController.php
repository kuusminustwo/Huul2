<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransactions(int $account_number){
        $transactionsFrom = Transaction::where('transaction_from', 'like', '%' . $account_number . '%')->get();
        $transactionsTo = Transaction::where('transaction_to', 'like', '%' . $account_number . '%')->get();
        $transactions = $transactionsFrom->merge($transactionsTo);
        return view('transactionHistory', [
            'transactions' => $transactions
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'transaction_from' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $account = Account::where('account_number', $request->transaction_from)->first();
                    if($account == null){
                        $fail('Ийм данс алга байна');
                    }
                }
            ],
            'transaction_to' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $toAccount = Account::where('account_number', $request->transaction_to)->first();
                    if($toAccount == null){
                        $fail('Ийм данс алга байна');
                    }
                }
            ],
            'transaction_amount' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $fromAccount = Account::where('account_number', $request->transaction_from)->first();
                    if ($fromAccount == null || $fromAccount->account_balance < $request->transaction_amount) {
                        $fail('Хангалттай хэмжээний мөнгө алга байна.');
                    }
                }
            ],
            'transaction_description' => 'required'
        ], [
            'transaction_from.required' => 'Хоосон байж болохгүй.',
            'transaction_to.required' => 'Хоосон байж болохгүй.',
            'transaction_amount.required' => 'Хоосон байж болохгүй.',
            'transaction_description.required' => 'Хоосон байж болохгүй.',
        ]);

        //Create transaction
        Transaction::create([
            'transaction_from' => $request->input('transaction_from'),
            'transaction_to' => $request->input('transaction_to'),
            'transaction_amount' => $request->input('transaction_amount'),
            'transaction_description' => $request->input('transaction_description')
        ]);
        AccountController::update($request);

        return redirect('/transaction');
    }
    
    
}