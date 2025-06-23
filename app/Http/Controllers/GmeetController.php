<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gmeet;

class GmeetController extends Controller
{
    public function admin_listGmeet()
    {
        $gmeets = Gmeet::all();
        return view('absence.gmeet', compact('gmeets'));
    }

    public function admin_addGmeet()
    {
        return redirect('/admin/list-gmeet')->with('tab', 'add');
    }

    public function admin_storeGmeet(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'date' => 'required|date',
            'link' => 'required',
            'description' => 'required',
        ]);

        Gmeet::create($request->only(['title', 'date', 'link', 'description']));

        return redirect('/admin/list-gmeet')->with('success', 'Gmeet added successfully!');
    }

    public function admin_editGmeet($id) {
        $gmeet = Gmeet::findOrFail($id);
        $gmeets = Gmeet::all();
        return view('absence.gmeet', compact('gmeet', 'gmeets'))->with('editGmeet', $gmeet);
    }

    public function admin_updateGmeet(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:50',
            'date' => 'required|date',
            'link' => 'required',
            'description' => 'required',
        ]);

        $gmeet = Gmeet::findOrFail($id);
        $gmeet->update($request->only(['title', 'date', 'link', 'description']));

        return redirect('/admin/list-gmeet')->with('success', 'Gmeet updated successfully!');
    }

    public function admin_deleteGmeet($id)
    {
        $gmeet = Gmeet::findOrFail($id);
        $gmeet->delete();

        return redirect('/admin/list-gmeet')->with('success', 'Gmeet deleted successfully!');
    }
}
