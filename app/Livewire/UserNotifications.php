<?php

namespace App\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserNotifications extends Component
{

    public function markAsRead($id)
    {
        $notification = DatabaseNotification::find($id);

        if ($notification) {
            $notification->markAsRead();
        }
    }
    
    public function render()
    {
        $notifications = auth()->check()
        ? auth()->user()->unreadNotifications()->get()
        : collect();

        return view('livewire.user-notifications', [
            'notifications' => $notifications
        ]);
    }
}
