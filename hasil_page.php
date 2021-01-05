<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <title>Realtime-result</title>
</head>

<body>
    <div class="card mx-auto my-4" style="width: 50rem">
        <div class="card-body row justify-between">
            <ul class="col p-2 mx-auto w-5 nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Vote</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Realtime-Result</a>
                </li>
            </ul>
            <ul class="col p-2 mx-auto w-5 nav nav-tabs justify-content-end">
                <?php
                // memulai sesi login untuk mendapatkan informasi nama dan nim
                session_id("login");
                session_start();
                ?>
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
        //session login ditutup dan disimpan datanya
        session_write_close();
        //menggunakan/impor class/object dari halaman vote.php
        include("vote.php");
        //memulai sesi baru (vote) untuk menyimpan data voting
        session_id("vote");
        session_start();
        // menyimpan setiap data yang ada di session voting kedalam objek voting
        foreach ($_SESSION["voting"] as $vote) {
            $voting->count_pilihan($vote);
        }
        ?>
        <div class="card-body mx-auto my-2">
            <?php
            //membuat persentase untuk dibuatkan char
            $sum = $voting->get_count1() + $voting->get_count2();
            $perse_1 = ($voting->get_count1() / $sum) * 100;
            $perse_2 = ($voting->get_count2() / $sum) * 100;

            ?>
            <div class="progress mb-2 w-3" style="height: 50px; width: 40rem;">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $perse_1 . "%" ?>;" aria-valuenow="$perse_1" aria-valuemin="0" aria-valuemax="100">
                    <h1><?php echo round($perse_1, 2) . "%" ?></h1>
                </div>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $perse_2 . "%" ?>;" aria-valuenow="$perse_2" aria-valuemin="0" aria-valuemax="100">
                    <h1><?php echo round($perse_2, 2) . "%" ?></h1>
                </div>
            </div>

            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0d6efd" class="bi bi-square-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                </svg>
                <?php echo "1. Abi-Seno : " . $voting->get_count1() ?><br>
            </p>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#198754" class="bi bi-square-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                </svg>
                <?php echo "2. Guntur-Sunda : " . $voting->get_count2() ?><br>
            </p>
        </div>
    </div>
</body>

</html>