<?php

namespace App\Containers\AppSection\Finance\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tasks\UpdateFinanceTask;
use App\Containers\AppSection\Finance\UI\API\Requests\UpdateFinanceRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateFinanceAction extends ParentAction
{
    /**
     * @param UpdateFinanceRequest $request
     * @return Finance
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFinanceRequest $request): Finance
    {
        $data = $request->sanitizeInput([
            'group_id',
            'name',
            'type',
            'value',
            'description',
            'repeats',
            'business_day_only',
            'repeat_every',
            'repetition_period',
            'ends',
        ]);

        $ids = [
            "id" => $request->id,
            "user_id" => $request->encode($request->user()->id)
        ];

        return app(UpdateFinanceTask::class)->run($data, $ids);
    }
}
