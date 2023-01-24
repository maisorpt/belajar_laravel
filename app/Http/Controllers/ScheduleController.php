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
                ->join('users', 'users.id', '=', 'schedules.user_id')
                ->select('schedules.id','groups.name as class', 'users.name as teacher', 'schedules.note','schedules.time_start as start','schedules.time_end as end' )
                ->paginate(10);

        //render view with posts
        return view('schedules.index', compact('schedules'));
    }
}
