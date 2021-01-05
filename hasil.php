<?php
include("vote.php");
session_id("vote");
session_start();
foreach ($_SESSION["voting"] as $vote) {
    $voting->count_pilihan($vote);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="page-header">
        <h1>Quick Count</h1>
    </div>
    <p><?php echo $voting->get_count1() ?></p><br>
    <p><?php echo $voting->get_count2() ?></p><br>
    <?php
    $sum = $voting->get_count1() + $voting->get_count2();
    $perse_1 = ($voting->get_count1() / $sum) * 100;
    $perse_2 = ($voting->get_count2() / $sum) * 100;

    ?>
    <div class="progress m-5 w-3" style="height: 200px;">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $perse_1 . "%" ?>;" aria-valuenow="$perse_1" aria-valuemin="0" aria-valuemax="100">
            <h1><?php echo round($perse_1, 2) . "%" ?></h1>
        </div>
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $perse_2 . "%" ?>;" aria-valuenow="$perse_2" aria-valuemin="0" aria-valuemax="100">
            <h1><?php echo round($perse_2, 2) . "%" ?></h1>
        </div>
    </div>



</body>

</html>