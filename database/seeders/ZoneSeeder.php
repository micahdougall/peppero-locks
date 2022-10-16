<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        array_map(
            static fn($name) => Zone::factory()->create(compact('name')),
            array_map(
                static fn($i) => "Zone {$i}",
                range(1, 10)
            )
        );
    }
}
