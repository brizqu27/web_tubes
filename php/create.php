<?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $judul=input($_POST["judul"]);
        $penulis=input($_POST["penulis"]);
        $isbn=input($_POST["isbn"]);
        $penerbit=input($_POST["penerbit"]);
        $halaman=input($_POST["halaman"]);
        $doi=input($_POST["doi"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (judul, penulis, isbn, penerbit, halaman, doi) values
		('$judul','$penulis','$isbn','$penerbit','$halaman','$doi')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
