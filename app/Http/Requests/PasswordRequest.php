<?php

namespace App\Http\Requests;

use App\Rules\PasswordHistory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required',
            'password' => ['required', 
                'confirmed', 
                Password::min(10)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols(),  
                new PasswordHistory($this->request)
             ],
        ];
    }
}
