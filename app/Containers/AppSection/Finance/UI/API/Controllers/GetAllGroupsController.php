<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\GetAllGroupAction;
use App\Containers\AppSection\Finance\UI\API\Requests\GetAllGroupsRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\FinanceTransformer;
use App\Containers\AppSection\Finance\UI\API\Transformers\GroupTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllGroupsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllGroups(GetAllGroupsRequest $request): array
    {
        $finances = app(GetAllGroupAction::class)->run($request);

        return $this->transform($finances, GroupTransformer::class);
    }
}
