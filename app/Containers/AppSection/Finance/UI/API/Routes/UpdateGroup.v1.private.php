<?php

/**
 * @apiGroup           Finance
 * @apiName            UpdateGroup
 *
 * @api                {PATCH} /v1/groups/:id Update Group
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

use App\Containers\AppSection\Finance\UI\API\Controllers\UpdateGroupController;
use Illuminate\Support\Facades\Route;

Route::patch('groups/{id}', [UpdateGroupController::class, 'updateGroup'])
    ->middleware(['auth:api']);

