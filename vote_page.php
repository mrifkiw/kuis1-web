<?php
//menggunakan objek dari vote.php
include("vote.php");
// memulai session login untuk mendapatkan informasi mahasiswa
session_id("login");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
  <title>Vote</title>
</head>

<body>
  <div class="card mx-auto my-4" style="width: 50rem">
    <div class="card-body row justify-between">
      <ul class="col p-2 mx-auto w-5 nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Vote</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Realtime-result</a>
        </li>
      </ul>
      <ul class="col p-2 mx-auto w-5 nav nav-tabs justify-content-end">
        <li class="nav-item">
          <a class="nav-link disable text-dark" tabindex="-1" aria-disabled="true" href="#">
            <?php echo $_SESSION["username"] . " | " . $_SESSION["nim"]; ?>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger">Sign Out</a>
        </li>
      </ul>
    </div>
    <?php
    // session login ditutup dan disimpan datanya
    session_write_close();
    // memulai sesi baru untuk mengambil data vote dari form, kemudian disimpan di array
    session_id("vote");
    session_start();
    if (empty($_SESSION["voting"])) {
      $_SESSION["voting"] = array();
    } else {
      $votes = $_SESSION["voting"];
    }

    $err_msg = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["pilihan"])) {
        $err_msg = "Please choose the candidate";
      } else {
        array_push($votes, $_POST["pilihan"]);
        $_SESSION["voting"] = $votes;
        header("location: hasil_page.php");
      }
    }
    ?>
    <div class="card-body">
      <h3 class="mb-2">Pemilihan Kahim dan Wakahim HMIK UP 2020</h3>
      <form action="" method="post">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pilihan" value="pilihan1">
          <label class="form-check-label" for="inlineRadio1">1. Abi-Seno</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pilihan" value="pilihan2">
          <label class="form-check-label" for="inlineRadio2">2. Guntur-Sunda</label>
        </div>
        <span class="help-block"><?php echo $err_msg; ?></span>
        <div class="form-group mt-2">
          <input type="submit" class="btn btn-primary" value="Vote">
        </div>
      </form>
    </div>
  </div>
</body>

</html>