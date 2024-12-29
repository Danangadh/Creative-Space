<?php
include "koneksi.php"; 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Space</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://e7.pngegg.com/pngimages/731/937/png-clipart-jumpman-logo-blue-pencil-pencil-blue-angle.png" type="image/x-icon">
</head>
<body class="bg-light text-dark" id="pageBody">

    <!-- nav awal -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand h1" href="#"><h1>Creative Space</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="bi bi-list h1"></i></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutme">About Me</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" target="_blank">Login</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" target="_blank">Logout</a>
                    </li>                  
                    <li class="nav-item">
                        <button id="darkTheme" class="btn btn-dark">
                            <i class="bi bi-moon-fill"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button id="lightTheme" class="btn btn-info">
                            <i class="bi bi-brightness-high-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav akhir -->

    <!-- hero awal -->
<section id="Home" class="text-center p-5" style="background-color:deepskyblue;">
    <div class="container-fluid p-0">
        <div class="d-lg-flex flex-lg-row-reverse align-items-center">
            <img src="img/foto-personal.jpg" alt="default" class="img-fluid" width="315">
            <div class="p-2">
                <h1 class="fw-bold display-4 text-sm-center">Hello, Im Danang ade</h1>
                <h4 class="lead display-6 text-sm-center">Im a Profesional Graphic deisgner, Photographer Videographer, Video editing</h4>
                <h6>
                    <span id="tanggal"></span>
                    <span id="jam"></span>
                </h6>
            </div>
        </div>
    </div>  
</section>
<!-- hero akhir -->


<!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>

<!-- article end -->

<!-- gallery awal -->
<section id="gallery" class="isi text-center p-5" style="background-color: deepskyblue;">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">Gallery</h1>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner d-flex justify-content-center"> 
                <div class="carousel-item active w-75 mx-auto"> 
                    <div class="ratio ratio-16x9">
                        <div class="carousel-item active">
                            <img
                                src="img/foto-kabinet.png"
                                class="d-block w-100"
                                alt="..."
                            />
                        </div>  
                    </div>
                </div>
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExample"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExample"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!-- gallery akhir -->


<!-- Schedule Awal -->
<section id="schedule" class="text-center p-5"> 
    <div class="container">
        <h1 class="fw-bold display-4 text-center mb-4">Schedule</h1>
        <!-- Row with (Senin - Kamis) -->
        <div class="row row-cols-1 row-cols-md-4 g-3">
            <!-- Jadwal Senin -->
            <div class="col">
                <div class="card text-center equal-height">
                    <div class="card-header bg-danger text-white">SENIN</div>
                    <div class="card-body">
                        <p>Free</p>
                    </div>
                </div>
            </div>
            <!-- Jadwal Selasa -->
            <div class="col">
                <div class="card text-center equal-height">
                    <div class="card-header bg-danger text-white">SELASA</div>
                    <div class="card-body">
                        <p>Basis Data<br>12.30-14.10 | H.5.14</p>
                        <hr>
                        <p>Pendidikan Kewarganegaraan<br>18.30-20.10 | Aula E.3.1</p>
                    </div>
                </div>
            </div>
            <!-- Jadwal Rabu -->
            <div class="col">
                <div class="card text-center equal-height">
                    <div class="card-header bg-danger text-white">RABU</div>
                    <div class="card-body">
                        <p>Rekayasa Perangkat Lunak<br>07.00-09.00 | H.5.14</p>
                    </div>
                </div>
            </div>
            <!-- Jadwal Kamis -->
            <div class="col">
                <div class="card text-center equal-height">
                    <div class="card-header bg-danger text-white">KAMIS</div>
                    <div class="card-body">
                        <p>Pemrograman Berbasis Web <br>08.40-10.20 | D.2.J</p>
                        <hr>
                        <p>Basis Data<br>10.20-12.00 | H.5.14</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row with (Jumat - Sabtu) -->
        <div class="row row-cols-1 row-cols-md-4 g-3 mt-3">
            <!-- Jadwal Jumat -->
            <div class="col">
                <div class="card text-center equal-height">
                    <div class="card-header bg-danger text-white">JUMAT</div>
                    <div class="card-body">
                        <p>Sistem Operasi<br>07.00-09.00 | H.4.9</p>
                        <hr>
                        <p>Logika Informatika<br>12.30-15.00 | H.4.9</p>
                        <hr>
                        <p>Probabilitas dan Statistik<br>15.30-18.00 | H.4.6</p>
                    </div>
                </div>
            </div>
            <!-- Jadwal Sabtu -->
            <div class="col">
                <div class="card text-center equal-height">
                    <div class="card-header bg-danger text-white">SABTU</div>
                    <div class="card-body">
                        <p>FREE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .equal-height {
        height: 100%; 
        display: flex;
        flex-direction: column;
    }
    .card-body {
        flex-grow: 1; 
    }
    .card-body {
    padding: 0; 
    }

    .card-body p {
    padding: 1rem; 
    }

    .card-body hr {
    margin: 0; 
    border: none; 
    border-top: 1px solid #000000; 
    width: 100%; 
    }
