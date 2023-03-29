<?php

namespace App\Containers\AppSection\Finance\Actions;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tasks\FindFinanceByIdTask;
use App\Containers\AppSection\Finance\UI\API\Requests\FindFinanceByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindFinanceByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindFinanceByIdRequest $request): Finance
    {
        $data = [
            "id" => $request->id,
            "user_id" => $request->encode($request->user()->id),
            "limit" => $request->get("limit", $_ENV["PAGINATION_LIMIT_DEFAULT"])
        ];

        return app(FindFinanceByIdTask::class)->run($data);
    }
}
