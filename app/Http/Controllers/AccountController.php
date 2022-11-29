<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function update(User $user)
    {
        if (request()->getRequestUri() == "/account/{$user->id}") {
            $user->update($this->validateUser($user));
            return redirect()
                ->route('account.dashboard')
                ->with('success', 'Account details saved');
        } else {
            return Response::HTTP_FORBIDDEN;
        }

    }

    protected function validateUser(User|null $user = null): array
    {
        $user ??= new User();
        return request()->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user)
            ],
        ]);
    }
}
