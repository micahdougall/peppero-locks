<?php

namespace Database\Seeders;

use App\Models\Door;
use App\Models\Zone;
use Illuminate\Database\Seeder;

class DoorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\Zone> $zones All Zones except Zone 1 */
        $zones = Zone::query()->select("*")->skip(1)->take(9)->get();

        array_map(
            static fn ($n) => Door::factory()
                ->create([
                    'id' => $n,
                    'name' => "DR-{$n}",
                    'zone_id' => $zones[rand(0, count($zones)-1)]->id
                ]),
            // Supply a unique array of 3-digit random numbers to seed Door id.
            array_unique(array_map(
                static fn ($i) => mt_rand(100, 999),
                range(1, 40)
            ))
        );
    }
}
