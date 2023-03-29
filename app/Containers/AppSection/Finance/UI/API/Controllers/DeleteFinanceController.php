<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use App\Containers\AppSection\Finance\Actions\DeleteFinanceAction;
use App\Containers\AppSection\Finance\UI\API\Requests\DeleteFinanceRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteFinanceController extends ApiController
{
    /**
     * @param DeleteFinanceRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteFinance(DeleteFinanceRequest $request): JsonResponse
    {
        app(DeleteFinanceAction::class)->run($request);

        return $this->noContent();
    }
}
