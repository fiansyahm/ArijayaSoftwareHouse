<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($projectId, $userId)
    {
        $projects = Project::where('id', $projectId)
        ->whereJsonContains('programmers', (string) $userId)
        ->first();
        if($projects == null) {
            return redirect()->route('projects.index');
        }
        // Ambil pesan antara user login dan user lain
        $messages = Message::where(function ($q) use ( $projectId, $userId) {
            $q->where('project_id', $projectId)->where('from_id', Auth::id())->where('to_id', $userId);
        })
        ->orWhere(function ($q) use ($userId) {
            $q->where('from_id', $userId)->where('to_id', Auth::id());
        })
        ->orderBy('id', 'asc')
        ->get();

        $programmers = json_decode($projects->programmers);
        $programmers = array_values(
            array_diff($programmers, [Auth::user()->id])
        );
        return view('chat/index', [
            'projectId' => $projectId,
            'messages' => $messages,
            'userId' => $userId,
            'programmers' => $programmers
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'to_id'   => 'required|integer|exists:users,id',
            'project_id' => 'required|integer|exists:projects,id',
        ]);

        $message = Message::create([
            'from_id'   => Auth::id(),
            'to_id'     => $request->to_id,
            'message'   => $request->message, // teks biasa atau base64 gambar
            'project_id' => $request->project_id
        ]);

        // Opsional: broadcast event jika pakai Laravel Echo / Pusher
        // broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'status'  => 'success',
            'message' => $message,
        ], 201);
    }

    public function fetch($projectId,$userId)
    {
        $messages = Message::where(function ($q) use ($projectId,$userId) {
            $q->where('from_id', Auth::id())
            ->where('project_id', $projectId)
            ->where('to_id', $userId);
        })->orWhere(function ($q) use ($projectId,$userId) {
            $q->where('from_id', $userId)
            ->where('project_id', $projectId)
            ->where('to_id', Auth::id());
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

}
