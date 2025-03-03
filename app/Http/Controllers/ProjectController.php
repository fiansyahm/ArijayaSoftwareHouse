<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin == 2) {
            $projects = Project::all();
        } else if ($user->isAdmin == 1) {
            $projects = Project::whereJsonContains('programmers', strval($user->id))->get();
        }

        $users = User::all();
        return view('projects.index', compact('projects', 'users'));
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->isAdmin != 2) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $users = User::all();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->isAdmin != 2) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'programmers' => 'required|array',
            'programmers.*' => 'exists:users,id',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'programmers' => json_encode($request->programmers), // Simpan sebagai JSON
        ]);

        return redirect()->route('projects.index');
    }


    public function show(Project $project)
    {
        $user = Auth::user();
        if ($user->isAdmin != 2) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $user = Auth::user();
        if ($user->isAdmin != 2) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $users = User::all();
        return view('projects.edit', compact('project', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $user = Auth::user();
        if ($user->isAdmin != 2) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'json' => 'required|string', // JSON dalam bentuk string
        ]);

        $project->update($request->all());

         // Decode JSON dari textarea dan simpan ke database
        $decodedJson = json_decode($request->json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['json' => 'Format JSON tidak valid!']);
        }

        $project->update(['json' => $decodedJson]);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $user = Auth::user();
        if ($user->isAdmin != 2) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $project->delete();
        return redirect()->route('projects.index');
    }

    public function updateJson(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        // Validasi data dari request
        $request->validate([
            'json' => 'required|array',
        ]);

        // Update kolom JSON
        $project->json = $request->input('json');
        $project->save();

        return response()->json(['message' => 'Progress updated successfully!']);
    }

}