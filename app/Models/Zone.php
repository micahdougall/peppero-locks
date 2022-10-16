<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zone extends Model
{
    use HasFactory;

//    protected $guarded = [];

    public function doors(): HasMany
    {
        return $this->hasMany(Door::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'zonal_access')
                    ->as('access')
                    ->withTimestamps();
    }
}
