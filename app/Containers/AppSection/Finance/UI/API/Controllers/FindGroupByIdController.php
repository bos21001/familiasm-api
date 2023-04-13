<?php

namespace App\Containers\AppSection\Finance\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Finance\Actions\FindGroupByIdAction;
use App\Containers\AppSection\Finance\UI\API\Requests\FindGroupByIdRequest;
use App\Containers\AppSection\Finance\UI\API\Transformers\GroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindGroupByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findGroupById(FindGroupByIdRequest $request): array
    {
        $finance = app(FindGroupByIdAction::class)->run($request);

        return $this->transform($finance, GroupTransformer::class);
    }
}
