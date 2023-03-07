<?php

namespace App\Containers\AppSection\Finance\Tests\Unit;

use App\Containers\AppSection\Finance\Events\FinanceUpdatedEvent;
use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tasks\UpdateFinanceTask;
use App\Containers\AppSection\Finance\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateFinanceTaskTest.
 *
 * @group finance
 * @group unit
 */
class UpdateFinanceTaskTest extends TestCase
{
    // TODO TEST
    public function testUpdateFinance(): void
    {
        Event::fake();
        $finance = Finance::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedFinance = app(UpdateFinanceTask::class)->run($data, $finance->id);

        $this->assertEquals($finance->id, $updatedFinance->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedFinance->some_field);
        Event::assertDispatched(FinanceUpdatedEvent::class);
    }

    public function testUpdateFinanceWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateFinanceTask::class)->run([], $noneExistingId);
    }
}
