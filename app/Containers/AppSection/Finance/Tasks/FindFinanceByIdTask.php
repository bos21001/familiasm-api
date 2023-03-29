<?php

namespace App\Containers\AppSection\Finance\Tasks;

use App\Containers\AppSection\Finance\Data\Repositories\FinanceRepository;
use App\Containers\AppSection\Finance\Events\FinanceFoundByIdEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\UI\API\Requests\FindFinanceByIdRequest;
use App\Ship\Exceptions\NotAuthorizedResourceException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindFinanceByIdTask extends ParentTask
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
     * Runs the FindFinanceByIdTask to find a Finance record by "id" and "user_id".
     *
     * @param array $data An array containing "id" and "user_id" keys.
     * @return Finance Returns the Finance object if found.
     *
     * @throws NotFoundException Throws an exception if no Finance record is found.
     * @throws NotAuthorizedResourceException Throws an exception if a Finance record is found but the "user_id" does not match.
     */
    public function run($data): Finance
    {
        try {
            // Find the Finance record by "id" and "user_id"
            $finance = $this->repository
                ->where("id", $this->decode($data["id"]))
                ->where("user_id", $this->decode($data["user_id"]))
                ->first();

            // Throw an exception if the Finance record is not found or the "user_id" does not match
            if (is_null($finance)) {
                throw new NotAuthorizedResourceException();
            }

            // Dispatch the FinanceFoundByIdEvent
            FinanceFoundByIdEvent::dispatch($finance);

            // Return the Finance object if found
            return $finance;
        } catch (NotAuthorizedResourceException) {
            throw new NotAuthorizedResourceException();
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
