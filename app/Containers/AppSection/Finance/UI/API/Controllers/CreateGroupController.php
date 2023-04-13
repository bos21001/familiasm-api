<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\CreateGroupAction;
use App\Containers\AppSection\Finance\UI\API\Requests\CreateGroupRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\GroupTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateGroupController extends ApiController
{
    /**
     * @param CreateGroupRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createGroup(CreateGroupRequest $request): JsonResponse
    {
        $finance = app(CreateGroupAction::class)->run($request);

        return $this->created($this->transform($finance, GroupTransformer::class));
    }
}
