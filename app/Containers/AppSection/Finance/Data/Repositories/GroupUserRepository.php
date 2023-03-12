<?php

namespace App\Containers\AppSection\Finance\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class GroupUserRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}