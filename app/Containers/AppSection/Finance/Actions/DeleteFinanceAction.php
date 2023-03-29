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
        $data = [
            "id" => $request->id,
            "user_id" => $request->encode($request->user()->id)
        ];

        return app(DeleteFinanceTask::class)->run($data);
    }
}
