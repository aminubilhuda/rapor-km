<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>

    <link rel="icon" type="img/png" href="assets/app/dist/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <title>APLIKASI RAPOR MERDEKA MENGAJAR</title>
    <style>
    body {
        font-family: 'Inter', sans-serif;
        /* background-color: #f1f1f1; */
        background-image: url("https://cdn.siap.id/s3/UI-UX/bg-login-kemendikbud-white2.png");
        background-size: cover;
        height: 100vh;
        background-repeat: no-repeat;
        background-position: top;
        background-attachment: fixed;
    }

    .warna-utama {
        background-color: #2196F3;
    }

    .warna-utama {
        background-color: red;
    }

    .warna-success {
        background-color: #28a745;
    }

    .warna-footer {
        color: grey;
        position: relative;
        ;
        bottom: 0;
        width: 100%;
        height: 60px;
        margin-top: auto;

    }

    .aksen {
        position: fixed;
        margin-left: -22px;
        margin-top: 10px;
        width: 5px;
    }

    .card {
        border: none;
    }

    .card2 {
        display: block;
        top: 0px;
        background-color: white;
        border-radius: 4px;
        text-decoration: none;
        z-index: 0;
        overflow: hidden;
        border: none;
        min-height: 150px;
    }

    .card2:hover {
        transition: all 0.2s ease-out;
        box-shadow: 0px 8px 15px #e6e4e4;
        border: 1px solid none;
        background-color: white;
        border-left: 5px solid #2196F3;
    }

    .card2:before {
        content: "";
        position: absolute;
        z-index: -1;
        background: #00838d;
        border-radius: 32px;
        transition: transform 1s ease-in-out;

    }

    .card2:hover:after {
        transition: transform 1s ease-in;
    }

    .card2:hover h5 {
        color: #2196F3;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 700;
    }

    .card2:hover p {
        color: #000000;
    }


    p {
        color: #626262;
    }

    .img-fluid {
        min-width: 40px;
    }

    a {
        text-decoration: none !important;
        color: inherit;
    }

    h5 {
        font-size: 1.2rem;
    }

    .btn-group-fab {
        position: fixed;
        width: 50px;
        height: auto;
        right: 20px;
        bottom: 20px;
    }

    .btn-group-fab div {
        position: relative;
        width: 100%;
        height: auto;
    }

    .btn-group-fab .btn {
        position: absolute;
        bottom: 0;
        border-radius: 50%;
        display: block;
        margin-bottom: 4px;
        width: 40px;
        height: 40px;
        margin: 4px auto;
    }

    .btn-group-fab .btn-main {
        width: 50px;
        height: 50px;
        right: 50%;
        margin-right: -25px;
        z-index: 9;
    }

    /* ribbon demo */
    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: fixed;
        z-index: 100000;
    }

    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        border: 5px solid #cc0000;
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 15px 0;
        background-color: #cc0000;
        ;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        color: #fff;
        font: 700 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-transform: uppercase;
        text-align: center;
    }

    /* top left*/
    .ribbon-top-left {
        top: -10px;
        left: -10px;
    }

    .ribbon-top-left::before,
    .ribbon-top-left::after {
        border-top-color: transparent;
        border-left-color: transparent;
    }

    .ribbon-top-left::before {
        top: 0;
        right: 0;
    }

    .ribbon-top-left::after {
        bottom: 0;
        left: 0;
    }

    .ribbon-top-left span {
        right: -25px;
        top: 30px;
        transform: rotate(-45deg);
    }

    .ads {
        height: 90px;
    }

    @media only screen and (max-width: 768px) {
        .ads {
            width: 320px;
            height: 250px;
        }
    }

    @media only screen and (min-width: 768px) {
        .ads {
            width: 728px;
            height: 90px;
        }
    }
    </style>
</head>

<body>
    <section class="mb-3">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-12">
                    <img src="assets/app/dist/img/logo.png" height="100" class=" mt-5 " alt="">
                    <h2 class="text-black mt-3">Aplikasi Laporan Pendidikan </h2>
                    <h5 class="text-black font-weight-normal mb-5">PARADIGMA BARU</h5>
                </div>
                <div class="col-md-3 mb-3">
                    <!-- <a type="button" class="btn btn-primary btn-block" href="appp/registrasi.php"> <i class="mdi mdi-magnify"></i> Registrasi Akun Sekolah</a> -->
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-6 mt-3">
                    <div class="card card2 h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <img src="assets/app/dist/img/logo.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="col-10">
                                    <h5 class="card-title">Admin Sekolah</h5>
                                    <p class="card-text">Merupakan aplikasi induk dalam manjemen pengembangan
                                        keprofesian dan berkelanjutan</p>
                                    <a href="appp/" class="btn btn-sm btn-outline-success"><i class="mdi mdi-login"></i>
                                        Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <div class="card card2 h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <img src="assets/app/dist/img/logo.png" class="img-fluid" alt="Logo">
                                </div>
                                <div class="col-10">
                                    <h5 class="card-title">Guru Mata Pelajaran</h5>
                                    <p class="card-text">Merupakan aplikasi induk dalam manjemen pengembangan
                                        keprofesian dan berkelanjutan</p>
                                    <a href="app/" class="btn btn-sm btn-outline-success"><i class="mdi mdi-login"></i>
                                        Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section>

    <footer class="text-center warna-footer mt-5 align-content-end flex-wrap">
        <small>©2022, Kurikulumkita.com. Hak Cipta Dilindungi.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>