<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf


                            <div class="my-3">
                                <label for="kelas" class="form-label font-weight-bold">Choose Teacher</label>
                                <select class="form-select form-control @error('teacher_group') is-invalid @enderror" aria-label="Default select example" name="teacher_group" id="teacher_group">

                                @forelse ($groups as $group)
                                <option value="{{ $group->id}}">
                                {{ $group->user_id ? $users->where('id', $group->user_id)->first()->name : '-' }} - {{ $group->classroom_id ? $classrooms->where('id', $group->classroom_id)->first()->name : '-' }}
                                </option>
                                 @empty
                                <div class="alert alert-danger">
                                 Data Groups belum Tersedia
                                </div>
                                 @endforelse
                                </select>
                             </div>

                             <div class="form-group">
                                <label class="font-weight-bold">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" rows="5" placeholder="Course"></input>
                            
                                <!-- error message untuk content -->
                                @error('note')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                             <div class="my-3">
                             <label for="time_start">Waktu Mulai</label>
                            <input type="time" id="time_start" name="time_start">

                            <label for="time_end">Waktu Berakhir</label>
                            <input type="time" id="time_end" name="time_end">
                             </div>

                                <div class="my-3" > 
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>

                                </div>
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