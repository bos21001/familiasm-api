<?php

namespace App\Containers\AppSection\Finance\Tests\Unit;

use App\Containers\AppSection\Finance\Events\FinancesListedEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tasks\GetAllActualUserFinancesTask;
use App\Containers\AppSection\Finance\Tests\TestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllFinancesTaskTest.
 *
 * @group finance
 * @group unit
 */
class GetAllActualUserFinancesTaskTest extends TestCase
{
    public function testGetAllFinances(): void
    {
        Event::fake();
        Finance::factory()->count(3)->create();

        $foundFinances = app(GetAllActualUserFinancesTask::class)->run();

        $this->assertCount(3, $foundFinances);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundFinances);
        Event::assertDispatched(FinancesListedEvent::class);
    }
}
