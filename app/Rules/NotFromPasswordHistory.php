<?php
namespace App\Rules;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class NotFromPasswordHistory implements Rule
{
    public $user;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $passwordHistories = $this->user->passwordHistories()->take(config('auth.password_history_cnt'))->get();
        foreach ($passwordHistories as $passwordHistory) {
            if (Hash::check($value, $passwordHistory->password)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your :attribute can not be same as any of your recent passwords. Please choose a new password.';
    }
}
