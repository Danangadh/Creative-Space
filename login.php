<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="https://e7.pngegg.com/pngimages/731/937/png-clipart-jumpman-logo-blue-pencil-pencil-blue-angle.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
   body {
    background-image: url('https://bakrie.ac.id/images/article%20seo/creative%20thingking.jpg');
    background-size: cover; /* Pastikan gambar mengisi seluruh layar */
    background-repeat: no-repeat; /* Hindari pengulangan gambar */
    }

/* Glassmorphism card effect */
.card {
    backdrop-filter: blur(0px) saturate(78%);
    -webkit-backdrop-filter: blur(0px) saturate(78%);
    background-color: rgba(17, 25, 40, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.125);
    }
  </style>
  <body>
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
          <div class="card border-0 shadow rounded-5">
            <div class="card-body">
              <div class="text-center mb-3">
                <i class="bi bi-person-circle h1 display-4"></i>
                <h3>Creative Space</h3>
                <hr />
              </div>
              <!-- Tempat untuk menampilkan pesan -->
              
              <!-- Form Login -->
              <form action="" method="post">
                <input
                  type="text"
                  name="user"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Username"
                  required
                />
                <input
                  type="password"
                  name="pass"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Password"
                  required
                />
                <div class="text-center my-3 d-grid">
                  <button class="btn bg-info-subtle rounded-4">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous">
    </script>
  </body>
</html>

<?php
}
?>