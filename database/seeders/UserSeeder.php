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

        /** @var  $zones */
        $zones = Zone::all()->take(9)->toArray(); // Exclude zone 10 from zonal access.
        $doors = Door::all()->toArray();

        // Create Users and attach zonal access.
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

        // Make 2 user admins.
        User::where('id', 1)
            ->orWhere('id', 5)
            ->update(['admin_flag' => true]);

        // Expire a single user.
        User::where('id', 3)
            ->update(['expiry_date' => Carbon::now()->subDays(1)->toDate()]);

        // Attach random direct door access for a single user.
        User::where([
                ['admin_flag', false],
                ['expiry_date', '>', Carbon::now()]
            ])
            ->first()
            ->doors()->attach(
                array_map(
                    // Create an array of random size from the door ids.
                    static fn ($i) => $doors[$i]['id'],
                    (array) array_rand($doors, rand(1, count($doors)))
                )
            );
    }
}
