<?php

namespace App\Containers\AppSection\Finance\Listeners;

use App\Containers\AppSection\Finance\Events\FinanceUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FinanceUpdatedEvent $event): void
    {
        //
    }
}
