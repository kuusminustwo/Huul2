<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public static function update(Request $request)
    {

        try {
            DB::beginTransaction();
            $account = Account::where('account_number',  $request->transaction_from )->first();

            if ($account->account_balance > $request->transaction_amount) {
                DB::table('accounts')->where('id', $account->id)->decrement('account_balance', $request->transaction_amount);

                $account = Account::where('account_number',  $request->transaction_to )->first();
                DB::table('accounts')->where('id', $account->id)->increment('account_balance', $request->transaction_amount);
                
                // Commit the transaction if all queries are successful
                DB::commit();

                // You can add any additional logic or redirection here upon successful transaction
            } else {
                // Rollback the transaction if the condition is not met
                DB::rollback();

                // You can add any additional logic or redirection here upon unsuccessful transaction
                return response()->json(['error' => 'Insufficient funds or other error occurred.'], 400);
            }
        } catch (\Exception $e) {
            // Handle exceptions and rollback the transaction on error
            DB::rollback();

            // Log or handle the exception as needed
            // You can also rethrow the exception if you want it to propagate up the stack
            throw $e;

            return response()->json(['error' => 'An error occurred. Please try again.'], 500);
        }
    }
}
