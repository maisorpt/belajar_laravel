<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
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
            ->select('groups.id', 'users.name as user_name', 'classrooms.name as class_name')
            ->paginate(10);

        //render view with posts
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        $users = User::all();
        $classrooms = Classroom::all();

        return view('groups.create', compact('users', 'classrooms'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'teacher_name' => 'required',
            'classroom' => 'required',
        ]);

        //create post
        Group::create([
            'user_id' => $request->teacher_name,
            'classroom_id' => $request->classroom

        ]);

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Group $group)
    {
        $users = User::all();
        $classrooms = Classroom::all();

        return view('groups.edit', compact('group', 'users', 'classrooms'));
    }


    public function update(Request $request, Group $group)
    {
        //validate form
        $this->validate($request, [
            'teacher_name' => 'required',
            'classroom' => 'required',
        ]);

        //create post
        $group->update([
            'user_id' => $request->teacher_name,
            'classroom_id' => $request->classroom

        ]);

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Diubah!']);
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