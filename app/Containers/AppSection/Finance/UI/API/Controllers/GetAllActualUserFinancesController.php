<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\GetAllActualUserFinancesAction;
use App\Containers\AppSection\Finance\UI\API\Requests\GetAllActualUserFinancesRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\FinanceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllActualUserFinancesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllActualUserFinances(GetAllActualUserFinancesRequest $request): array
    {
        $finances = app(GetAllActualUserFinancesAction::class)->run($request);

        return $this->transform($finances, FinanceTransformer::class);
    }
}
