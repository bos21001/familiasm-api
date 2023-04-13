<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\UpdateGroupAction;
use App\Containers\AppSection\Finance\UI\API\Requests\UpdateGroupRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\GroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateGroupController extends ApiController
{
    /**
     * @param UpdateGroupRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateGroup(UpdateGroupRequest $request): array
    {
        $finance = app(UpdateGroupAction::class)->run($request);

        return $this->transform($finance, GroupTransformer::class);
    }
}