</style>
<!-- Schedule Akhir -->


<!-- About Me Awal -->
<section id="aboutme" class="isi text-center p-5" style="background-color: deepskyblue;">
    <div class="container">
    <h1 class="fw-bold display-4 pb-3">About Me</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center text-md-start">
                <div class="d-md-flex align-items-center gap-4">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB6hgxAu8Y21zoa65NrhuobABSpwMSemg8Mg&s" class="rounded-circle mb-4 m-4" width="300" alt="">
                    <div>
                        <h7><p class=navLinka text-dark">
                            A11.2023.15331
                        </p></h7>
                        <h1 class="fw-bold">Danang Ade Hidayat</h1>
                        <h7><p class=navLinka text-dark">
                            Program Studi Teknik Informatika
                        </p></h7>
                        <p><a href="https://dinus.ac.id/"><b>Universitas Dian Nuswantoro</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Me Akhir -->



<!-- footer awal -->
<footer class="text-center p-5" style="background-color:goldenrod">
    <div>
        <a href=""><i class="navLinka bi bi-instagram h2 p-2 text-dark"></i></a>
        <a href=""><i class="navLinka bi bi-twitter h2 p-2 text-dark"></i></a>
        <a href=""><i class="navLinka bi bi-whatsapp h2 p-2 text-dark"></i></a>
    </div>
    <div class="navLinka text-dark">Danang Ade Hidayat © 2024</div>
</footer>
<!-- footer akhir -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-POCVhZKH0UOfCvzF6YtXGsIBLBC6jOF4ufGmyD0g38U38zVczO9X1Mhywi3zyzI8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-YX8/O34WZ12k6kP8Aav/oc27NUbx1gAtI5u3GQOGNlfAmR91mbCujR+ygQ9g8F5E" crossorigin="anonymous"></script>
    

   <script>
    const darkThemeBtn = document.getElementById('darkTheme');
    const lightThemeBtn = document.getElementById('lightTheme');
    const body = document.getElementById('pageBody');

    darkThemeBtn.addEventListener('click', () => {
        body.classList.remove('bg-light', 'text-dark');
        body.classList.add('bg-dark', 'text-light');
        
        // Mengubah warna teks secara manual di mode gelap
        const elements = document.querySelectorAll('.text-dark');
        elements.forEach(el => el.classList.remove('text-dark'));
    });
    

    lightThemeBtn.addEventListener('click', () => {
        body.classList.remove('bg-dark', 'text-light');
        body.classList.add('bg-light', 'text-dark');
        
        // Mengembalikan warna teks ke mode terang
        const elements = document.querySelectorAll('.text-light');
        elements.forEach(el => el.classList.remove('text-light'));
    });
</script>
    
        <script type="text/javascript">
        window.setTimeout("tampilWaktu()", 1000);

        function tampilWaktu() {
          var waktu = new Date();
          var bulan = waktu.getMonth() + 1;

          setTimeout("tampilWaktu()", 1000);
          document.getElementById("tanggal").innerHTML =
            waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML =
            
            waktu.getHours() +
            ":" + 
            waktu.getMinutes() +
            ":" +
            waktu.getSeconds();

        }
        </script>
    


</body>
</html>
