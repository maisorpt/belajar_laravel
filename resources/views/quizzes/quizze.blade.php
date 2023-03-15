<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <h1>Quizz</h1>
                <h6>Countdown Timer</h6>
                <p id="timer"></p>
                <p>Kelas {{ $classroom->name }}</p>
                <div class="row">
                    <div class="col-4">
                        <div class="pagination justify-content-center">
                            @php
                                $x = 1;
                            @endphp
                            @while ($x <= $limit)
                                <button
                                    class="page-link {{ isset($answer_list[$x]) && $answer_list[$x] !== null ? 'active' : '' }}
                                "
                                    onclick="submitFormWithListNumber({{ $x }})">{{ $x }}</button>
                                @php
                                    $x++;
                                @endphp
                            @endwhile
                        </div>
                    </div>
                    <div class="col-5" style="height: 300px">
                        <form
                            action="{{ route('quizzes.submit', ['classroom' => $classroom_id, 'quizze' => $quizze_id, 'test_id' => $test_id, 'number' => $number]) }}"
                            method="POST" enctype="multipart/form-data" id="quiz-form">
                            @csrf
                            <input type="hidden" name="list_number" id="list-number-input">
                            @forelse ($quizze as $quizz)
                                {{ $quizz->number }}
                                {{ $quizz->text }}
                                <div>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio"
                                        style="width:15px;height:15px" name="answer" id="hadir{{ $number }}"
                                        value="1" {{ isset($answer) && $answer == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px"
                                        for="hadir">A.{{ $quizz->answer1 }}</label>
                                    <br>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio"
                                        style="width:15px;height:15px" name="answer" id="sakit{{ $number }}"
                                        value="2" {{ isset($answer) && $answer == '2' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px"
                                        for="sakit">B.{{ $quizz->answer2 }}</label>
                                    <br>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio"
                                        style="width:15px;height:15px" name="answer" id="izin{{ $number }}"
                                        value="3" {{ isset($answer) && $answer == '3' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px"
                                        for="izin">C.{{ $quizz->answer3 }}</label>
                                    <br>
                                    <input class="form-check-input mx-0 quiz-radio" type="radio"
                                        style="width:15px;height:15px" name="answer" id="alpha{{ $number }}"
                                        value="4" {{ isset($answer) && $answer == '4' ? 'checked' : '' }}>
                                    <label class="form-check-label mx-4" style="font-size:15px"
                                        for="alpha">D.{{ $quizz->answer4 }}</label>
                                </div>
                            @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                            @endforelse
                            <div style="position:absolute;bottom:0;">
                                @if ($previous_question_id == 1)
                                    <button type="submit" name="previous" value="previous"
                                        class="btn btn-md btn-primary">Previous Question</button>
                                @endif
                                @if ($next_question_id == 1)
                                    <button type="submit" name="next" value="next"
                                        class="btn btn-md btn-primary">Next Question</button>
                                @endif
                                @if ($next_question_id == 0 && $previous_question_id == 1)
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-md btn-primary" onclick="return false;" >SELESAI</button>
                                @endif
                            </div>
                            <button type="reset" class="btn btn-md btn-primary"
                                onclick="setTimeout(clearRadioButtons, 0)">Empty Question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin untuk mengakhiri quizz ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" test-id="{{ $test_id }}"
                        question-id="{{ $quizze_id }}" number="{{ $number }}" classroom="{{ $classroom->id}}" id="submit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/quizz.js') }}"></script>

</body>

</html>
