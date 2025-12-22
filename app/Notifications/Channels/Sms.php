<?php
namespace App\Notifications\Channels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;

class Sms
{
    
    public function send(object $notifiable, Notification $notification): void
    {
        // $to = '';
        $message = $notification->toSms($notifiable);

        $apiKey = config('services.sms.api_key');
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type' => 'application/json',
        ])
        ->withOptions(['verify' => false])
        ->post('https://app.text.lk/api/v3/sms/send', [
            'recipient' => '94763989391',
            'sender_id' => 'TextLKDemo',
            'type' => 'plain',
            'message' => $message,
        ]);

        $payload = $response->json();

        if ($response->successful() && (($payload['status'] ?? null) === 'success')) {
            return;
        }

        Log::error('SMS channel failed', ['response' => $payload, 'status' => $response->status()]);
    }
}