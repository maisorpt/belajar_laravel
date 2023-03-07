<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="../layouts/css.css">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('groups.update', $group->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')


                            <div class="my-3">
                                <label for="kelas" class="form-label font-weight-bold">Choose Teacher</label>
                                <select class="form-select form-control @error('teacher_name') is-invalid @enderror" aria-label="Default select example" name="teacher_name" id="teacher">

                                @forelse ($users as $user)
                                    <option value="{{ $user->id}}" {{ $user->id == $group->user_id ? 'selected' : '' }}>
                                    {{ $user->name}}
                                     </option>
                                     @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>

                                @endforelse
                                 </select>

                                        <!-- error message untuk title -->
                                @error('teacher_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                             </div>

                             <div class="my-3">
                                <label for="kelas" class="form-label font-weight-bold">Choose Class</label>
                                <select class="form-select form-control @error('classroom') is-invalid @enderror" aria-label="Default select example" name="classroom" id="classroom">

                                @forelse ($classrooms as $classroom)
                                    <option value="{{ $classroom->id}}" {{ $classroom->id == $group->classroom_id ? 'selected' : '' }}>
                                    {{ $classroom->name}}
                                     </option>
                                     @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>

                                @endforelse
                                 </select>
                                        <!-- error message untuk title -->
                                @error('classroom')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                             </div>

                             <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>