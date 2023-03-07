<?php

namespace App\Containers\AppSection\Finance\Listeners;

use App\Containers\AppSection\Finance\Events\FinancesListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinancesListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FinancesListedEvent $event): void
    {
        //
    }
}
