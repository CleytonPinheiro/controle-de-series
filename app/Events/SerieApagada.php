<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Serie;
use phpDocumentor\Reflection\Types\Object_;

class SerieApagada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var object
     */
    public $serie;

    public function __construct(object $serie)
    {
        $this->serie = $serie;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
