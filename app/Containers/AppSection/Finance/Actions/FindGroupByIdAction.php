<?php

namespace App\Containers\AppSection\Finance\Actions;

use App\Containers\AppSection\Finance\Models\Group;
use App\Containers\AppSection\Finance\Tasks\FindGroupByIdTask;
use App\Containers\AppSection\Finance\UI\API\Requests\FindGroupByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindGroupByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindGroupByIdRequest $request): Group
    {
        return app(FindGroupByIdTask::class)->run($request->id);
    }
}
