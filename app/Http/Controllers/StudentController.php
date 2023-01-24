<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
    public function index()
    {

        $students = Student::latest()->paginate(5);
        //render view with students
        return view('students.index', compact('students'));
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            // 'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'     => 'required|min:1',
            'asal'   => 'required|min:1',
            'nohp'   => 'required|min:1'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        Student::create([
            // 'image'     => $image->hashName(),
            'nama'     => $request->nama,
            'asal'   => $request->asal,
            'nohp'   => $request->nohp
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
        
    }
    public function update(Request $request, Student $student)
    {
        //validate form
        $this->validate($request, [
            // 'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'     => 'required|min:1',
            'asal'   => 'required|min:1',
            'nohp'   => 'required|min:1'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            // $image = $request->file('image');
            // $image->storeAs('public/posts', $image->hashName());

            //delete old image
            // Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $student->update([
                // 'image'     => $image->hashName(),
                'nama'     => $request->nama,
                'asal'   => $request->asal,
                'nohp'   => $request->nohp
            ]);

        } else {

            //update post without image
            $student->update([
                'nama'     => $request->nama,
                'asal'   => $request->asal,
                'nohp'   => $request->nohp
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Student $student)
    {
        //delete image
        // Storage::delete('public/posts/'. $post->image);

        //delete post
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
