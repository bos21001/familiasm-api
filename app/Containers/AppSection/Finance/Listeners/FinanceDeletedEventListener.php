<?php

namespace App\Containers\AppSection\Finance\Listeners;

use App\Containers\AppSection\Finance\Events\FinanceDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FinanceDeletedEvent $event): void
    {
        //
    }
}
