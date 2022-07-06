<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
    <title>Selamat Belajar - <?php
                                $data['user'] = $this->db->get_where('siswa', ['email' =>
                                $this->session->userdata('email')])->row_array();
                                echo $data['user']['nama'];
                                ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/popup/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/materi_style.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>

</head>

<body style="overflow-x:hidden;background-color:#fbf9fa">

    <!-- Start Navigation Bar -->
    <header class="header_area" style="background-color: white !important;">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a href="#" style="font-size: 30px;font-weight:900;font-family: 'Poppins', sans-serif;"
                        class="text-success text-center"><img src="<?= base_url('assets/') ?>img/favicon.png" alt="">
                        E-Pens </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="javascript:void(0)">Hai, <?php
                                                                                                        $data['user'] = $this->db->get_where('siswa', ['email' =>
                                                                                                        $this->session->userdata('email')])->row_array();
                                                                                                        echo $data['user']['nama'];
                                                                                                        ?></a>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="<?= base_url('user') ?>">Beranda</a>
                            </li>
                            <li class=" nav-item "><a class=" nav-link text-danger"
                                    href="<?= base_url('welcome/logout') ?>">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Navigation Bar -->


    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1 ml-4">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                        data-aos-duration="1400">Selamat Mengerjakan Tugas ! </h1>
                    <p>Silahkan menonton terlebih dahulu materi di bawah ini agar kamu bisa memahami sebuah materi yang
                        di ajarkan dengan mudah dan paham,jika video materi tidak bisa di putar kalian langsung
                        mendownload file materi di bawah video ini.</p>
                    <hr style="background-color: white;">
                    <p> <b>Judul Tugas :</b> <?=$tambah->judul?></p>
                    <b>
                        <p style="line-height: 10px;">Deskripsi tugas:
                    </b> <?= substr($tambah->deskripsi, 0, 120); ?></p>
                    <p> <b>Tanggal Kumpul :</b> <?=$tambah->tanggal_kumpul?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->
    <br>
    <!-- Start Video Player -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-left" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: white; font-family: 'poppins';">
                <div class="col-md-6">
                    <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 40px;">
                        File Tugas</p>
                    <p style="color:black;">Silahkan Download tugas anda di bawah ini</p>
                    <h5 data-aos="fade-left" data-aos-duration="1400"><img style="width:100px;"
                            src="<?= base_url() . 'assets/img/file.jpg'?>" alt="file kosong"> <a
                            href="<?=base_url().'assets/materi_video/'.$tambah->video;?>"
                            target="_blank"><?=''.$tambah->video;?></a></h5>

                </div>
                <div class="col-md-6">
                    <div class="card materi w-150 border-0">
                        <div class="card-body p-5">
                            <p class="registration-title font-weight-bold display-4 "
                                style="color:black; font-size: 40px;">
                                Pengumpulan Tugas</p>
                            <p style="line-height:-30px;margin-top:-10px;">Silahkan kumpulkan Tugas anda di bawah ini
                            </p>

                            <form method="post" enctype="multipart/form-data"
                                action="<?= base_url('materi/tugas/' . $tambah->id) ?>">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input required type="file" name="video"
                                                value="<?=base_url().'assets/materi_video/'.$tambah->video;?>" required
                                                class="custom-file-input" id="inputGroupFile01"
                                                aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Upload Tugas
                                                Disini</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-success">Tambah
                                    Tugas ⭢</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Deskripsi Materi -->
    <br>

    <!-- Start Disqus Comment -->

    <!-- Start Disqus Comment -->


    <br>
    <br>
    <br>


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <!-- End Animate On Scroll -->