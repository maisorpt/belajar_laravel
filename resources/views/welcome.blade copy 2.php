<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <html>
<head>
  <title>MITQ - Al Firdaus</title>
  <link href="{{ asset('/css/style.css') }}" type="text/css" rel="stylesheet">
  <link href="/img/favicon.ico" rel="icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri+Quran">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    maen {
      font-family: "Amiri Quran";
    }

    .head {
      font-size: 25px;
      height: 50px;
    }

    /* width */
    ::-webkit-scrollbar {
      width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background-color: #cac5c5;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: rgb(80, 76, 76);
      border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #363434;
    }
  </style>
</head>

<body>


  <header class="p-1 bg-bagus text-white navbar mb-3 sticky-top">
    <div class="containe">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
        <a href="/" class="d-flex align-items-center mb-0  mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <span><img src="img/logo.png" style="width: 50px; "></span>
          <li><a href="#" class="nav-link px-2 text-white" id="hide">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white active">Pendaftaran</a></li>
          <li><a href="#" class="nav-link px-2 text-white active" id="show">Baca Al-Qur'an</a></li>
        </ul>
      </div>
    </div>
  </header>

  <maen>
    <div class="container text-center" id="shohi1" style="display: none;">
      <div class="row">
        <div class="col-3 fw-bold">
          <div class="dropdown mt-2 head">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false" style="height:50px;" id="button">
              Cari berdasarkan nama surat
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" id="namasurat">Cari berdasarkan nama surat</a></li>
              <li><a class="dropdown-item" href="#" id="nomorsurat">Cari berdasarkan nomor surat</a></li>
            </ul>
          </div>
        </div>
        <!--
      <div class="col-2 fw-bold">
        <div class="bg-success my-2 tampilnomor rounded head" style="display :none;">
          <p class="my-1">No</p>
        </div>
        <div class="bg-success my-2 tampilsurat rounded head">
          <p class="my-1">Nama Surat</p>
        </div>
      </div>
    -->
        <div class="col-2 fw-bold">
          <div class="bg-success my-2 rounded head">
            <p class="my-1">Ayat</p>
          </div>

        </div>
        <div class="col-7 fw-bold ">
          <div class="bg-success my-2 rounded head">
            <p class="my-1">Nash</p>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-3 overflow-auto" style="height: 600px;">
          <div class="tampilnomor" id="show-nomor" style="display: none;font-size:35px;"></div>
          <div class="tampilsurat" id="show-surat" style="font-size:35px;"></div>
        </div>
        <div class="col-2 overflow-auto" style="height: 600px;">
          <div class="" id="show-number" style="font-size:40px;"></div>
        </div>
        <div class="col-7">
          <div id="show-ayat" class="postion-fixed mt-5 mb-5" style=" font-size: 40px;"></div>
        </div>
      </div>
    </div>
  </maen>

  <maenmaen>
    
