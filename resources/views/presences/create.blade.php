<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="../layouts/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('presences.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf


                            <div class="my-3">
                                <label for="kelas" class="form-label font-weight-bold">Choose Courese</label>
                                <select class="form-select form-control @error('course') is-invalid @enderror" aria-label="Default select example" name="course" id="course" >

                                @forelse ($schedules as $schedule)
                                    <option value="{{ $schedule->id}}" >
                                    {{ $schedule->note}}
                                     </option>
                                     @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>

                                @endforelse
                                 </select>

                                        <!-- error message untuk title -->
                                @error('course')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                             </div>

                             <div class="my-3">
                                <label for="kelas" class="form-label font-weight-bold">Choose Student</label>
                                <select class="form-select form-control @error('student') is-invalid @enderror" aria-label="Default select example" name="student" id="student" >

                                @forelse ($student_as as $student_a)
                                    <option value="{{ $student_a->id}}"  >
                                    {{ $student_a->name}}
                                     </option>
                                     @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>

                                @endforelse
                                 </select>
                                        <!-- error message untuk title -->
                                @error('student')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                             </div>

                             <div class="form-check my-4">
                             <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence" id="hadir" value="hadir">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="hadir">Hadir</label>

                            <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence" id="sakit" value="sakit">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="sakit">Sakit</label>

                            <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence" id="izin" value="izin">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="izin">Izin</label>

                            <input class="form-check-input mx-0" type="radio" style="width : 15px; height : 15px" name="presence" id="alpha" value="alpha">
                            <label class="form-check-label mx-4" style="font-size: 15px" for="alpha">Alpha</label>

                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Note</label>
                                <textarea class="form-control @error('note') is-invalid @enderror" name="note" rows="2" placeholder="Masukkan Note"></textarea>
                            
                                <!-- error message untuk content -->
                                @error('note')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

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