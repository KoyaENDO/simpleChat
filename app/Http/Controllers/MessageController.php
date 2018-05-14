<?php

namespace App\Http\Controllers;

use App\Events\MessagePostEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request) {

        $userMessage = [
            'name' => 'ゲスト'.$request->userId,
            'messages' => [
                [
                    'type' => 'text',
                    'body' => $request->message
                ]
            ]
        ];

        event(new MessagePostEvent($userMessage));

        return response()->json($userMessage);

    }
}
