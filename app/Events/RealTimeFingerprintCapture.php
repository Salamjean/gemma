<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RealTimeFingerprintCapture implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $eventType;
    public $data;
    public $userId;
    public $sessionId;

    public function __construct($eventType, $data = [], $userId = null, $sessionId = null)
    {
        $this->eventType = $eventType;
        $this->data = $data;
        $this->userId = $userId ?: auth()->id();
        $this->sessionId = $sessionId ?: session()->getId();
        
        // Ajouter un timestamp
        $this->data['timestamp'] = now()->toISOString();
    }

    public function broadcastOn()
    {
        // Canal privé pour l'utilisateur
        return new PrivateChannel('fingerprint.realtime.' . $this->userId);
    }

    public function broadcastAs()
    {
        return 'fingerprint.capture';
    }

    public function broadcastWith()
    {
        return [
            'type' => $this->eventType,
            'data' => $this->data,
            'user_id' => $this->userId,
            'session_id' => $this->sessionId,
            'server_time' => now()->toISOString()
        ];
    }
}