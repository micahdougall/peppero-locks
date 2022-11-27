<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class UserController
{

    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(User $user)
    {
        User::factory()->create($this->validateUser($user));
        return redirect()
            ->route('users.index')
            ->with(
                'success', request('first_name') . ' created');
    }

    public function create()
    {
        return view('users.create');
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
            'password' => ['min:8', 'max:255'],
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $oldName = $user->first_name;
        $user->update($this->validateUser($user));
        return redirect()
            ->route('users.index')
            ->with('success', $oldName . ' updated');
    }

    /**
     * @throws \Throwable
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();
        return redirect()
            ->route('users.index')
            ->with('success', $user->first_name . ' deleted');
    }
}
