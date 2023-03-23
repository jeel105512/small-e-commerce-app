<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT_PATH ?>/styles/style.css">
    <title><?= $title ?></title>
</head>

<body id="<?= $override_id ?? "main" ?>">
    <!-- Simple notification check for errors -->
    <?php if (isset($errors)): ?>
        <div class="alert alert-danger">
            <?php
                if (is_string($errors)) {
                    echo "<p>$errors</p>";
                } else {
                    foreach ($errors as $error) echo "<p>$error</p>";
                }
            ?>
        </div>
    <?php endif ?>

    <!-- Simple notification check for successes -->
    <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <?php
                if (is_string($success)) {
                    echo "<p>$success</p>";
                } else {
                    foreach ($success as $s) echo "<p>$s</p>";
                }
            ?>
        </div>
    <?php endif ?>

    <!-- Global navigation -->
    <nav>
        <div>
            <div class="nav-icon"><i class="fa-solid fa-chess-queen"></i></div>
            <a href="<?= ROOT_PATH ?>">Shoppers Online</a>
        </div>
        <div>
            <a href="<?= ROOT_PATH ?>/products/new">
                <div class="new-icon"><i class="fa-solid fa-plus"></i></div>
                <div>New</div>
            </a>
            <a href="<?= ROOT_PATH ?>/products">
                <div class="list-icon"><i class="fa-solid fa-list"></i></div>
                <div>List</div>
            </a>
        </div>
    </nav>

    <!-- View specific output -->
    <?= $yield ?? null ?>
</body>

</html>