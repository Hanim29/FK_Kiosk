<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'matrix_id' => ['required', 'string', 'size:7', 'unique:users'],
            'phone_num' => ['required', 'string', 'size:10'],
            'ic_number' => ['required', 'string', 'size:12', 'unique:users'],
            'account_type' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'matrix_id' => $input['matrix_id'],
            'phone_num' => $input['phone_num'],
            'ic_number' => $input['ic_number'],
            'account_type' => $input['account_type'],
            'password' => Hash::make($input['password']),
        ]);
        
    }
}
