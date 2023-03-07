<?php

namespace App\Containers\AppSection\Finance\Listeners;

use App\Containers\AppSection\Finance\Events\FinanceCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FinanceCreatedEvent $event): void
    {
        //
    }
}
