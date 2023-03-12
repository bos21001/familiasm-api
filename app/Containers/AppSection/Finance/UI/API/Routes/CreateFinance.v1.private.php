<?php

/**
 * @apiGroup           Finance
 * @apiName            CreateFinance
 *
 * @api                {POST} /v1/finances Create Finance
 * @apiDescription     Creates a personal or shared group finance transaction (debt or income).
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} Accept=application/json
 * @apiHeader          {String} Authorization=Bearer
 *
 * @apiBody            {Integer} [group_id] The ID of the group it belongs to.
 * @apiBody            {String{2..60}} name A brief name for the finance.
 * @apiBody            {String="debt","income"} type The type of finance: debt or income.
 * @apiBody            {Float{0..}} value The value of the finance.
 * @apiBody            {String{..300}} [description] A detailed description for the finance.
 * @apiBody            {Boolean} [repeats=false] If it repeats or not.
 * @apiBody            {Boolean} [business_day_only=false] If it is a business day only finance transaction.
 * @apiBody            {Integer{1..}} [repeats_every] The number of every repetition.
 * @apiBody            {String="day","week","month","year"} [repetition_period] The period to be repeated.
 * @apiBody            {Timestamp{greater than or equal to today timestamp}} [ends="0000-00-00"] The end date in Y-m-d format.
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
 *          "readable_created_at": "1 second ago"
 *      },
 *      "meta": {
 *          "include": [],
 *          "custom": []
 *      }
 * }
 */

use App\Containers\AppSection\Finance\UI\API\Controllers\CreateFinanceController;
use Illuminate\Support\Facades\Route;

Route::post('finances', [CreateFinanceController::class, 'createFinance'])
    ->middleware(['auth:api']);

