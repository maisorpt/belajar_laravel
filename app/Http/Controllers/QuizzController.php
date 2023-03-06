<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Classroom;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
        foreach ($quizzes as $quiz) {
            $latest_test_id = Answer::selectRaw('MAX(test_id) as max_test_id')
            ->where('user_id', Auth::user()->id)->where('question_id', $quiz)
            ->groupBy('test_id')
            ->orderBy('max_test_id', 'desc')
            ->first();
    
        if ($latest_test_id) {
            $test_id[] = $latest_test_id->max_test_id + 1;
        } else {
            $test_id[] = 1;
        }
           
        }
//    dd($new_test_id);

        $user_answers = Answer::where('user_id', Auth::user()->id)->distinct('question_id')->pluck('question_id');
        if ($user_answers) {
            return view('quizzes.quizzes', compact('quizzes', 'classroom', 'user_answers','test_id'));
        } else {
            return view('quizzes.quizzes', compact('quizzes', 'classroom', 'test_id'));
        }
    }

    public function detail_answers($question_id)
    {

        $answers = Answer::select(DB::raw('MAX(test_id) as id'))->where('question_id', $question_id)->where('user_id', Auth::user()->id)->groupBy('test_id')->get();

        // dd($answers);
        return view('quizzes.details', compact('answers', 'question_id'));
    }

    public function detail_answer($question_id, $test_id)
    {

        $correct_answer = 0;
        $empty_answer = 0;
        $answers = Answer::select('answer', 'number')->where('question_id', $question_id)->where('user_id', Auth::user()->id)->where('test_id', $test_id)->distinct()->get();
        $questions = Quizze::where('question_id', $question_id)->get();
        $limit = Quizze::where('question_id', $question_id)
            ->count();
        // dd($limit);
        $answer_list = [];

        foreach ($questions as $index => $question) {
            $question_answer = $answers->firstWhere('number', $question->number);
            if ($question_answer && $question_answer->answer == $question->correct_answer) {
                $correct_answer++;
                $answer_list[$index] = 1;
            } elseif ($question_answer === NULL || $question_answer->answer == NULL) {
                $empty_answer++;
                $answer_list[$index] = 0;
            } else {
                $answer_list[$index] = 0;
            }
        }
        $wrong_answer = $limit - $correct_answer;

        $persen = round(($correct_answer / $limit) * 100);

        // dd($answer_list);
        // dd($empty_answer, $correct_answer, $wrong_answer,$persen,$answers);
        return view('quizzes.detail', compact('questions', 'test_id', 'limit', 'correct_answer', 'wrong_answer', 'persen', 'answer_list'));
    }

    public function quizze($classroom_id, $quizze_id, $test_id,$number)
    {

        $quizze = Quizze::where('question_id', $quizze_id)->where('number', $number)->get();
        $classroom = Classroom::where('id', $classroom_id)->first();


        $limit = Quizze::where('question_id', $quizze_id)
            ->count();

        if ($number <= $limit - 1 && $number > 1) {
            $previous_question_id = 1;
            $next_question_id = 1;
        } elseif ($number == 1) {
            $previous_question_id = 0;
            $next_question_id = 1;
        } else {
            $previous_question_id = 1;
            $next_question_id = 0;
        }
        $user = Auth::user()->id;
        $answers = Answer::where('question_id', $quizze_id)->where('test_id', $test_id)->where('user_id', $user);
        $answer_list = $answers->pluck('answer', 'number')->toArray() ?? '';
        $answer = $answers->where('number', $number)->first()->answer ?? '';
        //    dd($answer_list);
        if ($answer !== '' && $answer_list !== '') {
            return view('quizzes.quizze', compact('quizze', 'classroom', 'classroom_id', 'quizze_id', 'number', 'previous_question_id', 'next_question_id', 'answer', 'answer_list', 'limit', 'test_id'));
        } else {
            return view('quizzes.quizze', compact('quizze', 'classroom', 'classroom_id', 'quizze_id', 'number', 'previous_question_id', 'next_question_id', 'answer_list', 'limit', 'test_id'));
        }

    }

    public function submit(Request $request, $classroom_id, $quiz_id, $test_id ,$number)
    {
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

        //    dd($request->list_number);
        if ($request->has('previous')) {
            // Redirect to the previous question page
            $previous_number = $number - 1;
            return redirect()->route('quizzes.quizze', [
                'classroom' => $classroom_id,
                'quizze' => $quiz_id,
                'test_id' => $test_id,
                'number' => $previous_number,
            ]);
        } elseif ($request->has('next')) {
            // Redirect to the next number page
            $next_number = $number + 1;
            return redirect()->route('quizzes.quizze', [
                'classroom' => $classroom_id,
                'quizze' => $quiz_id,
                'test_id' => $test_id,
                'number' => $next_number,
            ]);
        } else {
            // Default behavior: redirect to the current number page
            return redirect()->route('quizzes.quizze', [
                'classroom' => $classroom_id,
                'quizze' => $quiz_id,
                'test_id' => $test_id,
                'number' => $request->list_number,
            ]);
        }
    }
}