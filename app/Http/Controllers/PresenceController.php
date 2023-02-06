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
            ->select('presences.id', 'schedules.note as schedule', 'student_as.name', 'presences.presence', 'presences.note')
            ->paginate(10);

        //render view with posts
        return view('presences.index', compact('presences'));
    }

    public function create()
    {
        $schedules = Schedule::all();
        $student_as = Student_a::all();

        return view('presences.create', compact('schedules', 'student_as'));
    }

    public function attendance(Request $request)
    {
        $schedule_id = $request->input('id');
        $student_as = Student_a::all();

        return view('presences.attendance', compact('schedule_id', 'student_as'));
    }
    public function attendance_store(Request $request)
    {
        $counter = $request->input('counter');

        //create post
        $rules = [];
        for ($i = 1; $i <= $counter; $i++) {
            $rules['course' . $i] = 'required';
            $rules['student' . $i] = 'required';
            $rules['presence' . $i] = 'required';
            $rules['note' . $i] = 'required';
        }
        $this->validate($request, $rules);

        for ($i = 1; $i <= $counter; $i++) {
            $course[$i] = $request->input('course' . $i);
            $student[$i] = $request->input('student' . $i);
            $presence[$i] = $request->input('presence' . $i);
            $note[$i] = $request->input('note' . $i);

            try {
                Presence::create([
                    'schedule_id' => $course[$i],
                    'student_id' => $student[$i],
                    'presence' => $presence[$i],
                    'note' => $note[$i]
                ]);
            } catch (\Exception $e) {
                // Handle the exception here
            }
        }

        //redirect to index
        return redirect()->route('presences')->with(['success' => 'Data Berhasil Disimpan!']);
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
        return redirect()->route('presences')->with(['success' => 'Data Berhasil Disimpan!']);
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
        return redirect()->route('presences')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Presence $presence)
    {

        $presence->delete();

        //redirect to index
        return redirect()->route('presences')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}