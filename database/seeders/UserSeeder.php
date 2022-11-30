<?php

namespace Database\Seeders;

use App\Models\Door;
use App\Models\User;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

        // Create 10 more Users.
        $users = User::factory(self::USER_COUNT)->create();

        // Ensure that at least one User is expired.
        try {
            $expireUser = User::query()->where([
                ['expiry_date', '>', Carbon::now()],
                ['admin_flag', false],
            ])->whereNotIn('email', ['joebloggs@example.com'])
                ->firstOrFail();
            $expireUser->update(
                ['expiry_date' => Carbon::now()->subDays(1)->toDate()]
            );
        } catch (ModelNotFoundException $e) {
            print("No active users available: {$e}");
        }

        // Ensure that at least one Admin is expired.
        try {
            $expireAdmin = User::query()->where([
                ['expiry_date', '>', Carbon::now()],
                ['admin_flag', true],
            ])->whereNotIn(
                'email',
                ['randellgaya@example.com', 'liamoreilly@example.com', ]
            )->firstOrFail();
            $expireAdmin->update(
                ['expiry_date' => Carbon::now()->subDays(1)->toDate()]
            );
        } catch (ModelNotFoundException $e) {
            print("No active users available: {$e}");
        }

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
            'admin_flag' => false,
            'expiry_date' => Carbon::now()->addYear(),
            'password' => 'secret'
        ]);

        // Attach doors and zones randomly to all users
        $allUsers = $users->merge([$randell, $liam, $joe]);
        foreach ($allUsers as $user) {
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
    }
}
