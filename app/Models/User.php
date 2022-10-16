<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;

class User extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsToMany
     */
    public function zones(): BelongsToMany
    {
        return $this->belongsToMany(Zone::class, 'zonal_access')
            ->as('access')
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function doors(): BelongsToMany
    {
        return $this->belongsToMany(Door::class, 'direct_access');
    }


    /**
     * Get doors using an Attribute accessor in place of a hasManyThrough
     * (which is not possible via Many-to-Many relationships).
     *
     * Can be accessed directly with $user->zoneDoors rather than zoneDoors().
     *
     * See {@link [https://laravel.com/docs/9.x/eloquent-mutators#accessors-and-mutators] [accessors-and-mutators]}
     *
     * @return Attribute
     */
    public function zoneDoors(): Attribute
    {
        return Attribute::get(
            get: fn($value) => collect(
                // Flatten each Zone's collection of Doors into a single array.
                array_merge(...$this->zones
                    ->map(
                        static fn($zone) => $zone->doors->all()
                    )
                )
            )
        );
    }

    /**
     * @param Door $door
     * @return bool Indicates whether the User has access to the Door
     */
    public function hasAccessToDoor(Door $door): bool
    {
        return (
            $this->doors->contains($door) || $this->zoneDoors->contains($door) || $this->isAdmin()
        ) && $this-> isActive();
    }

    public function isAdmin(): bool
    {
        return $this->admin_flag;
    }

    public function isActive(): bool
    {
        return $this->expiry_date > Carbon::now();
    }

    /**
     * @return void
     */
    public function expire(): void
    {
        $this->update(['expiry_date' => Carbon::now()->toDate()]);
    }
}
