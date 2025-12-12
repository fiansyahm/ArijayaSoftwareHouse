<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($userId)
    {
        $projects = Project::whereJsonContains('programmers', (string) $userId) // atau (int) $userId
            ->get();
        // Ambil pesan antara user login dan user lain
        $messages = Message::where(function ($q) use ($userId) {
            $q->where('from_id', Auth::id())->where('to_id', $userId);
        })
        ->orWhere(function ($q) use ($userId) {
            $q->where('from_id', $userId)->where('to_id', Auth::id());
        })
        ->orderBy('id', 'asc')
        ->get();

        if ($projects->isEmpty()) {
            return redirect()->route('projects.index');
        }

        return view('chat/index', [
            'messages' => $messages,
            'userId' => $userId
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'to_id'   => 'required|integer|exists:users,id',
        ]);

        $message = Message::create([
            'from_id'   => Auth::id(),
            'to_id'     => $request->to_id,
            'message'   => $request->message, // teks biasa atau base64 gambar
        ]);

        // Opsional: broadcast event jika pakai Laravel Echo / Pusher
        // broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'status'  => 'success',
            'message' => $message,
        ], 201);
    }

    public function fetch($userId)
    {
        $messages = Message::where(function ($q) use ($userId) {
            $q->where('from_id', Auth::id())
            ->where('to_id', $userId);
        })->orWhere(function ($q) use ($userId) {
            $q->where('from_id', $userId)
            ->where('to_id', Auth::id());
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

}
