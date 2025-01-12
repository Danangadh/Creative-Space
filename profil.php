<?php      
include "koneksi.php";    
  
// Cek jika belum ada user yang login, arahkan ke halaman login  
if (!isset($_SESSION['username'])) {    
    header("Location: admin.php");    
    exit;    
}    
  
// Ambil data user berdasarkan session    
$username = $_SESSION['username'];    
$query = $conn->prepare("SELECT * FROM profil WHERE username = ?");   
$query->bind_param("s", $username);    
$query->execute();    
$result = $query->get_result();    
$user = $result->fetch_assoc();    
  
// Proses update data    
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profil'])) {    
    $new_username = $_POST['username'];    
    $password = $_POST['password'];    
    $foto = $_FILES['img']['name'];    
    $foto_lama = $user['foto'];    
    $update_password = false;    
  
    // Update password jika diisi    
    if (!empty($password)) {    
        $password = md5($password); // Enkripsi MD5    
        $update_password = true;    
    }    
  
    // Proses upload foto jika ada file baru    
    if (!empty($foto)) {    
        $gambar = "img/";    
        $target_file = $gambar . basename($foto);    
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));    
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];    
  
        // Validasi ekstensi file    
        if (in_array($imageFileType, $valid_extensions)) {    
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {    
                // Hapus foto lama jika bukan default    
                if ($foto_lama != 'danang.jpg') {    
                    unlink($gambar . $foto_lama);    
                }    
            } else {    
                echo "<script>alert('Gagal mengupload foto.');</script>";    
                exit;    
            }    
        } else {    
            echo "<script>alert('Ekstensi file tidak valid. Hanya JPG, JPEG, PNG, dan GIF diperbolehkan.');</script>";    
            exit;    
        }    
    } else {    
        $foto = $foto_lama; // Gunakan foto lama jika tidak ada upload baru    
    }    
  
    // Update data user    
    if ($update_password) {      
        $stmt = $conn->prepare("UPDATE profil SET username = ?, password = ?, foto = ? WHERE id = ?");      
        $stmt->bind_param("sssi", $new_username, $password, $foto, $user['id']);      
    } else {      
        $stmt = $conn->prepare("UPDATE profil SET username = ?, foto = ? WHERE id = ?");      
        $stmt->bind_param("ssi", $new_username, $foto, $user['id']);      
    }    
  
    if (!$stmt) {      
        die("Prepare failed: " . $conn->error);      
    }    
  
    $update = $stmt->execute();      
    if ($update) {      
        $_SESSION['username'] = $new_username; // Update session username    
        echo "<script>    
            alert('Profil berhasil diperbarui.');    
            document.location='admin.php?page=profil';    
        </script>";    
    } else {      
        echo "<script>alert('Gagal memperbarui profil.');</script>";    
    }      
  
    $stmt->close();    
}    
  
$conn->close();    
?>    
  
<!DOCTYPE html>    
<html lang="en">    
<head>    
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Profile</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">    
</head>    
<body>    
<div class="container mt-5">    
    <h2>Manajemen Profil</h2>    
    <form method="post" action="" enctype="multipart/form-data">    
        <!-- Username -->    
        <div class="mb-3">    
            <label for="username" class="form-label">Username</label>    
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']); ?>" required>    
        </div>    
  
        <!-- Password -->    
        <div class="mb-3">    
            <label for="password" class="form-label">Ganti Password</label>    
            <input type="password" class="form-control" id="password" name="password" placeholder="Isi hanya jika ingin mengubah password">    
        </div>    
  
        <!-- Foto Profil -->    
        <div class="mb-3">    
            <label for="img" class="form-label">Ganti Foto Profil</label>    
            <div>    
                <img src="img/<?= htmlspecialchars($user['foto']); ?>" alt="img" width="100" class="mb-3">    
            </div>    
            <input type="file" class="form-control" id="img" name="img">    
        </div>    
  
        <!-- Submit Button -->    
        <button type="submit" name="update_profil" class="btn btn-primary">Simpan Perubahan</button>    
    </form>    
</div>    
</body>    
</html>  
