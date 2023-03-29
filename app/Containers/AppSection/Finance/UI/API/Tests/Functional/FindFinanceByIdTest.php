<?php

namespace App\Containers\AppSection\Finance\UI\API\Tests\Functional;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\UI\API\Tests\ApiTestCase;
use Hashids\Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindFinanceByIdTest.
 *
 * @group finance
 * @group api
 */
class FindFinanceByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/finances/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindFinance(): void
    {
        $finance = Finance::factory()->create();

        $response = $this->injectId($finance->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($finance->id))
                    ->etc()
        );
    }

    public function testFindNonExistingFinance(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredFinanceResponse(): void
    {
        $finance = Finance::factory()->create();

        $response = $this->injectId($finance->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $finance->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindFinanceWithRelation(): void
//    {
//        $finance = Finance::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($finance->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $finance->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
