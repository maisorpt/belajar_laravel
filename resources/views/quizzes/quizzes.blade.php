<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">


    <!-- Menghubungkan dengan view template master -->
    @extends('student_as.layouts.layout')


    <!-- isi bagian konten -->
    <!-- cara penulisan isi section yang panjang -->
    @section('content')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">         
                            <h1>Pilih Quiz</h1>
                            <div class="container">
                                <div class="row">
                                    @forelse ($quizzes as $quizz)
                                        <div class="card col-6 mx-2" style="width: 18rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Quizz {{ $quizz }}</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the bulk of the card's content.</p>
                                                <a href="{{ route('quizzes.quizze', ['classroom' => $classroom, 'quizze' => $quizz, 'number' => 1]) }}"
                                                    class="btn btn-primary">Start Quizz</a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card border-0 shadow rounded mt-3 mb-3">
                        <div class="card-body">         
                            <h1>Quizz History</h1>
                            <div class="container">
                                <div class="row">
                                    @forelse ($user_answers as $user_answer)
                                        <div class="card col-6 mx-2" style="width: 18rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Quizz {{ $user_answer }}</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the bulk of the card's content.</p>
                                                <a href="{{ route('quizzes.details', ['question_id' => $user_answer]) }}"
                                                    class="btn btn-primary">Start Quizz</a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>
