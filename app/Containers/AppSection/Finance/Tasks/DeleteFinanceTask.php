<?php

namespace App\Containers\AppSection\Finance\Tasks;

use App\Containers\AppSection\Finance\Data\Repositories\FinanceRepository;
use App\Containers\AppSection\Finance\Events\FinanceDeletedEvent;
use App\Containers\AppSection\Finance\UI\API\Requests\FindFinanceByIdRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotAuthorizedResourceException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteFinanceTask extends ParentTask
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
     * @param $data
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($data): int
    {
        try {
            $id = $this->decode($data["id"]);
            $user_id = $this->decode($data["user_id"]);

            $finance = $this->repository->find($id);

            if ($finance->user_id !== $user_id) {
                throw new NotFoundException();
            }

            $result = $this->repository->delete($id);
            FinanceDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
