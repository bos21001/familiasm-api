<?php

namespace App\Containers\AppSection\Finance\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tasks\CreateFinanceTask;
use App\Containers\AppSection\Finance\UI\API\Requests\CreateFinanceRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateFinanceAction extends ParentAction
{
    /**
     * @param CreateFinanceRequest $request
     * @return Finance
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFinanceRequest $request): Finance
    {
        $data = $request->sanitizeInput([
            'group_id',
            'name',
            'type',
            'value',
            'description',
            'repeats' => false,
            'business_day_only' => false,
            'repeat_every',
            'repetition_period',
            'ends' => today(),
        ]);

        $user_id = $request->user()["id"];

        return app(CreateFinanceTask::class)->run($data, $user_id);
    }
}
