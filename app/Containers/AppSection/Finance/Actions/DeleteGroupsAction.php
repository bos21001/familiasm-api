<?php

namespace App\Containers\AppSection\Finance\Actions;

use App\Containers\AppSection\Finance\Tasks\DeleteGroupTask;
use App\Containers\AppSection\Finance\UI\API\Requests\DeleteGroupRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteGroupsAction extends ParentAction
{
    /**
     * @param DeleteGroupRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteGroupRequest $request): int
    {
        return app(DeleteGroupTask::class)->run($request->id);
    }
}
