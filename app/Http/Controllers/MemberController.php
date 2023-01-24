<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        //get posts
        $members = DB::table('members')
                ->join('groups', 'groups.id', '=', 'members.group_id')
                ->join('student_as', 'student_as.id', '=', 'members.student_id')
                ->select('members.id', 'groups.name as class_name', 'student_as.name as student_name')
                ->paginate(10);

        //render view with posts
        return view('members.index', compact('members'));
    }
}
