<?php

namespace App\Containers\AppSection\Finance\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Finance\Data\Repositories\FinanceRepository;
use App\Containers\AppSection\Finance\Events\FinancesListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllActualUserFinancesTask extends ParentTask
{
    public function __construct(
        protected FinanceRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(array $data): mixed
    {
        $result = $this->addRequestCriteria()->repository
            ->where("user_id", $data["user_id"])
            ->paginate($data["limit"])
            ->setPath($_ENV['API_URL'] . "?limit=" . $data["limit"]);
        FinancesListedEvent::dispatch($result);

        return $result;
    }
}
