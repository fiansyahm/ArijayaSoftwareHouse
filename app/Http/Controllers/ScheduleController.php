<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Wedding;
use App\Models\Confirmation;
use App\Models\Page;
use App\Models\Video;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', ['schedules' => $schedules]);
    }
    public function create(){
        return view('schedule.create');
    }
    public function store(Request $request): RedirectResponse
    {
        // Validate the request...

        $schedules = new Schedule;

        $schedules->title = $request->title;
        $schedules->isActive = $request->isActive;
        $schedules->arrival_time_1_start = $request->arrival_time_1_start;
        $schedules->arrival_time_1_end = $request->arrival_time_1_end;
        $schedules->departure_time_1_start = $request->departure_time_1_start;
        $schedules->departure_time_1_end = $request->departure_time_1_end;
        $schedules->arrival_time_2_start = $request->arrival_time_2_start;
        $schedules->arrival_time_2_end = $request->arrival_time_2_end;
        $schedules->departure_time_2_start = $request->departure_time_2_start;
        $schedules->departure_time_2_end = $request->departure_time_2_end;
        
        $schedules->save();

        return redirect('/admin/schedule');
    }

    public function delete($id){
        $schedules = Schedule::find($id);
        $schedules->delete();
        return redirect('/admin/schedule')->with('status', 'Data berhasil dihapus');
    }

    public function edit($id){
        $schedule = Schedule::find($id);
        return view('schedule.edit', ['schedule' => $schedule]);
    }

    public function update(Request $request, $id)
    {
        $schedule = $request->except(['id', '_token']); // Exclude the 'id' and '_token' fields

        Schedule::where('id', $request->id)->update($schedule);

        // You can return a response indicating the update was successful
        return redirect()->back()->with('status', 'Data Sukses Diupdate');
    }

    public function updateStatus($id)
    {
        $schedule = Schedule::find($id);
        $schedule->update([
            'isActive' => 1,
        ]);
        $schedules = Schedule::all();
        foreach($schedules as $s){
            if($s->id != $id){
                $s->update([
                    'isActive' => 0,
                ]);
            }
        }
        return redirect()->back()->with('status', 'Data berhasil diupdate');
    }
}
