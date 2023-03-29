<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\CreateFinanceAction;
use App\Containers\AppSection\Finance\UI\API\Requests\CreateFinanceRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\FinanceTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateFinanceController extends ApiController
{
    /**
     * @param CreateFinanceRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createFinance(CreateFinanceRequest $request): JsonResponse
    {
        $finance = app(CreateFinanceAction::class)->run($request);

        return $this->created($this->transform($finance, FinanceTransformer::class));
    }
}
