<?php

namespace App\Containers\AppSection\Finance\Actions;

use App\Containers\AppSection\Finance\Tasks\DeleteFinanceTask;
use App\Containers\AppSection\Finance\UI\API\Requests\DeleteFinanceRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteFinanceAction extends ParentAction
{
    /**
     * @param DeleteFinanceRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFinanceRequest $request): int
    {
        return app(DeleteFinanceTask::class)->run($request->id);
    }
}
