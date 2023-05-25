<?php
namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PasswordCanNotContainUserName implements Rule
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
        //dd($this->user->name);
        foreach(preg_split("~[^a-z0-9]~i", $this->user->name) as $val) {
            if (!empty($value) && !empty($val)) {
                if (strpos(Str::lower($value), Str::lower($val)) !== false) {
                    return false;
                }
            }
        }
       
        $restrictedWord = [
            'robi',
            'airtel',
            'admin',
            'super',
            'adminstrator',
            'superadmin',
            'root',
            'password'
        ];
        
        foreach($restrictedWord as $val) {
            if (!empty($value) && !empty($val)) {                 
                if (strpos(Str::lower($value), Str::lower($val)) !== false) {
                    return false;
                }
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
        return ':attribute can not contain part of username or restricted words (robi,airtel,admin,super,adminstrator,superadmin,root,password). please choose a new password.';
    }
}
