<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zone;
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

    public function create()
    {
        return view('users.create');
    }

    public function store(User $user)
    {
        User::factory()->create($this->validateUser($user));
        return redirect()
            ->route('users.index')
            ->with(
                'success', request('first_name') . ' created');
    }

    public function edit(User $user)
    {
//
//        $otherZones = Zone::all()->whereNotIn(
//            'id', $user->zones->pluck('id')->toArray()
//        );
//

        return view('users.edit', [
            'user' => $user,
            'zones' => Zone::all()->whereNotIn(
                'id', $user->zones->pluck('id')->toArray()
            )
        ]);
    }

    public function update(User $user)
    {
        $selected = array_map(
            static fn ($name) => str_replace('_', ' ', $name),
            array_keys(
                array_filter(
                    request()->toArray(),
                    fn ($value, $key) => str_starts_with($key, 'Zone_') && $value == "true",
                    ARRAY_FILTER_USE_BOTH
                )
            )
        );

        foreach ($user->zones as $zone) {
            if (! in_array($zone->name, $selected)) {
                $user->zones()->detach($zone);
            }
        }

        $newZones = Zone::all()
            ->whereIn('name', $selected)
            ->whereNotIn('id', $user->zones->pluck('id')->toArray());

        foreach ($newZones as $zone) {
            $user->zones()->attach($zone);
        }

        $selected = array_map(
            static fn ($name) => str_replace('_', ' ', $name),
            array_keys(
                array_filter(
                    request()->toArray(),
                    fn ($value, $key) => str_starts_with($key, 'Zone_') && $value == "true",
                    ARRAY_FILTER_USE_BOTH
                )
            )
        );
        foreach($user->zones as $zone) {
            if (! in_array($zone->name, $selected)) {
                $user->zones()->detach($zone);
            }
        }

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
            'admin_flag' => 'required|boolean',
            'expiry_date' => 'date',
            'password' => ['min:8', 'max:255'],
        ]);
    }
}
