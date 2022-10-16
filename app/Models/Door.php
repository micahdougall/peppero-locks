<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Door extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo Relation to show which Zone the Door is included in.
     */
    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    /**
     * @return BelongsToMany The relations which shows all the Users which have
     * direct access to the Door (not including zonal permissions).
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'direct_access');
    }


    /**
     * Manual implementation of hasManyThrough to show the transitive relation
     * of the Users which have access to the Door via their Zones.
     * (Not possible via Many-to-Many relationships).
     * @see \Illuminate\Database\Eloquent\Concerns\HasRelationships::hasManyThrough()
     *
     * Can be accessed directly with $door->zoneUsers rather than zoneUsers().
     *
     * See {@link [https://laravel.com/docs/9.x/eloquent-mutators#accessors-and-mutators] [accessors-and-mutators]}
     *
     * @return Attribute Accessor attribute containing all Doors accessible to
     * the user via the Zones the User is authorised for.
     */
    public function zoneUsers(): Attribute
    {
        return Attribute::get(
            get: fn($value) => $this->zone->users
        );
    }
}
