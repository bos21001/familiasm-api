<?php

namespace App\Containers\AppSection\Finance\Data\Factories;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class FinanceFactory extends ParentFactory
{
    protected $model = Finance::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
