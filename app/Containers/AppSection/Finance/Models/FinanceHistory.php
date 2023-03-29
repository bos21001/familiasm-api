<?php

namespace App\Containers\AppSection\Finance\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinanceHistory extends ParentModel
{
    protected $fillable = [
        'finance_id',
        'user_id',
        'value',
        'date',
        'action',
        'description',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'FinanceHistory';

    /**
     * @return BelongsTo
     */
    public function finance(): BelongsTo
    {
        return $this->belongsTo(Finance::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
