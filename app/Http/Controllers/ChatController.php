<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    function getMyId(Request $request = null)
    {
        if ($request && $request->query('id')&&Auth::id()==1) {
            $myId = $request->query('id');
            return $myId;
        }
        return Auth::id();
    }

    public function index(Request $request, $projectId, $userId)
    {
        $myId = $this->getMyId($request);
        // $myId = 48;

        $projects = Project::where('id', $projectId)
        ->whereJsonContains('programmers', (string) $userId)
        ->first();
        if($projects == null) {
            return redirect()->route('projects.index');
        }
        // Ambil pesan antara user login dan user lain
        $messages = Message::where(function ($q) use ( $projectId, $userId, $myId) {
            $q->where('project_id', $projectId)->where('from_id', $myId)->where('to_id', $userId);
        })
        ->orWhere(function ($q) use ($userId, $myId) {
            $q->where('from_id', $userId)->where('to_id', $myId);
        })
        ->orderBy('id', 'asc')
        ->get();

        $programmers = json_decode($projects->programmers);
        $programmers = array_values(
            array_diff($programmers, [$myId])
        );
        return view('chat/index', [
            'projectId' => $projectId,
            'messages' => $messages,
            'userId' => $userId,
            'programmers' => $programmers,
            'myId' => $myId
        ]);
    }

    public function send(Request $request)
    {
        $myId = $this->getMyId($request);
        // $myId = 48;

        $request->validate([
            'message' => 'required|string',
            'to_id'   => 'required|integer|exists:users,id',
            'project_id' => 'required|integer|exists:projects,id',
        ]);

        $message = Message::create([
            'from_id'   => $myId,
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

    public function fetch(Request $request,$projectId,$userId)
    {
        $myId = $this->getMyId($request);
        // $myId = 48;

        $messages = Message::where(function ($q) use ($projectId,$userId,$myId) {
            $q->where('from_id', $myId)
            ->where('project_id', $projectId)
            ->where('to_id', $userId);
        })->orWhere(function ($q) use ($projectId,$userId,$myId) {
            $q->where('from_id', $userId)
            ->where('project_id', $projectId)
            ->where('to_id', $myId);
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

}
