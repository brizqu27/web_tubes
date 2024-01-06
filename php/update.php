<!DOCTYPE html>
    <html lang="en">
        
        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            
            <title>Journal.ID</title>
            <meta content="" name="description">
            <meta content="" name="keywords">
            
            <!-- Favicons -->
            <link href="/assets/img/icon.png" rel="icon">
            
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
            
            <!-- Vendor CSS Files -->
            <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
            <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

            <!-- Template Main CSS File -->
            <link href="/assets/css/style.css" rel="stylesheet">

        </head>
        
<body data-aos="fade-in">
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="/assets/img/buku.png">
          <input type="text" placeholder="Search. . ." style="width: 270px;" >
        </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="/index.html" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="/index.html" class="nav-link scrollto"><i class="bx bx-category"></i> <span>Category</span></a></li>
          <li><a href="/php/index.php" class="nav-link scrollto"><i class="bx bx-library"></i> <span>Library</span></a></li>
          <li><a href="/index.html" class="nav-link scrollto"><i class="bx bx-upload"></i> <span>Upload</span></a></li>
          <li><a href="/index.html" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>About Us</span></a></li>
          <li><a href="/login_page.html" class="nav-link scrollto"><i class="bx bxs-user"></i> <span>Profile</span></a></li>
          <li><a href="/index.html" class="nav-link scrollto"><i class="bx bx-cog"></i> <span>Settings</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

    <div class="container">
        <?php

        // Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        // Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id_peserta
        if (isset($_GET['id_peserta'])) {
            $id_peserta = input($_GET["id_peserta"]);

            $sql = "SELECT * FROM peserta WHERE id_peserta=$id_peserta";
            $hasil = mysqli_query($kon, $sql);

            if (mysqli_num_rows($hasil) > 0) {
                $data = mysqli_fetch_assoc($hasil);
            } else {
                echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
                exit;
            }
        }

        // Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_peserta = input($_POST["id_peserta"]);
            $judul = input($_POST["judul"]);
            $penulis = input($_POST["penulis"]);
            $isbn = input($_POST["isbn"]);
            $penerbit = input($_POST["penerbit"]);
            $halaman = input($_POST["halaman"]);
            $doi = input($_POST["doi"]);

            // Query update data pada tabel peserta
            $sql = "UPDATE peserta SET
                    judul='$judul',
                    penulis='$penulis',
                    isbn='$isbn',
                    penerbit='$penerbit',
                    halaman='$halaman',
                    doi='$doi'
                    WHERE id_peserta=$id_peserta";

            // Mengeksekusi atau menjalankan query di atas
            $hasil = mysqli_query($kon, $sql);

            // Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
            }
        }

        ?>
        <br><br><br><br>
        <h2>Update Data</h2><br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Judul :</label>
                <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required />
            </div>
            <div class="form-group">
                <label>Penulis :</label>
                <input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>" required/>
            </div>
            <div class="form-group">
                <label>ISBN/ISNN :</label>
                <input type="text" name="isbn" class="form-control" value="<?php echo $data['isbn']; ?>" required/>
            </div>
            <div class="form-group">
                <label>Penerbit :</label>
                <input type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit']; ?>" required/>
            </div>
            <div class="form-group">
                <label>Jumlah Halaman :</label>
                <input type="text" name="halaman" class="form-control" value="<?php echo $data['halaman']; ?>" required/>
            </div>
            <div class="form-group">
                <label>DOI :</label>
                <input type="text" name="doi" class="form-control" value="<?php echo $data['doi']; ?>" required/>
            </div><br>

            <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

        <!-- ======= Footer ======= -->
        <footer id="footer">
    <div class="container">
      <div class="copyright">
       <strong><span>Yoo , What's Up Ma Bruhh ?!</span></strong>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up"></i></a>

</body>
</html>
