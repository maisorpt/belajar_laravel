<h2>ID TEST {{$test_id}}</h2>
<h2>TOTAL SOAL {{$limit}}</h2>
<h2>SOAL BENAR {{$correct_answer}}</h2>
<h2>SOAL SALAH {{$wrong_answer}}</h2>
<h2>PERSENTASE {{$persen}} %</h2>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nomor Soal</th>
        <th scope="col">Soal</th>
        <th scope="col">Pilihan</th>
      </tr>
    </thead>
    <tbody>
      @php $x = 0; @endphp
      @forelse ($questions as $question)
        <tr class="{{$answer_list[$x] && $answer_list[$x] == 1 ? 'text-success' : 'text-danger' }}">
            <td>{{ $question->number }}</td>
            <td>{{ $question->text }}</td>
            <td><p class="{{ $question->correct_answer == 1 ? 'text-primary' : 'text-warning' }}">A.{{ $question->answer1 }}</p>
                <p class="{{ $question->correct_answer == 2 ? 'text-primary' : 'text-warning' }}">B.{{ $question->answer2 }}</p>
                <p class="{{ $question->correct_answer == 3 ? 'text-primary' : 'text-warning' }}">C.{{ $question->answer3 }}</p>
                <p class="{{ $question->correct_answer == 4 ? 'text-primary' : 'text-warning' }}">D.{{ $question->answer4 }}</p></td>

        </tr>
        @php $x++; @endphp
      @empty
          <div class="alert alert-danger">
              Data Post belum Tersedia.
          </div>
      @endforelse
    </tbody>
  </table>  