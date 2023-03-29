<?php

namespace App\Containers\AppSection\Finance\Listeners;

use App\Containers\AppSection\Finance\Events\FinanceFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FinanceFoundByIdEvent $event): void
    {
        //
    }
}
