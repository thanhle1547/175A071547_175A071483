<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/template.css">
    <link rel="stylesheet" href="../public/css/app.css">
    <?php if ($page != 'login') : ?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <?php endif; ?>
    <script src="../public/js/jquery-3.4.1.min.js"></script>
    <?php if ($page == 'login') : ?>
        <style>
            .background {
                position: absolute;
                background-image: linear-gradient(135deg, rgba(116, 244, 159, 1) 0%, rgba(115, 207, 227, 1) 50%, rgba(116, 176, 221, 1) 70%, rgba(120, 94, 206, 1) 100%), url("../public/imgs/Background 1.png");
                height: 100vh;
                width: 100%;
                background-repeat: no-repeat;
                background-size: cover;
                background-blend-mode: overlay;
            }

            .login-form {
                display: block;
                position: absolute;
                background-color: white;
                border-radius: 20px;
                height: 445px;
                width: 450px;
                margin: 76px 20px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1), 0 3px 26px rgba(0, 0, 0, 0.2);
                padding: 45px 60px 50px;
                right: 20%;
            }

            .login-form .brand {
                font-size: 3rem;
                font-family: 'Open Sans', sans-serif;
                font-weight: 500;
                color: #1535B4;
                text-align: center;
            }

            .login-form .title {
                font-size: 1.25rem;
                font-family: 'Open Sans', sans-serif;
                color: var(--dark-grayish-blue);
                text-align: center;
                margin: 16px 0;
            }

            .login-form label {
                font-family: Roboto, sans-serif;
                font-size: 1.125rem;
            }

            .btn-login {
                font-weight: 500;
                margin: 10px auto 0 auto;
                padding: 9px 21px;
            }

            @media screen and (max-width: 768px) {
                .background {
                    display: none;
                }

                .login-form {
                    height: 100vh;
                    width: 488px;
                    margin: 0 auto;
                    right: 0;
                    position: relative;
                    box-shadow: none;
                }
            }

            @media screen and (max-width: 425px) {
                .login-form {
                    width: 100%;
                    padding-left: 2em;
                    padding-right: 2em;
                }
            }
        </style>
    <?php endif; ?>
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