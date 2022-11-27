<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Validation\Rule;

class ZoneController
{

    public function index()
    {
        return view('zones.index', [
            'zones' => Zone::all()
        ]);
    }

    public function show(Zone $zone)
    {
        return view('zones.show', compact('zone'));
    }

    public function store(Zone $zone)
    {
        Zone::factory()->create($this->validateZone($zone));
        return redirect()->route('zones.index')->with('success', request('name') . ' created');
    }

    public function create()
    {
        return view('zones.create');
    }

    public function edit(Zone $zone)
    {
        return view('zones.edit', compact('zone'));
    }

    public function update(Zone $zone)
    {
        $oldName = $zone->name;
        $zone->update($this->validateZone($zone));
        return redirect()->route('zones.index')->with('success', $oldName . ' updated');
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Zone $zone)
    {
        $zone->deleteOrFail();
        return redirect()->route('zones.index')->with('success', $zone->name . ' deleted');
    }

    protected function validateZone(Zone|null $zone = null): array
    {
        $zone ??= new Zone();
        return request()->validate([
            'name' => [
                'required',
                'max:10',
                Rule::unique('zones', 'name')->ignore($zone)
            ],
        ]);
    }
}
