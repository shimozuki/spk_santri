<?php

namespace App\Actions\Fortify;

use App\Models\Alternatif;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'npm' => ['required', 'int', Rule::unique(Alternatif::class)],
            'no_telp' => ['required', 'string', 'max:255'],
            'jurusan' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Alternatif::create([
            'user_id' => $user->id,
            'npm' => $input['npm'],
            'jurusan' => $input['jurusan'],
            'no_telp' => $input['no_telp'],
        ]);

        return $user;
    }
}
