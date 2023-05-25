<?php
namespace App\Rules;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class PasswordChangeMinDuration implements Rule
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
        if (isset($this->user->password_reset_at)) {
            $passwordChangeElegibleTime = Carbon::parse($this->user->password_reset_at)->addDays(config('auth.password_change_min_duration'))->toDateTimeString();
        
            if (Carbon::now()->toDateTimeString() < $passwordChangeElegibleTime) {
                return false;
            }
            
            return true;
    
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
        return 'You are trying to change :attribute before 24 hours. Please wait or contact support.';
    }
}

