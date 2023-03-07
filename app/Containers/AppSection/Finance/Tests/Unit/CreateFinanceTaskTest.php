<?php

namespace App\Containers\AppSection\Finance\Tests\Unit;

use App\Containers\AppSection\Finance\Events\FinanceCreatedEvent;
use App\Containers\AppSection\Finance\Tasks\CreateFinanceTask;
use App\Containers\AppSection\Finance\Tests\TestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateFinanceTaskTest.
 *
 * @group finance
 * @group unit
 */
class CreateFinanceTaskTest extends TestCase
{
    public function testCreateFinance(): void
    {
        Event::fake();
        $data = [];

        $finance = app(CreateFinanceTask::class)->run($data);

        $this->assertModelExists($finance);
        Event::assertDispatched(FinanceCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateFinanceWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateFinanceTask::class)->run($data);
//    }
}
