<?php
//query untuk mengambil data article
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

//menghitung jumlah baris data article
$jumlah_article = $hasil1->num_rows;

// Query untuk tabel gallery
$sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
$hasil2 = $conn->query($sql2);

if ($hasil2) {
    if ($hasil2->num_rows > 0) {
        $jumlah_gallery = $hasil2->num_rows;
    } else {
        $jumlah_gallery = 0; // Tabel kosong
        echo "Tabel gallery kosong.";
    }
} else {
    $jumlah_gallery = 0;
    echo "Error pada query: " . $conn->error; // Debugging jika query gagal
}
?>


<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <!-- Card untuk Article -->
    <div class="col">
        <div class="card border border-secondary mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-primary fs-2"><?php echo $jumlah_article; ?></span> <!-- Mengubah text-bg-secondary menjadi text-bg-primary -->
                    </div> 
                </div>
            </div>
        </div>
    </div> 

    <!-- Card untuk Gallery -->
    <div class="col">
        <div class="card border border-secondary mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-primary fs-2"><?php echo $jumlah_gallery; ?></span> <!-- Mengubah text-bg-secondary menjadi text-bg-primary -->
                    </div> 
                </div>
            </div>
        </div>
    </div> 
</div>
