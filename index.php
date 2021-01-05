<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
  <title>Login</title>
</head>

<body>
  <div class="card mx-auto my-4" style="width: 50rem">
    <div class="card-body row justify-between">
      <ul class="col p-2 mx-auto w-5 nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vote_page.php">Vote</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Realtime-Result</a>
        </li>
      </ul>
      <ul class="col p-2 mx-auto w-5 nav nav-tabs justify-content-end">
        <li class="nav-item">
          <a class="nav-link disable text-dark" tabindex="-1" aria-disabled="true" href="#">User</a>
        </li>
      </ul>
    </div>
    <div class="card-body mx-auto my-2">
      <?php
      include('login.php');
      ?>
    </div>
  </div>
</body>

</html>