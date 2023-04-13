<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use App\Containers\AppSection\Finance\Actions\DeleteGroupsAction;
use App\Containers\AppSection\Finance\UI\API\Requests\DeleteGroupRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteGroupController extends ApiController
{
    /**
     * @param DeleteGroupRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteGroup(DeleteGroupRequest $request): JsonResponse
    {
        app(DeleteGroupsAction::class)->run($request);

        return $this->noContent();
    }
}
