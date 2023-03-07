<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\GetAllFinancesAction;
use App\Containers\AppSection\Finance\UI\API\Requests\GetAllFinancesRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\FinanceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFinancesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllFinances(GetAllFinancesRequest $request): array
    {
        $finances = app(GetAllFinancesAction::class)->run($request);

        return $this->transform($finances, FinanceTransformer::class);
    }
}
