<?php

namespace App\Containers\AppSection\Finance\Events;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class FinancesListedEvent extends ParentEvent
{
    public function __construct(
        public mixed $finance
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
