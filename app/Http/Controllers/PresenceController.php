<?php

namespace App\Http\Controllers;

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
}
