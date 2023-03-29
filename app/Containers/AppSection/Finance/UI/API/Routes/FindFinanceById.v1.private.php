<?php

/**
 * @apiGroup           Finance
 * @apiName            FindFinanceById
 *
 * @api                {GET} /v1/finances/:id Find Finance By Id
 * @apiDescription     Find a finance by its ID
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Finance hased id
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *      "data": {
 *          "object": "Finance",
 *          "id": "aVbqKPzWy2pj0JZg",
 *          "group_id": null,
 *          "name": "Rent",
 *          "type": "debt",
 *          "value": 1149.1,
 *          "description": "Rent (1100) IPTU tax (49.10)",
 *          "repeats": true,
 *          "business_day_only": true,
 *          "repeat_every": 1,
 *          "repetition_period": "month",
 *          "ends": "2023-09-01",
 *          "created_at": "2023-03-12T04:26:07.000000Z",
 *          "updated_at": "2023-03-14T01:24:04.000000Z",
 *          "readable_created_at": "1 day ago",
 *          "readable_updated_at": "1 second ago",
 *      },
 *      "meta": {
 *          "include": [],
 *          "custom": []
 *      }
 * }
 */

use App\Containers\AppSection\Finance\UI\API\Controllers\FindFinanceByIdController;
use Illuminate\Support\Facades\Route;

Route::get('finances/{id}', [FindFinanceByIdController::class, 'findFinanceById'])
    ->middleware(['auth:api']);

