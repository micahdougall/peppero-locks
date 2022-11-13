<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\Zone;
use Illuminate\Validation\Rule;

class DoorController
{

    public function index()
    {
        return view('doors.index', [
            'doors' => Door::all()
        ]);
    }

    public function show(Door $door)
    {
        return view('doors.show', compact('door'));
    }

    public function store(Door $door)
    {
        Door::factory()->create($this->validateDoor($door));
        return redirect()->route('doors.index')->with('success', request('name') . ' successfully created.');
    }

    public function create()
    {
        return view('doors.create', ['zones' => Zone::all()]);
    }

    public function edit(Door $door)
    {
        return view('doors.edit', [
            'door' => $door,
            'zones' => Zone::all()
        ]);
    }

    public function update(Door $door)
    {
//        ddd(request());
        $door->update($this->validateDoor($door));
        return redirect()->route('doors.index')->with('success', 'Door successfully updated');
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Door $door)
    {
        $door->deleteOrFail();
        return redirect()->route('doors.index')->with('success', 'Door successfully deleted');
    }

    protected function validateDoor(Door|null $door = null): array
    {
        $door ??= new Door();
        return request()->validate([
            'name' => [
                'required',
                'max:10',
                Rule::unique('doors', 'name')->ignore($door)
            ],
            'zone_id' => ['required', Rule::exists('zones', 'id')]
        ]);
    }
}
