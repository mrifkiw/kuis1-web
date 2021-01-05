<?php
include("mahasiswa.php");
// daftar mahasiswa
$andi = new Mahasiswa("Andi", "123", "andi123");
$budi = new Mahasiswa("Budi", "456", "budi456");
$ceri = new Mahasiswa("Ceri", "789", "ceri789");
// daftar tersebut disimpan pada array absen
$absen = [];
array_push($absen, $andi, $budi, $ceri);
// fungsi untuk autentikasi dan redirect ke lokasi/page tertentu
function auth($location)
{
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: $location");
        exit;
    }
}
