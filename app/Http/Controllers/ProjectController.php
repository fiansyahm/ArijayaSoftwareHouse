<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ProjectController extends Controller
{
    public function home(){
        $projects = Project::all();
        return view('home', compact('projects'));
    }
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin == 2||$user->isAdmin == 3) {
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
        if (!($user->isAdmin ==2 || $user->isAdmin == 3)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $users = User::all();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        if (!($user->isAdmin ==2 || $user->isAdmin == 3)) {
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
        return view('projects.show', compact('project'));
    }


    public function detail($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.detail', compact('project'));
    }

    public function edit(Project $project)
    {
        $user = Auth::user();
        if (!($user->isAdmin ==2 || $user->isAdmin == 3)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $users = User::all();
        return view('projects.edit', compact('project', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'brief' => 'nullable|string',
            'demo' => 'nullable|string',
            'file' => 'nullable|string',
            'tech' => 'nullable|string',
            'customer_phone' => 'nullable|string',
            'price' => 'nullable|integer',
            'fee' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'isDone' => 'required',
            'programmers' => 'nullable|array',
            'json' => 'required|array',
            'json.*.id' => 'required|integer',
            'json.*.feature' => 'required|string',
            'json.*.status' => 'required|in:0,1',
            'json.*.stakeholder' => 'required|string',
            'json.*.assigned_to' => 'required|string',
            'json.*.start' => 'required|date',
            'json.*.end' => 'required|date|after_or_equal:json.*.start',
        ]);

        // Process JSON data
        $jsonData = $request->input('json');
        foreach ($jsonData as &$feature) {
            // Cast numeric fields to integers
            $feature['id'] = (int)$feature['id'];
            $feature['status'] = (int)$feature['status'];

            // Process stakeholders into an array
            $feature['stakeholder'] = array_map('trim', explode(',', $feature['stakeholder']));

            // Ensure datetime format includes seconds
            $startDateTime = new DateTime(str_replace('T', ' ', $feature['start']));
            $endDateTime = new DateTime(str_replace('T', ' ', $feature['end']));
            $feature['start'] = $startDateTime->format('Y-m-d H:i:s');
            $feature['end'] = $endDateTime->format('Y-m-d H:i:s');
        }

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'isDone' => $request->isDone,
            'programmers' => json_encode($request->programmers ?? []),
            'json' => $jsonData,
            'thumbnail' => $request->thumbnail,
            'brief' => $request->brief,
            'demo' => $request->demo,
            'file' => $request->file,
            'tech' => $request->tech,
            'customer_phone' => $request->customer_phone?? $project->customer_phone,
            'price' => $request->price?? $project->price,
            'fee' => $request->fee?? $project->fee
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
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

    public function ourprojects() {
        $projects = Project::all();
        return view('projects.ourprojects', compact('projects'));
    }

}