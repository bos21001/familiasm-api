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
        ];

        return $this->ifAdmin([
            'real_id' => $finance->id,
            'created_at' => $finance->created_at,
            'updated_at' => $finance->updated_at,
            'readable_created_at' => $finance->created_at->diffForHumans(),
            'readable_updated_at' => $finance->updated_at->diffForHumans(),
            // 'deleted_at' => $finance->deleted_at,
        ], $response);
    }
}
