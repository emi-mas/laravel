<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ShiireAmountRule implements Rule
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
        // 数値以外はfalse
        if (!is_numeric($value)) return false;
        // 100円単位の入⼒はtrue
        return $value % 100 === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '仕入額は100円単位で入⼒してください。';
    }
}
