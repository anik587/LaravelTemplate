<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordHistory implements ValidationRule
{
    protected $data;

    function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $da = $this->data->get('email');
        // PasswordHistory::where(['']);
        dd($da);
    }
}
