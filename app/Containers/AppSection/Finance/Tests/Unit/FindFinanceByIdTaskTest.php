<?php

namespace App\Containers\AppSection\Finance\Tests\Unit;

use App\Containers\AppSection\Finance\Events\FinanceFoundByIdEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tasks\FindFinanceByIdTask;
use App\Containers\AppSection\Finance\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindFinanceByIdTaskTest.
 *
 * @group finance
 * @group unit
 */
class FindFinanceByIdTaskTest extends TestCase
{
    public function testFindFinanceById(): void
    {
        Event::fake();
        $finance = Finance::factory()->create();

        $foundFinance = app(FindFinanceByIdTask::class)->run($finance->id);

        $this->assertEquals($finance->id, $foundFinance->id);
        Event::assertDispatched(FinanceFoundByIdEvent::class);
    }

    public function testFindFinanceWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindFinanceByIdTask::class)->run($noneExistingId);
    }
}
