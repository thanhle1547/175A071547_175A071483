<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-grid-only@1.0.0/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../public/css/template.css">
    <link rel="stylesheet" href="../public/css/site.css">
    <?php if ($page == 'home') : ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <style>
            .owl-nav {
                position: absolute;
                left: 0;
                right: 0;
                top: 35%;
            }

            .owl-prev,
            .owl-next {
                position: absolute;
                filter: drop-shadow(0 0 6px rgba(0, 0, 0, .4));
            }

            .owl-theme .owl-nav [class*=owl-]:hover {
                background-color: transparent;
                filter: drop-shadow(0 0 6px rgba(0, 0, 0, .4));
            }

            .owl-prev {
                left: 0;
            }

            .owl-next {
                right: 0;
            }

            @media screen and (max-width: 992px) {
                .owl-nav {
                    display: none;
                }
            }

            @media screen and (max-width: 576px) {
                .owl-carousel {
                    display: none;
                }
            }
        </style>
    <?php endif; ?>
</head>

<body>
    <header class="page-header">

        <div class="container">
            <div class="row">
                <div class="col-5 col-md-5 ">
                    <a href=""> <img class="header-brand" src="../public/imgs/logo.png" alt="aa"></a>
                </div>
                <button class="btn btn-outline-primary" id="btn-menu">
                    <i class="material-icons-round">menu</i>
                </button>
                <div class="col-12 col-sm-6 col-md-4 col-lg-7 header-right">
                    <button class="btn btn-outline-primary btn-rounded-corner btn-login">
                        <a href="../app/login">Đăng Nhập</a>
                    </button>
                    <nav>
                        <a href="home" <?php if ($page == 'home') echo `class='active'` ?>>Trang Chủ</a>
                        <a href="news" <?php if ($page == 'news') echo `class='active'` ?>>Tin Tức</a>
                        <a href="../app/schedule" <?php if ($page == 'schedule') echo `class='active'` ?>>Lịch Trình Giảng Dạy</a>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <main class="page-main">