<?php

namespace App\Http\Requests;

use App\Rules\NotFromPasswordHistory;
use App\Rules\PasswordCanNotContainUserName;
use App\Rules\PasswordChangeMinDuration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
       return  [
            'password_confirmation' => 'required',
            'password' => ['required', 
                'confirmed', 
                Password::min(10)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols(),
                new PasswordCanNotContainUserName($this->user()), 
                new NotFromPasswordHistory($this->user()),
                new PasswordChangeMinDuration($this->user()) 
            ]
        ];
    }
}