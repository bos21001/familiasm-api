<?php

/**
 * @apiGroup           Finance
 * @apiName            FindFinanceById
 *
 * @api                {GET} /v1/finances/:id Find Finance By Id
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Finance\UI\API\Controllers\FindFinanceByIdController;
use Illuminate\Support\Facades\Route;

Route::get('finances/{id}', [FindFinanceByIdController::class, 'findFinanceById'])
    ->middleware(['auth:api']);

