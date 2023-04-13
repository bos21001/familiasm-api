<?php

namespace App\Containers\AppSection\Finance\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Finance\Tasks\GetAllGroupsTask;
use App\Containers\AppSection\Finance\UI\API\Requests\GetAllGroupsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllGroupAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllGroupsRequest $request): mixed
    {
        return app(GetAllGroupsTask::class)->run();
    }
}
