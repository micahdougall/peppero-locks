<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function __construct(array $attributes = [])
    {
        $this->attributes['expiry_date'] = Carbon::now()->addDays(365);
        $this->attributes['password'] = 'password';
        parent::__construct($attributes);
    }

    /**
     * @return BelongsToMany The relation which shows all the Zones which are
     * accessible by the User.
     */
    public function zones(): BelongsToMany
    {
        return $this->belongsToMany(Zone::class, 'zonal_access')
            ->as('access')
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany The relations which shows all the Doors which are
     * directly accessible by the User (not including zonal permissions).
     */
    public function doors(): BelongsToMany
    {
        return $this->belongsToMany(Door::class, 'direct_access');
    }

    /**
     * Manual implementation of hasManyThrough to show the transitive relation
     * of the Doors which the User can access via its Zones.
     * (Not possible via Many-to-Many relationships).
     * @see \Illuminate\Database\Eloquent\Concerns\HasRelationships::hasManyThrough()
     *
     * Can be accessed directly with $user->zoneDoors rather than zoneDoors().
     *
     * See {@link [https://laravel.com/docs/9.x/eloquent-mutators#accessors-and-mutators] [accessors-and-mutators]}
     *
     * @return Attribute Accessor attribute containing all Doors accessible to
     * the user via the Zones the User is authorised for.
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
     * @param Door $door The Door to test for User's accessibility.
     * @return bool Indicates whether the User has access to the Door.
     */
    public function hasAccessToDoor(Door $door): bool
    {
        return (
            $this->doors->contains($door) || $this->zoneDoors->contains($door) || $this->isAdmin()
        ) && $this-> isActive();
    }

    /**
     * @param Door $door Adds direct access to the supplied Door.
     */
    public function addAccessToDoor(Door $door): void
    {
        $this->doors()->attach($door);
    }

    /**
     * @return bool Indicates whether the User is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->admin_flag;
    }

    /**
     * @return bool Indicates whether the User is active.
     */
    public function isActive(): bool
    {
        return $this->expiry_date > Carbon::now();
    }

    /**
     * @return void Deactivates the User by updating their expiry date to today.
     */
    public function expire(): void
    {
        $this->update(['expiry_date' => Carbon::now()->toDate()]);
    }
}
