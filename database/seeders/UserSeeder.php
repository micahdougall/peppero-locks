<?php

namespace Database\Seeders;

use App\Models\Door;
use App\Models\User;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /** @var int USER_COUNT Number of random users used to seed database.*/
    const USER_COUNT = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        /** @var array<\App\Models\Zone> $zones Excludes Zone 10 from zonal access */
        $zones = Zone::all()->take(9)->toArray();

        /** @var array<\App\Models\Door> $doors All seeded Doors */
        $doors = Door::all()->toArray();

        // Seed Users and attach zonal access.
        foreach (range(1, self::USER_COUNT) as $_) {
            User::factory()
                ->create()
                ->zones()->attach(
                    array_map(
                        // Create an array of random size from the zone ids.
                        static fn ($i) => $zones[$i]['id'],
                        (array) array_rand($zones, rand(1, count($zones)))
                    )
                );
        }

        // Control admin
        User::factory()->create([
            'first_name' => 'Randell',
            'last_name' => 'Gaya',
            'email' => 'randell.gaya@swansea.ac.uk',
            'admin_flag' => true,
            'expiry_date' => Carbon::now()->addYear(),
            'password' => bcrypt('password')
        ]);

        // Control user (non-admin)
        User::factory()->create([
            'first_name' => 'Micah',
            'last_name' => 'Dougall',
            'email' => '2032638@swansea.ac.uk',
            'expiry_date' => Carbon::now()->addYear(),
            'password' => bcrypt('password')
        ])->zones()->attach(
            array_map(
            // Create an array of random size from the zone ids.
                static fn ($i) => $zones[$i]['id'],
                (array) array_rand($zones, rand(1, count($zones)))
            )
        );

        // Make 2 user admins.
//        User::query()->where('id', 1)
//            ->orWhere('id', 5)
//            ->update(['admin_flag' => true]);

        // Expire a single User.
        User::query()->where('id', 3)
            ->update(['expiry_date' => Carbon::now()->subDays(1)->toDate()]);

        // Attach random direct Door access for a single User.
        User::query()->where([
                ['admin_flag', false],
                ['expiry_date', '>', Carbon::now()]
            ])
            ->first()
            ->doors()->attach(
                array_map(
                    // Create an array of random size from the Door ids.
                    static fn ($i) => $doors[$i]['id'],
                    (array) array_rand($doors, rand(1, count($doors)))
                )
            );
    }
}
