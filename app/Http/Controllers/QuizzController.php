<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Classroom;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class QuizzController extends Controller
{
    
    public function index()
    {

        $classrooms = Classroom::all();
        //render view with posts
        return view('quizzes.index', compact('classrooms'));
    }

    public function quizzes(Classroom $classroom)
    {
        $quizzes = Quizze::distinct('question_id')->pluck('question_id');

        return view('quizzes.quizzes', compact('quizzes', 'classroom'));
    }

    public function quizze($classroom_id, $quizze_id, $number)
    {
        $quizze = Quizze::where('question_id', $quizze_id)->where('number', $number)->get();
        $classroom = Classroom::where('id', $classroom_id)->first();
        
       
        $limit = Quizze::where('question_id', $quizze_id)
        ->count();

        if($number == $limit - 1){
            $previous_question_id = 0;
            $next_question_id = 1;
        }elseif(0 <= $number ){
            $previous_question_id = 1;
            $next_question_id = 0;
        }else{
            $previous_question_id = 1;
            $next_question_id = 1;
        }
        $test_id = 1;
        $user = Auth::user()->id;
        $answers = Answer::where('question_id', $quizze_id)->where('test_id', $test_id)->where('user_id', $user);
        $answer_list = $answers->select('answer')->get() ?? '';
        $answer = $answers->where('number', $number)->first()->answer ?? '';
    //    dd($answer_list);
        if($answer !== '' && $answer_list !== ''){
            return view('quizzes.quizze', compact('quizze', 'classroom', 'classroom_id', 'quizze_id', 'number', 'previous_question_id', 'next_question_id', 'answer','answer_list', 'limit'));
        }else{
            return view('quizzes.quizze', compact('quizze', 'classroom', 'classroom_id', 'quizze_id', 'number', 'previous_question_id', 'next_question_id', 'limit'));
        }
       
    }

    //     public function submit(Request $request, $classroom_id, $quizze_id, $number)
// {
//     // Process the form data here

    //     // Answer::create([
//     //     'user_id' => $request->user_id,
//     //     'test_id' => $request->test_id,
//     //     'question_id' => $request->question_id,
//     //     'number' => $request->number,
//     //     'answer' => $request->answer

    //     // ]);

    //     // Redirect the user to the next question
//     $nextQuestion = $number + 1;
//     return redirect()->route('quizzes.quizze', ['classroom' => $classroom_id, 'quizze' => $quizze_id, 'number' => $nextQuestion]);
// }
// }
    public function submit(Request $request, $classroom_id, $quiz_id, $number)
    {
        $test_id = 1;
        $user = Auth::user()->id;
        $answer = Answer::where('question_id', $quiz_id)->where('test_id', $test_id)->where('user_id', $user)->where('number', $number)->first();

       // dd($user, $test_id, $quiz_id, $number, $request->answer);

        if ($answer) {
            // Update the answer if it already exists
            $answer->update(['answer' => $request->answer]);
        } else {
            // Create a new answer if it doesn't exist
            Answer::create([
                'user_id' => $user,
                'test_id' => $test_id,
                'question_id' => $quiz_id,
                'number' => $number,
                'answer' => $request->answer

            ]);

       }


        if ($request->has('previous')) {
            // Redirect to the previous question page
            $previous_number = $number - 1;
            return redirect()->route('quizzes.quizze', [
                'classroom' => $classroom_id,
                'quizze' => $quiz_id,
                'number' => $previous_number,
            ]);
        } elseif ($request->has('next')) {
            // Redirect to the next number page
            $next_number = $number + 1;
            return redirect()->route('quizzes.quizze', [
                'classroom' => $classroom_id,
                'quizze' => $quiz_id,
                'number' => $next_number,
            ]);
        } else {
            // Default behavior: redirect to the current number page
            return redirect()->route('quizzes.quizze', [
                'classroom' => $classroom_id,
                'quizze' => $quiz_id,
                'number' => $number,
            ]);
        }
    }
}