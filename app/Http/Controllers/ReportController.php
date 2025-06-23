<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Wedding;
use App\Models\Templatereport;
use App\Models\User;
use App\Models\Song;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function search($data){
        return redirect("/song/list/$data");
    }
    public function list($id)
    {
        if ($id === 'all') {
            $songs = Song::query();
        } else {
            $songs = Song::where('id', 'like', '%' . $id . '%')
                ->orWhere('name', 'like', '%' . $id . '%');
        }
        // Mengurutkan lagu berdasarkan nama secara ascending
        $songs = $songs->orderBy('name', 'asc')->paginate(10); // Menggunakan paginate untuk membatasi hasil per halaman
        
        return view('song.index', ['songs' => $songs]);
    }

    public function create($id)
    {
        $users = User::all();
        $templatereport=Templatereport::all()->where('id_absence',$id)->first();
        return view('report.create',['users'=>$users,'templatereport'=>$templatereport,'id'=>$id]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_absence' => 'required',
            'contain' => 'required'
        ]);

        $data = $request->all();
        Templatereport::create($data);
        return redirect()->back()->with('success', 'Templatechat created successfully.');
    }

    public function delete($id)
    {
        $song = Song::find($id);
        // delete $image->storeAs('public/song', $imageName);
        $songName ='url' .  $song ->name;
        Storage::delete('public/song/' . $songName);
        $song->delete();
        return redirect()->back()->with('status', 'Lagu berhasil dihapus');
    }

    public function edit($id)
    {
        $song = Song::find($id);
        return view('song.edit', ['song' => $song]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_absence' => 'required',
            'contain' => 'required',
        ]);

        $templatereport=Templatereport::find($id);
        $data = $request->all();
        $templatereport->update($data);

        return redirect()->back()->with('success', 'Templatereport created successfully.');
    }

}
