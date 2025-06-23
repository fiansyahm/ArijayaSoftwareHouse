<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Templatechat;
use Illuminate\Support\Facades\Storage;

class TemplatechatController extends Controller
{
    public function index()
    {
        $templatechats = Templatechat::all();
        return view('templatechat.index', compact('templatechats'));
    }

    public function create()
    {
        return view('templatechat.createedit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contain' => 'required'
        ]);

        $data = $request->all();

        Templatechat::create($data);

        return redirect('/templatechats')->with('success', 'Templatechat created successfully.');
    }

    public function show(Templatechat $templatechat)
    {
        return view('templatechat.show', compact('templatechat'));
    }

    public function edit(Templatechat $templatechat)
    {
        return view('templatechat.createedit', compact('templatechat'));
    }

    public function update(Request $request, Templatechat $templatechat)
    {
        $request->validate([
            'name' => 'required',
            'contain' => 'required',
        ]);

        $data = $request->all();
        $templatechat->update($data);

        return redirect('/templatechats')->with('success', 'Templatechat updated successfully.');
    }

    public function destroy(Templatechat $templatechat)
    {
        $templatechat->delete();

        return redirect()->back()->with('success', 'Templatechat deleted successfully.');
    }


}
