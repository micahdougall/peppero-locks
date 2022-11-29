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

        // Control admins.
        $randell = User::factory()->create([
            'first_name' => 'Randell',
            'last_name' => 'Gaya',
            'email' => 'randellgaya@example.com',
            'admin_flag' => true,
            'expiry_date' => Carbon::now()->addYear(),
            'password' => 'secret'
        ]);
        $liam = User::factory()->create([
            'first_name' => 'Liam',
            'last_name' => "O'Reilly",
            'email' => 'liamoreilly@example.com',
            'admin_flag' => true,
            'expiry_date' => Carbon::now()->addYear(),
            'password' => 'secret'
        ]);

        // Control user (non-admin).
        $joe = User::factory()->create([
            'first_name' => 'Joe',
            'last_name' => 'Bloggs',
            'email' => 'joebloggs@example.com',
            'expiry_date' => Carbon::now()->addYear(),
            'password' => 'secret'
        ]);

        // Create 10 more Users and attach doors and zones to each.
        $users = User::factory(self::USER_COUNT)->create()
            ->merge([$randell, $liam, $joe]);

        foreach ($users as $user) {
            $user->zones()->attach(
                array_map(
                // Create an array of random size from the Door ids.
                    static fn ($i) => $zones[$i]['id'],
                    (array) array_rand($zones, rand(1, count($zones)))
                )
            );
            $user->doors()->attach(
                array_map(
                // Create an array of random size from the Door ids.
                    static fn ($i) => $doors[$i]['id'],
                    (array) array_rand($doors, rand(1, count($doors)))
                )
            );
        }

        // Ensure that at least one User is expired.
        $expireUser = User::query()->where([
            ['expiry_date', '>', Carbon::now()],
            ['admin_flag', false],
        ])->whereNotIn('email', ['joebloggs@example.com'])
            ->first();
        if($expireUser->exists()) {
            $expireUser->update(
                ['expiry_date' => Carbon::now()->subDays(1)->toDate()]
            );
        }

        // Ensure that at least one Admin is expired.
        $expireAdmin = User::query()->where([
            ['expiry_date', '>', Carbon::now()],
            ['admin_flag', true],
        ])->whereNotIn(
            'email',
            ['randellgaya@example.com', 'liamoreilly@example.com', ]
        )->first();
        if($expireAdmin->exists()) {
            $expireAdmin->update(
                ['expiry_date' => Carbon::now()->subDays(1)->toDate()]
            );
        }
    }
}