</maenmaen>


  <main id="shohi2">

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" id="daftar">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-5 fw-bold text-white"> Penerimaan Santri Baru</h1>
        <p class="lead fw-normal text-white"> MITQ Al-Firdaus Wonogiri</p>
        <a class="btn text-white fw-semibold bg-keren" href="#">Daftar Sekarang</a>
      </div>
      <div class="product-device shadow-sm d-none d-md-block"></div>
      <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <div class="container-fluid p-5">
      <div class="row mb-0">
        <div class="col-md-5 overflow-hidden"> <img src="img/santri2.jpg"> </div>
        <div class="col-md-7 text-center">
          <div class="mx-3">
            <h2 class="mb-5 text-dark mt-0"> Sekilas MITQ Al Firdaus</h2>
            <p class="text-dark">Madrasah Ibtidaiyah Tahfizhul Qur'an Al Firdaus Wonogiri (MITQ AL FIRDAUS) adalah unit
              pendidikan setingkat sekolah dasar di bawah yayasan <b>Yayasan Baitul Qur'an Wonogiri</b> yang berfokus
              mewujudkan anak didik untuk menghafal Al-Qur'an dan menanamkan akhlaq mulia.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid pt-5">
      <div class="row mb-0 py-4 text-dark bg-light">
        <div class="col-md-12 text-center">
          <h2 class="mb-5 mr-7 ">Visi</h2>
          <p>Menjadi Lembaga Pendidikan tahfizh yang melahirkan generasi qur’ani, berakhlaq mulia, mandiri, bermanfaat,
            dan berprestasi!</p>
        </div>
      </div>
    </div>

    <div class="container-fluid p-5 my-3">
      <div class=" row mb-3">
        <div class="col-md-12 mb-5 text-dark ">
          <h2 class="putih p-1 text-center">Standar Kelulusan</h2>
        </div>
        <div class="col-md-4 p-5 text-dark text-center bg-light">
          <h3 class="mb-5">Nash</h3>
          <p class="">Hafal Al-Qur’an 10 Juz<br><br>
            Hafal 42 Hadist Arabin Nawawi<br><br>
            Lancar membaca Al-Qur’an sesuai tajwid dan makhorijul huruf<br><br>
            Menulis Al-Qur’an 30 Juz <br> ( Metode follow the line)</p>

        </div>
        <div class="col-md-4 p-5 text-center text-dark">
          <h3 class="mb-5">Amaliyah</h3>
          <p class="">
            Terbiasa Sholat wajib dengan benar dan tepat waktu<br><br>
            Mempunyai karakter mandiri dan akhlaq mulia.<br><br>
            Hafal 100 Do’a Harian
          </p>
        </div>
        <div class="col-md-4 text-center p-5 bg-light text-dark">
          <h3 class="mb-5">Skill</h3>
          <p class="">
            Mampu berbahasa Arab dan Inggris<br><br>
            Menguasai dasar ilmu Sains dan Teknologi<br><br>
          </p>
        </div>
      </div>
    </div>

    <!-- Carousel -->

    <div class="container-fluid p-5 bg-light">
      <div class="col-md-12 pb-4 text-center">
        <h2>Ekstrakulikuler</h2>
      </div>


      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
            class=""></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
            class=""></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"
            class=""></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"
            class=""></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"
            class=""></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="6" aria-label="Slide 7" class="active"
            aria-current="true"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="img-fluid" src="img/carousel1.jpg" alt="Image" style=" width: 1920px; height : 500px;">
            <div class="container">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <h1 class="p-5 mb-5 text-light">Tilawah</h1>

              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="img/carousel2.jpg" alt="Image" style=" width: 1920px; height : 500px;">

            <div class="container">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <h1 class="p-5 mb-5 text-light">Beladiri</h1>

              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <img class="img-fluid" src="img/carousel3.jpg" alt="Image" style=" width: 1920px; height : 500px;">

            <div class="container">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <h1 class="p-5 mb-5 text-light">Pildacil</h1>

              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <img class="img-fluid" src="img/carousel4.jpg" alt="Image" style=" width: 1920px; height : 500px;">
            <div class="container">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <h1 class="p-5 mb-5 text-light">Kaligrafi</h1>


              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <img class="img-fluid" src="img/carousel5.jpg" alt="Image" style=" width: 1920px; height : 500px;">
            <div class="container">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <h1 class="p-5 mb-5 text-light">Memanah</h1>


              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <img class="img-fluid" src="img/carousel6.jpg" alt="Image" style=" width: 1920px; height : 500px;">
            <div class="container">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <h1 class="p-5 mb-5 text-light">Berenang</h1>


              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <img class="img-fluid" src="img/carousel7.jpg" alt="Image" style=" width: 1920px; height : 500px;">
            <div class="container">
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <h1 class="p-5 mb-5 text-light">TIK</h1>


              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- End of carousel-->

    <div class="container-fluid p-5">
      <div class="row mb-2">
        <h1 class="text-center">Syarat Pendaftaran</h1>
        <div class="col-md-6">
          <h2 class="mt-5 mb-5">Syarat Umum</h2>
          <ul>
            <li>Usia sudah mencapai 7 tahun pada bulan Juni 2023</li>
            <li>Lulus PAUD/TK (bila sekolah)</li>
          </ul>
        </div>


        <div class="col-md-6">
          <h2 class="mt-5 mb-5">Syarat Administrasi</h2>
          <ul>
            <li>Mengisi formulir pendaftaran </li>
            <li>FC akte kelahiran : 2 lembar </li>
            <li>FC KK & KTP ortu : 2 lembar </li>
            <li>FC ijazah PAUD/TK (bila ada) : 2 lembar </li>
            <li>Pas foto berawrna terbaru 2x3 & 3x4 : 3 lembar (putri berjilbab) </li>
          </ul>
        </div>
      </div>
      <div class="container-fluid"></div>
      <div class="col-md-12 text-center bg-light py-4">
        <h2 class="mt-2 mb-3">Waktu Pendaftaran</h2>
        <div class="fw-semibold">1 November 2022- 20 Mei 2023</div>
        <div class="fw-light">Masuk KBM Aktif 17 Juli 2023</div>
      </div>
    </div>
    <div class="container-fluid mb-5">
      <div class="row my-0 ">
        <div class="col-md-6 ">
          <h2 class="mt-5 mb-5">Cara Pendaftaran</h2>
          <ul>
            <li class="fw-bold"> Online </li><br>
            <span> Ketik :<b> DAFTAR_MITQ_NAMA</b><br>
              Kirim ke <a href="http://wa.me/6289669308976" class="mb-0"></i>+62 896-6930-8976</a>
            </span>
          </ul>

          <ul>
            <li class="fw-bold"> Offline </li><br>
            <span>Senin-Sabtu pukul 08.00 - 12.00</span>
          </ul>
        </div>
        <div class="col-md-6 ">
          <h2 class="mt-5 mb-5">Biaya Pendidikan</h2>

          <ul>
            <li class="fw-normal"> Daftar Ulang (bisa diangsur 5x) &nbsp; <b> Rp. 3.240.000,- </b> </li>
            <li class="fw-normal"> SPP & Pengembangan diri &emsp; &emsp; <b> Rp. 180.000,- </b> </li>
          </ul>

        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-12 text-center">
        <a class="btn bg-keren text-white fw-semibold" href="#">Daftar Sekarang</a>
      </div>
    </div>
  </main>

  <footer class="mt-3">
    <div class="container-fluid bg-cool text-white mt-0 pt-1">
      <div class="row px-xl-5 pt-4">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
          <a href="#" class="text-white text-decoration-none">
            <div class="mb-4 display-6 font-weight-semi-bold "><span><img src="img/logo.png"
                  style="width: 50px; "></span>MITQ AL FIRDAUS</div>
          </a>
          <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>&nbsp Jl. Cempaka V, Pokoh RT.01/IV, Kel.
            Wonoboyo, Kec. Wonogiri, Kab. Wonogiri, Jawa Tengah</p>
          <a href="http://wa.me/6289669308976" class="text-decoration-none mb-0 text-white"><i
              class="fa fa-phone-alt text-white mr-3"></i>+62 896-6930-8976</a>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3"></div>


            <div class="col-md-6">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.757070945938!2d110.93622271477835!3d-7.815519494368194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a2f872f37a973%3A0x9b37d4fd691a39fe!2sMITQ%20AL%20FIRDAUS%20WONOGIRI!5e0!3m2!1sid!2sid!4v1669174033222!5m2!1sid!2sid"
                width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
          </div>
        </div>
      </div>
      <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
          <p class="mb-md-0 text-center text-md-left text-white">
            &copy; <a class="text-white font-weight-semi-bold text-decoration-none" href="#">MITQ AL FIRDAUS</a>. All
            Rights Reserved. Designed
            by
            <a class="text-white font-weight-semi-bold text-decoration-none"
              href="https://portohalu.netlify.app/">Maisorpt</a>
          </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
        </div>
      </div>
    </div>
    <!-- Footer End -->

  </footer>

