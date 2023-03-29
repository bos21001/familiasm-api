<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\UpdateFinanceAction;
use App\Containers\AppSection\Finance\UI\API\Requests\UpdateFinanceRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\FinanceTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateFinanceController extends ApiController
{
    /**
     * @param UpdateFinanceRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateFinance(UpdateFinanceRequest $request): array
    {
        $finance = app(UpdateFinanceAction::class)->run($request);

        return $this->transform($finance, FinanceTransformer::class);
    }
}
