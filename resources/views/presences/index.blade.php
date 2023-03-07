@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="../layouts/css.css">
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
                        <a href="{{ route('presences.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <a href="{{ route('presences.attendance') }}" class="btn btn-md btn-primary mb-3">ABSEN</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Course</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Presence</th>
                                <th scope="col">Note</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                    

                              @forelse ($presences as $presence)
                                <tr>
                                    <td>{{ $presence->id}}</td>
                                    <td>{{ $presence->schedule }}</td>
                                    <td>{{ $presence->name}}</td>
                                    <td>{{ $presence->presence}}</td>
                                    <td>{{ $presence->note}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('presences.destroy', $presence->id) }}" method="POST">
                                            <a href="{{ route('presences.edit', $presence->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $presences->links() }}
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
    @if(session()->has('success'))
        toastr.success("{{ session('success') }}", 'BERHASIL!'); 
    @elseif(session()->has('error'))
        toastr.error("{{ session('error') }}", 'GAGAL!'); 
    @endif
</script>

    <!-- <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!');
             

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script> -->


</body>
</html>


