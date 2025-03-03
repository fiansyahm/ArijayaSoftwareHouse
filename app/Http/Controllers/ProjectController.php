<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
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

    public function assignProject(Request $request, $projectId, $featureId)
    {
        $project = Project::findOrFail($projectId);
        $jsonData = $project->json;

        foreach ($jsonData as &$feature) {
            if ($feature['id'] == $featureId) {
                $feature['assigned_to'] = $request->assigned_to;
                break;
            }
        }

        $project->update(['json' => $jsonData]);

        return response()->json(['message' => 'Project assigned successfully!', 'json' => $jsonData]);
    }

    public function updateProgress(Request $request, $projectId, $featureId)
    {
        $project = Project::findOrFail($projectId);
        $jsonData = $project->json;

        foreach ($jsonData as &$feature) {
            if ($feature['id'] == $featureId) {
                $feature['status'] = $request->status; // 0: To Do, 1: Progress, 2: Done
                break;
            }
        }

        $project->update(['json' => $jsonData]);

        return response()->json(['message' => 'Progress updated successfully!', 'json' => $jsonData]);
    }


}