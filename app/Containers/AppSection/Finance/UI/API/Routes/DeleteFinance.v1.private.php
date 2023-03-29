<?php

/**
 * @apiGroup           Finance
 * @apiName            DeleteFinance
 *
 * @api                {DELETE} /v1/finances/:id Delete Finance
 * @apiDescription     Delete a finance
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
 */

use App\Containers\AppSection\Finance\UI\API\Controllers\DeleteFinanceController;
use Illuminate\Support\Facades\Route;

Route::delete('finances/{id}', [DeleteFinanceController::class, 'deleteFinance'])
    ->middleware(['auth:api']);

