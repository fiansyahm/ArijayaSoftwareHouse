<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function index($id = 'customer')
    {
        $questions = null;
        if ($id=='all') {
            $questions = Question::all();
        }
        else {
            $questions = Question::all()->where('usertype', $id);
        }
        return view('questions.index', compact('questions'));
    }

    public function list($id)
    {
        return $this->index($id);
    }

    public function create()
    {
        return view('questions.createedit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contain' => 'required',
            'image' => 'nullable|image',
            'usertype' => 'nullable|string',
            'youtube' => 'nullable|string',
            'isActive'=> 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Question::create($data);

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        return view('questions.createedit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'name' => 'required',
            'contain' => 'required',
            'image' => 'nullable|image',
            'usertype' => 'nullable|string',
            'youtube' => 'nullable|string',
            'isActive'=> 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $question->update($data);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        if ($question->image) {
            Storage::delete('public/' . $question->image);
        }

        $question->delete();

        return redirect()->back()->with('success', 'Question deleted successfully.');
    }

    public function questionAnswer()
    {
        $questions = Question::all();
        return view('questions.question-answer', compact('questions'));
    }

    public function questionAnswerDetail($id)
    {
        $question = Question::find($id);
        return view('questions.question-answer-detail', compact('question'));
    }

    public function change($id,$usertype)
    {
        $question = Question::find($id);
        $question->usertype = $usertype;
        $question->save();
        return redirect()->back()->with('success', 'Question updated successfully.');
    }

}
