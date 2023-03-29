<?php

/**
 * @apiGroup           Finance
 * @apiName            UpdateFinance
 *
 * @api                {PATCH} /v1/finances/:id Update Finance
 * @apiDescription     Updates a personal or shared group finance transaction (debt or income).
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiBody            {Integer} [group_id] The ID of the group it belongs to.
 * @apiBody            {String{2..60}} [name] A brief name for the finance.
 * @apiBody            {String="debt","income"} [type] The type of finance: debt or income.
 * @apiBody            {Float{0..}} [value] The value of the finance.
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
 *          "id": "NxOpZowo9GmjKqdR",
 *          "group_id": null,
 *          "name": "Eletrecity",
 *          "type": "debt",
 *          "value": 120,
 *          "description": null,
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

use App\Containers\AppSection\Finance\UI\API\Controllers\UpdateFinanceController;
use Illuminate\Support\Facades\Route;

Route::patch('finances/{id}', [UpdateFinanceController::class, 'updateFinance'])
    ->middleware(['auth:api']);

