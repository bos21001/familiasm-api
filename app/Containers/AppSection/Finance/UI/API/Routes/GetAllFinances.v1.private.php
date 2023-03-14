<?php

/**
 * @apiGroup           Finance
 * @apiName            GetAllFinances
 *
 * @api                {GET} /v1/finances Get All Finances
 * @apiDescription     Lists all finances entries
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *      "data": [
 *          {
 *              "object": "Finance",
 *              "id": "NxOpZowo9GmjKqdR",
 *              "group_id": null,
 *              "name": "Eletrecity",
 *              "type": "debt",
 *              "value": 120,
 *              "description": null,
 *              "repeats": true,
 *              "business_day_only": true,
 *              "repeat_every": 1,
 *              "repetition_period": "month",
 *              "ends": "2023-09-01",
 *              "created_at": "2023-03-12T04:26:07.000000Z",
 *              "updated_at": "2023-03-14T01:24:04.000000Z",
 *              "readable_created_at": "1 day ago",
 *              "readable_updated_at": "1 second ago",
 *          },
 *          {
 *              [...]
 *          }
 *      ],
 *      "meta": {
 *          "include": [],
 *          "custom": [],
 *          "pagination": {
 *              "total": 7,
 *              "count": 7,
 *              "per_page": 10,
 *              "current_page": 1,
 *              "total_pages": 1,
 *              "links": {}
 *          }
 *      }
 * }
 */

use App\Containers\AppSection\Finance\UI\API\Controllers\GetAllFinancesController;
use Illuminate\Support\Facades\Route;

Route::get('finances', [GetAllFinancesController::class, 'getAllFinances'])
    ->middleware(['auth:api']);

