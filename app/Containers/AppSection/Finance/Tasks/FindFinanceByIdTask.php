<?php

namespace App\Containers\AppSection\Finance\Tasks;

use App\Containers\AppSection\Finance\Data\Repositories\FinanceRepository;
use App\Containers\AppSection\Finance\Events\FinanceFoundByIdEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindFinanceByIdTask extends ParentTask
{
    public function __construct(
        protected FinanceRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Finance
    {
        try {
            $finance = $this->repository->find($id);
            FinanceFoundByIdEvent::dispatch($finance);

            return $finance;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
