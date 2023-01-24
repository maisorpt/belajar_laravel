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

}

