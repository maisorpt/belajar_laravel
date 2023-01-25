<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Schedule;
use App\Models\Student_a;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        //get posts
        $presences = DB::table('presences')
                ->join('schedules', 'schedules.id', '=', 'presences.schedule_id')
                ->join('student_as', 'student_as.id', '=', 'presences.student_id')
                ->select('presences.id','schedules.note as schedule', 'student_as.name', 'presences.presence', 'presences.note')
                ->paginate(10);

        //render view with posts
        return view('presences.index', compact('presences'));
    }

    public function create()
    {
        $schedules = Schedule::all();
        $student_as = Student_a::all();

        return view('presences.create', compact('schedules','student_as'));
    }

    public function store(Request $request)
    {
        //validate form
        //validate form
        $this->validate($request, [
            'course' => 'required',
            'student' => 'required',
            'presence' => 'required',
            'note' => 'required'
        ]);

        //create post
        Presence::create([
            'schedule_id' => $request->course,
            'student_id' => $request->student,
            'presence' => $request->presence,
            'note' => $request->note

        ]);

        //redirect to index
        return redirect()->route('presences.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Presence $presence)
    {
        $schedules = Schedule::all();
        $student_as = Student_a::all();
        

        return view('presences.edit', compact('presence', 'schedules', 'student_as'));
    }


    public function update(Request $request, Presence $presence)
    {
        //validate form
        $this->validate($request, [
            'course' => 'required',
            'student' => 'required',
            'presence' => 'required',
            'note' => 'required'
        ]);

        //create post
        $presence->update([
            'schedule_id' => $request->course,
            'student_id' => $request->student,
            'presence' => $request->presence,
            'note' => $request->note

        ]);

        //redirect to index
        return redirect()->route('presences.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Presence $presence)
    {
        
        $presence->delete();

        //redirect to index
        return redirect()->route('$presences.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
