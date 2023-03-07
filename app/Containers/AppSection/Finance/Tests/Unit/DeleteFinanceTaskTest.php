<?php

namespace App\Containers\AppSection\Finance\Tests\Unit;

use App\Containers\AppSection\Finance\Events\FinanceDeletedEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tasks\DeleteFinanceTask;
use App\Containers\AppSection\Finance\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteFinanceTaskTest.
 *
 * @group finance
 * @group unit
 */
class DeleteFinanceTaskTest extends TestCase
{
    public function testDeleteFinance(): void
    {
        Event::fake();
        $finance = Finance::factory()->create();

        $result = app(DeleteFinanceTask::class)->run($finance->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(FinanceDeletedEvent::class);
    }

    public function testDeleteFinanceWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteFinanceTask::class)->run($noneExistingId);
    }
}
