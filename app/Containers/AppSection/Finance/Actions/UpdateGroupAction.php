<?php

namespace App\Containers\AppSection\Finance\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Finance\Models\Group;
use App\Containers\AppSection\Finance\Tasks\UpdateGroupTask;
use App\Containers\AppSection\Finance\UI\API\Requests\UpdateGroupRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateGroupAction extends ParentAction
{
    /**
     * @param UpdateGroupRequest $request
     * @return Group
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateGroupRequest $request): Group
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateGroupTask::class)->run($data, $request->id);
    }
}
