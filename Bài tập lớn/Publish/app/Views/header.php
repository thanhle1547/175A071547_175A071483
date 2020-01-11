<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="../public/css/template.css">
    <link rel="stylesheet" href="../public/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <?php if ($page != 'login') : ?>
        <header class="app-header shadow">
            <input type="checkbox" id="btn-menu">
            <h3 class="title ">
                <?= $title ?>
            </h3>
            <div class="account">
                <button class="btn btn-white-primary" id="btn-logout">Đăng xuất</button>
            </div>
        </header>
    <?php endif; ?>