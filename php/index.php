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

    // Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_peserta'])) {
      $id_peserta = htmlspecialchars($_GET["id_peserta"]);
      $sql="delete from peserta where id_peserta='$id_peserta' ";
      $hasil = mysqli_query($kon, $sql);

      // Kondisi apakah berhasil atau tidak
      if ($hasil) {
        header("Location:index.php");
      } else {
        echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
      }
    }
    ?>
        <br>
        <h2>List Data Library !</h2><br>
    <thead>
      <tr>
        <table class="my-3 table table-bordered">
          <tr class="table-primary">
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>ISBN/ISNN</th>
            <th>Penerbit</th>
            <th>Jumlah Halaman</th>
            <th>DOI</th>
            <th colspan='2'>Aksi</th>
          </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql = "select * from peserta order by id_peserta desc";
        $hasil = mysqli_query($kon, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) {
          $no++;
          ?>
          <tbody>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data["judul"]; ?></td>
              <td><?php echo $data["penulis"];   ?></td>
              <td><?php echo $data["isbn"];   ?></td>
              <td><?php echo $data["penerbit"];   ?></td>
              <td><?php echo $data["halaman"];   ?></td>
              <td><?php echo $data["doi"];   ?></td>
              <td>
                <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
              </td>
            </tr>
          </tbody>
        <?php
      }
      ?>
    </table>
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
