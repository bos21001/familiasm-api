<?php

namespace App\Containers\AppSection\Finance\Tests\Unit;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Containers\AppSection\Finance\Tests\TestCase;

/**
 * Class FinanceFactoryTest.
 *
 * @group finance
 * @group unit
 */
class FinanceFactoryTest extends TestCase
{
    public function testCreateFinance(): void
    {
        $finance = Finance::factory()->make();

        $this->assertInstanceOf(Finance::class, $finance);
    }
}
