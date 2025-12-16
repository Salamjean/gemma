<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class FingerprintCaptureEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $event;
    public $data;
    public $userId;
    public $timestamp;

    public function __construct($event, $data = [])
    {
        $this->event = $event;
        $this->data = $data;
        $this->userId = Auth::id();
        $this->timestamp = now()->toISOString();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('fingerprint.user.' . $this->userId);
    }

    public function broadcastAs()
    {
        return 'fingerprint.event';
    }

    public function broadcastWith()
    {
        return [
            'type' => $this->event,
            'data' => $this->data,
            'user_id' => $this->userId,
            'timestamp' => $this->timestamp,
            'session_id' => session()->getId(),
        ];
    }
}