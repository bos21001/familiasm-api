<?php

namespace App\Containers\AppSection\Finance\UI\API\Tests\Functional;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteFinanceTest.
 *
 * @group finance
 * @group api
 */
class DeleteFinanceTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/finances/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingFinance(): void
    {
        $finance = Finance::factory()->create();

        $response = $this->injectId($finance->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingFinance(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteFinance(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $finance = Finance::factory()->create();
//
//        $response = $this->injectId($finance->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
