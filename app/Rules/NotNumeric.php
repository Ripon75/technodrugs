<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotNumeric implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !is_numeric($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return 'The :attribute must not numeric.';
        return 'The name can`t only numeric.';  // custom message
    }
}
