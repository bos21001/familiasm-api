<?php

namespace App\Containers\AppSection\Finance\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Finance\Tasks\GetAllFinancesTask;
use App\Containers\AppSection\Finance\UI\API\Requests\GetAllFinancesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFinancesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllFinancesRequest $request): mixed
    {
        return app(GetAllFinancesTask::class)->run();
    }
}
