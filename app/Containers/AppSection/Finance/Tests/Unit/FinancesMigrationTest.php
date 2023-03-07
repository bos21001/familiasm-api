<?php

namespace App\Containers\AppSection\Finance\Tests\Unit;

use App\Containers\AppSection\Finance\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class FinancesMigrationTest.
 *
 * @group finance
 * @group unit
 */
class FinancesMigrationTest extends TestCase
{
    public function test_finances_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('finances', $column));
        }
    }
}
