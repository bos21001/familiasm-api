<?php

namespace App\Containers\AppSection\Finance\Tasks;

use App\Containers\AppSection\Finance\Data\Repositories\FinanceRepository;
use App\Containers\AppSection\Finance\Events\FinanceCreatedEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateFinanceTask extends ParentTask
{
    public function __construct(
        protected FinanceRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Finance
    {
        try {
            $finance = $this->repository->create($data);
            FinanceCreatedEvent::dispatch($finance);

            return $finance;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
