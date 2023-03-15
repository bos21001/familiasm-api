<?php

namespace App\Containers\AppSection\Finance\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Finance\Tasks\GetAllActualUserFinancesTask;
use App\Containers\AppSection\Finance\UI\API\Requests\GetAllActualUserFinancesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllActualUserFinancesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllActualUserFinancesRequest $request): mixed
    {
        $data = [
            "user_id" => $request->user()->id,
            "limit" => $request->get("limit", $_ENV["PAGINATION_LIMIT_DEFAULT"])
        ];

        return app(GetAllActualUserFinancesTask::class)->run($data);
    }
}
