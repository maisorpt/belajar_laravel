<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student_a;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        //get posts
        

        $groups = DB::table('groups')
            ->join('users', 'users.id', '=', 'groups.user_id')
            ->join('classrooms', 'classrooms.id', '=', 'groups.classroom_id')
            ->select('groups.id', 'users.name as user_name', 'classrooms.name as class_name');
                // ->paginate(10);

        //render view with posts
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        $student_as = Student_a::all();
        $classrooms = Classroom::all();

        return view('groups.create', compact('students_as'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:5',
            'email' => 'required|min:3',
            'phone' => 'required|min:2'
        ]);

        Storage::makeDirectory('public/storage');

        //upload image
        $image = $request->file('photo');
        $image->storeAs('public/storage', $image->hashName());

        //create post
        Student_a::create([
            'photo' => $image->hashName(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->email,

        ]);

        //redirect to index
        return redirect()->route('student_as.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Group $groups)
    {
        $student_as = Student_a::all();
        $classrooms = Classroom::all();

        return view('groups.edit', compact('groups', 'student_as', 'classrooms'));
    }

    public function destroy(Group $group)
    {
        //delete image

        //delete post
        $group->delete();

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
