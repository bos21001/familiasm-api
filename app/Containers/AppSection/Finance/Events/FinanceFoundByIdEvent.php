<?php

namespace App\Containers\AppSection\Finance\Events;

use App\Containers\AppSection\Finance\Models\Finance;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class FinanceFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Finance $finance
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
