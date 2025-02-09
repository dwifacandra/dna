<?php

namespace App\Core\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DevEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recipient;
    public $command;
    public $output;
    public $success;

    public function __construct($recipient, $command, $output, $success)
    {
        $this->recipient = $recipient;
        $this->command = $command;
        $this->output = $output;
        $this->success = $success;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user.' . $this->recipient->id);
    }
}
