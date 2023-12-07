<?php

// In app/Rules/AlphaNumeric.php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaNumeric implements Rule
{
    public function passes($attribute, $value)
    {
        // Your validation logic here
        return preg_match('/^[a-zA-Z0-9]+$/', $value);
    }

    public function message()
    {
        // Your error message here
        return 'Та зөвхөн үсэг, тоо оруулна уу.';
    }

    public function requiredMessage()
    {
        return 'Та бичнэ үү.';
    }
}
