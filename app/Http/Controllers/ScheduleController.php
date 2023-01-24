<?php

namespace App\Http\Controllers;

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
}
