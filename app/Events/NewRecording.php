<?php

namespace App\Events;

use App\Models\Recordings;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewRecording implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recording;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Recordings $recording)
    {
        $this->recording = $recording;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        error_log($this->recording);
        return new Channel('fishPond.' . $this->recording->fishPondId);
    }

    public function broadcastAs()
    {
        return 'newRecording';
    }
}
