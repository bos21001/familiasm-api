<?php

namespace App\Containers\AppSection\Finance\UI\API\Tests\Functional;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllFinancesTest.
 *
 * @group finance
 * @group api
 */
class GetAllFinancesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/finances';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllFinancesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Finance::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllFinancesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Finance::factory()->count(2)->create();
//
//        $response = $this->makeCall();
//
//        $response->assertStatus(403);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('message')
//                    ->where('message', 'This action is unauthorized.')
//                    ->etc()
//        );
//    }

    // TODO TEST
//    public function testSearchFinancesByFields(): void
//    {
//        Finance::factory()->count(3)->create();
//        // create a model with specific field values
//        $finance = Finance::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($finance->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $finance->name)
//                    ->etc()
//        );
//    }

    public function testSearchFinancesByHashID(): void
    {
        $finances = Finance::factory()->count(3)->create();
        $secondFinance = $finances[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondFinance->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondFinance->getHashedKey())
                    ->etc()
        );
    }
}
