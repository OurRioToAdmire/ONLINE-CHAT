<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\User;


class MensajeController extends Controller
{
    public function conversation($id) {
        $other = User::findOrFail($id);

        $messages = Mensaje::where(function ($q) use ($id) {
                $q->where('sender_id', auth()->id())
                  ->where('receiver_id', $id);
            })
            ->orWhere(function ($q) use ($id) {
                $q->where('sender_id', $id)
                  ->where('receiver_id', auth()->id());
            })
            ->orderBy('created_at')
            ->get();

        return view('chat.conversation', compact('other', 'messages'));
    }

    public function send(Request $request) {
        Mensaje::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
        ]);

        return back();
    }

}
