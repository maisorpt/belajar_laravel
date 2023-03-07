<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="../layouts/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <h1>Quizz</h1>
                <p>Kelas {{ $classroom->name }}</p>
                <div class="row">
                    <div class="col-4"> 
                        <div class="pagination justify-content-center">
                            @php
                             $x = 1 ;
                            @endphp
                            @while($x <= $limit)
                            <button class="page-link {{ isset($answer_list[$x]) && $answer_list[$x] !== NULL ? 'active' : '' }}
                                "  onclick="submitFormWithListNumber({{ $x }})" >{{$x}}</button>
                            @php
                            $x++;
                            @endphp
                            @endwhile
                          </div>
                    </div>
                    <div class="col-5" style="height: 300px">
                        <form action="{{ route('quizzes.submit', ['classroom' => $classroom_id, 'quizze' => $quizze_id, 'test_id' => $test_id ,'number' => $number]) }}" method="POST" enctype="multipart/form-data" id="quiz-form">
                            @csrf
                            <input type="hidden" name="list_number" id="list-number-input">
                            @forelse ($quizze as $quizz)
                                {{ $quizz->number }}
                                {{ $quizz->text }}
                                <div>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio" style="width:15px;height:15px" name="answer" id="hadir{{ $number }}" value="1" {{ isset($answer) && $answer == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px" for="hadir">A.{{ $quizz->answer1 }}</label>
                                    <br>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio" style="width:15px;height:15px" name="answer" id="sakit{{ $number }}" value="2" {{ isset($answer) && $answer == '2' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px" for="sakit">B.{{ $quizz->answer2 }}</label>
                                    <br>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio" style="width:15px;height:15px" name="answer" id="izin{{ $number }}" value="3" {{ isset($answer) && $answer == '3' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px" for="izin">C.{{ $quizz->answer3 }}</label>
                                    <br>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio" style="width:15px;height:15px" name="answer" id="alpha{{ $number }}" value="4" {{ isset($answer) && $answer == '4' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px" for="alpha">D.{{ $quizz->answer4 }}</label>
                                </div>
                            @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                            @endforelse
                            <div style="position:absolute;bottom:0;">
                                @if ($previous_question_id == 1)
                                    <button type="submit" name="previous" value="previous" class="btn btn-md btn-primary">Previous Question</button>
                                @endif
                                @if ($next_question_id == 1)
                                    <button type="submit" name="next" value="next" class="btn btn-md btn-primary">Next Question</button>
                                @endif
                                @if ($next_question_id == 0 && $previous_question_id == 1 )
                                <button type="submit" name="next" value="next" class="btn btn-md btn-primary">SELESAI</button>
                                 @endif
                            </div>
                            <button type="reset"  class="btn btn-md btn-primary" onclick="setTimeout(clearRadioButtons, 0)">Empty Question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        
        function clearRadioButtons() {
  var quizForm = document.getElementById("quiz-form");
  var radioButtons = quizForm.querySelectorAll(".quiz-radio");
  for (var i = 0; i < radioButtons.length; i++) {
    radioButtons[i].checked = false;
  }
}
function submitFormWithListNumber(number) {
  // set the value of the hidden input field to the clicked question number
  document.getElementById("list-number-input").value = number;
  // submit the form
  document.getElementById("quiz-form").submit();
  
}
    </script>


</body>

</html>
