<?php

namespace App\Containers\AppSection\Finance\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Finance\Models\Group;
use App\Containers\AppSection\Finance\Tasks\CreateGroupTask;
use App\Containers\AppSection\Finance\UI\API\Requests\CreateGroupRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateGroupAction extends ParentAction
{
    /**
     * @param CreateGroupRequest $request
     * @return Group
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateGroupRequest $request): Group
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateGroupTask::class)->run($data);
    }
}
