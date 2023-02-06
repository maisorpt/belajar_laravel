<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_a;
use Illuminate\Support\Facades\Storage;

class Student_aController extends Controller
{
    public function index()
    {
        //get posts
        $student_as = Student_a::latest()->paginate(5);

        //render view with posts
        return view('student_as.index', compact('student_as'));
    }

    public function create()
    {
        return view('student_as.create');
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
        return redirect()->route('student_as')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Student_a $student_a)
    {
        return view('student_as.edit', compact('student_a'));
    }

    public function update(Request $request, Student_a $student_a)
    {
        //validate form
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:5',
            'email' => 'required|min:3',
            'phone' => 'required|min:2'
        ]);

        //check if image is uploaded
        if ($request->hasFile('photo')) {

            //upload new image
            $image = $request->file('photo');
            $image->storeAs('public/storage', $image->hashName());

            //delete old image

            Storage::delete('public/storage/' . $student_a->image);

            //update post with new image
            $student_a->update([
                'photo' => $image->hashName(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->email,
            ]);

        } else {

            //update student_a$student_a without image
            $student_a->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->email,
            ]);
        }

        //redirect to index
        return redirect()->route('student_as')->with(['success' => 'Data Berhasil Diubah!']);
    }

        public function destroy(Student_a $student_a)
    {
        //delete image
        Storage::delete('public/storage/'. $student_a->image);

        //delete post
        $student_a->delete();

        //redirect to index
        return redirect()->route('student_as')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}