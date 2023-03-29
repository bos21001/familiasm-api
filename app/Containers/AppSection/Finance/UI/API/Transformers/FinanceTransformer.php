<?php

namespace App\Containers\AppSection\Finance\UI\API\Transformers;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class FinanceTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Finance $finance): array
    {
        $response = [
            'object' => $finance->getResourceKey(),
            'id' => $finance->getHashedKey(),
            'group_id' => $finance->group_id,
            'name' => $finance->name,
            'type' => $finance->type,
            'value' => $finance->value,
            'description' => $finance->description,
            'repeats' => $finance->repeats,
            'business_day_only' => $finance->business_day_only,
            'repeat_every' => $finance->repeat_every,
            'repetition_period' => $finance->repetition_period,
            'ends' => $finance->ends,
            'created_at' => $finance->created_at,
            'updated_at' => $finance->updated_at,
            'readable_created_at' => $finance->created_at->diffForHumans(),
            'readable_updated_at' => $finance->updated_at->diffForHumans(),
        ];

        return $this->ifAdmin([
            'real_id' => $finance->id,
        ], $response);
    }
}
