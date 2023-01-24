<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Classroom;
use App\Models\Student_a;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        //get posts
        $members = DB::table('members')
                ->join('classrooms', 'classrooms.id', '=', 'members.classroom_id')
                ->join('student_as', 'student_as.id', '=', 'members.student_id')
                ->select('members.id', 'classrooms.name as class_name', 'student_as.name as student_name')
                ->paginate(10);

        //render view with posts
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $users = Student_a::all();
        $classrooms = Classroom::all();

        return view('members.create', compact('student_as', 'classrooms'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'student_name' => 'required',
            'classroom' => 'required',
        ]);

        //create post
        Member::create([
            'student_id' => $request->student_name,
            'classroom_id' => $request->classroom

        ]);

        //redirect to index
        return redirect()->route('members.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(member $member)
    {
        $student_as= Student_a::all();
        $classrooms = Classroom::all();

        return view('members.edit', compact('member', 'student_as', 'classrooms'));
    }


    public function update(Request $request, Member $member)
    {
        //validate form
        $this->validate($request, [
            'student_name' => 'required',
            'classroom' => 'required',
        ]);

        //create post
        $member->update([
            'student_id' => $request->student_name,
            'classroom_id' => $request->classroom

        ]);

        //redirect to index
        return redirect()->route('members.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Member $member)
    {
        
        $member->delete();

        //redirect to index
        return redirect()->route('members.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
