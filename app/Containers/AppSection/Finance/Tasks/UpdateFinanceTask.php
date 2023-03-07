<?php

namespace App\Containers\AppSection\Finance\Tasks;

use App\Containers\AppSection\Finance\Data\Repositories\FinanceRepository;
use App\Containers\AppSection\Finance\Events\FinanceUpdatedEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateFinanceTask extends ParentTask
{
    public function __construct(
        protected FinanceRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Finance
    {
        try {
            $finance = $this->repository->update($data, $id);
            FinanceUpdatedEvent::dispatch($finance);

            return $finance;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
