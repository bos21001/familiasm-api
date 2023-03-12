<?php

namespace App\Containers\AppSection\Finance\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends ParentModel
{
    protected $fillable = [
        'name',
        'user_id',
        'type',
        'description',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Group';

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(GroupUser::class)->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function finances(): HasMany
    {
        return $this->hasMany(Finance::class);
    }
}
