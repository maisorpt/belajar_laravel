<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h1>Student Attendance</h1>
                        <form action="{{ route('presences.attendances') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        <table class="table text-center">
                            <thead> 
                                <tr>
                                    <th>Student's Name</th>
                                    <th>Presence</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                         $x = 1;
                         @endphp
                            @forelse ($student_as as $student_a)
                                <tr>
                                <td>
                                <input type="hidden" name="student{{$x}}" value="{{ $student_a->id}}">
                                <input type="hidden" name="course{{$x}}" value="{{request()->input('id')}}">
                                <input type="hidden" name="counter" value="{{ $x}}">
                                {{ $student_a->name}}</td>
                                <td>
                                    <div> 
                   
                            <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence{{$x}}" id="hadir{{$x}}" value="hadir">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="hadir">Hadir</label>

                            <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence{{$x}}" id="sakit{{$x}}" value="sakit">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="sakit">Sakit</label>

                            <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence{{$x}}" id="izin{{$x}}" value="izin">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="izin">Izin</label>

                            <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence{{$x}}" id="alpha{{$x}}" value="alpha">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="alpha">Alpha</label>
                          
                        </div>
                            </td>
                                <td>                               
                            <textarea class="form-control @error('note') is-invalid @enderror" name="note{{$x}}" rows="2" placeholder="Masukkan Note"></textarea>
                            @php
                            $x++;
                            @endphp
                            <!-- error message untuk content -->
                            @error('note')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                                </td>

                                <tr>
                                 @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                     
                                @endforelse
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script> -->

</body>
</html>