</body>
<script>
  $(document).ready(() => {

    const $showNomor = $('#show-nomor');
    const $showSurat = $('#show-surat');

    $showNomor.text('Loading the JSON file.');
    $showSurat.text('Sedang Memuat');
    $.getJSON('https://api.alquran.cloud/v1/surah', (respon) => {
      console.log(respon.code);
      console.log(respon.status);
      const markup = respon.data
        .map(item => `<p class="text-dark surat" style="height:50px;" idsurat="${item.number}">${item.number}</p>`)
        .join('');
      const mark = respon.data
        .map(item => `<p class="text-dark surat mb-5" style="height:50px;" idsurat="${item.number}">${item.name}</p>`)
        .join('');

      $showNomor.html(markup);
      $showSurat.html(mark);

      $('.surat').on('click', function (event) {
        var z = $(this).attr("idsurat");
        $.getJSON('https://api.alquran.cloud/v1/surah/' + z, (req) => {

          const noayat = req.data.ayahs
            .map(item => `<p class="ayat" id="${item.number}" idayat="${item.numberInSurah}">${item.numberInSurah}</p>`)
            .join('');
          const ayaat   = req.data.ayahs[0].text + '(' + req.data.ayahs[0].numberInSurah + ')';

          $('#show-ayat').html(ayaat);
          $('#show-number').html(noayat);

          $('.ayat').on('click', function (event) {
            var x = $(this).attr("id");
            var y = $(this).attr("idayat");

            $.getJSON('https://api.alquran.cloud/v1/ayah/' + x, (request) => {

              //alert(request.data);

              const ayat = request.data.text;
              const nomorayat = request.data.numberInSurah;
              const tampil = '<p>' + ayat + '(' + nomorayat + ')</p>';

              $('#show-ayat').html(tampil);

            });

          });

        });

      });
    });
  });
</script>


<script>
  $(document).ready(function () {
    $("#hide").click(function () {
      $('#shohi1').hide();
      $('#shohi2').show();
    });
    $("#show").click(function () {
      $('#shohi1').show();
      $('#shohi2').hide();
    });
    $("#namasurat").click(function () {
      $('#button').text("Cari berdasarkan nama surat")
      $('.tampilsurat').show();
      $('.tampilnomor').hide();
    });
    $("#nomorsurat").click(function () {
      $('#button').text("Cari berdasarkan nomor surat")
      $('.tampilnomor').show();
      $('.tampilsurat').hide();
    });
  });
</script>

</html>