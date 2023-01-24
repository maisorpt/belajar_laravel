<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{

        public function index(){
            $classrooms = Classroom::latest()->paginate(5);

            //render view with posts
            return view('classrooms.index', compact('classrooms'));
        }

        public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name' => 'required'
        ]);

        //create post
        Classroom::create([
            'name' => $request->name

        ]);

        //redirect to index
        return redirect()->route('classrooms.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }


    public function update(Request $request, Classroom $classroom)
    {
        //validate form
        $this->validate($request, [
            'name' => 'required'
        ]);

        //create post
        $classroom->update([
            'name' => $request->name

        ]);

        //redirect to index
        return redirect()->route('classrooms.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Classroom $classroom)
    {
        
        $classroom->delete();

        //redirect to index
        return redirect()->route('classrooms.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}

