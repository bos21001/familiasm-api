<?php

namespace App\Containers\AppSection\Finance\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Finance extends ParentModel
{
    protected $fillable = [
        'user_id',
        'group_id',
        'name',
        'value',
        'description',
        'repeats',
        'business_day_only',
        'repeat_every',
        'repetition_period',
        'ends',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Finance';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * @return HasMany
     */
    public function financeHistory(): HasMany
    {
        return $this->hasMany(FinanceHistory::class);
    }
}
