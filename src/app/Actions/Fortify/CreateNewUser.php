<?php

namespace App\Actions\Fortify;

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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ], [
            'name.required'    => '名前を入力してください',
            'name.string'      => '名前を文字列で入力してください',
            'name.max'         => '名前を255文字以下で入力してください',
            'email.required'   => 'メールアドレスを入力してください',
            'email.string'     => 'メールアドレスを文字列で入力してください',
            'email.email'      => '有効なメールアドレス形式を入力してください',
            'email.max'        => 'メールアドレスを255文字以下で入力してください',
            'email.unique'     => 'このメールアドレスは既に登録されています',
            'password.required' => 'パスワードを入力してください',
            'password.min'      => 'パスワードは8文字以上で入力してください',
            'password.string'   => 'パスワードは文字列で入力してください',
            'password.confirmed' => '確認用パスワードが一致しません',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
