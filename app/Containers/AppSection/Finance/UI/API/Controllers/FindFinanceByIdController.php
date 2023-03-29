<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\FindFinanceByIdAction;
use App\Containers\AppSection\Finance\UI\API\Requests\FindFinanceByIdRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\FinanceTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindFinanceByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findFinanceById(FindFinanceByIdRequest $request): array
    {
        $finance = app(FindFinanceByIdAction::class)->run($request);

        return $this->transform($finance, FinanceTransformer::class);
    }
}
