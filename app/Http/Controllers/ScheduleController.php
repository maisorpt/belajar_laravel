<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        //get posts
        $schedules = DB::table('schedules')
        ->join('groups', 'groups.id', '=', 'schedules.group_id')
        ->join('users', 'users.id', '=', 'groups.user_id')
        ->join('classrooms', 'classrooms.id', '=', 'groups.classroom_id')
        ->select('schedules.id', 'users.name as teacher', 'classrooms.name as classroom_name', 'schedules.note','schedules.time_start as start','schedules.time_end as end' )
        ->paginate(10);

        //render view with posts
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $groups = Group::all();
        $users = User::all();
        $classrooms = Classroom::all();

        return view('schedules.create', compact('groups','users', 'classrooms'));
    }

    public function store(Request $request)
    {
        //validate form
        //validate form
        $this->validate($request, [
            'teacher_group' => 'required',
            'note' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ]);

        //create post
        Schedule::create([
            'group_id' => $request->teacher_group,
            'note' => $request->note,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end

        ]);

        //redirect to index
        return redirect()->route('schedules')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Schedule $schedule)
    {
        $groups = Group::all();
        $users = User::all();
        $classrooms = Classroom::all();

        return view('schedules.edit', compact('schedule', 'groups', 'users', 'classrooms'));
    }


    public function update(Request $request, Schedule $schedule)
    {
        //validate form
        $this->validate($request, [
            'teacher_group' => 'required',
            'note' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ]);

        //create post
        $schedule->update([
            'group_id' => $request->teacher_group,
            'note' => $request->note,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end

        ]);

        //redirect to index
        return redirect()->route('schedules')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Schedule $schedule)
    {
        
        $schedule->delete();

        //redirect to index
        return redirect()->route('schedules')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
