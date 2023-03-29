<?php

namespace App\Containers\AppSection\Finance\Tasks;

use App\Containers\AppSection\Finance\Data\Repositories\FinanceRepository;
use App\Containers\AppSection\Finance\Events\FinanceUpdatedEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\UI\API\Requests\FindFinanceByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateFinanceTask extends ParentTask
{
    public function __construct(
        protected FinanceRepository $repository,
        protected FindFinanceByIdRequest $request
    ) {
    }

    /**
     * Helper function to decode the data.
     *
     * @param String $id_to_decode Data to be decoded.
     * @return int Decoded data.
     */
    private function decode(String $id_to_decode): int
    {
        return $this->request->decode($id_to_decode);
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, array $ids): Finance
    {
        try {
            $id = $this->decode($ids["id"]);
            $user_id = $this->decode($ids["user_id"]);

            $finance = $this->repository->find($id);

            if ($finance->user_id !== $user_id) {
                throw new NotFoundException();
            }

            $result = $this->repository->update($data, $id);
            FinanceUpdatedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
