<?php

namespace App\Containers\AppSection\Finance\UI\API\Transformers;

use App\Containers\AppSection\Finance\Models\Group;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class GroupTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Group $group): array
    {
        $response = [
            'object' => $group->getResourceKey(),
            'id' => $group->getHashedKey(),
            'user_id' => $group->user_id,
            'name' => $group->name,
            'description' => $group->description,
            'created_at' => $group->created_at,
            'updated_at' => $group->updated_at,
            'readable_created_at' => $group->created_at->diffForHumans(),
            'readable_updated_at' => $group->updated_at->diffForHumans(),
        ];

        return $this->ifAdmin([
            'real_id' => $group->id,
            'created_at' => $group->created_at,
            'updated_at' => $group->updated_at,
            // 'deleted_at' => $group->deleted_at,
        ], $response);
    }
}
