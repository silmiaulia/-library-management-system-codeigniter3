<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booksy Library</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel = "stylesheet" href = "<?php echo base_url('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css')?>">

    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/main.css')?>">

</head>
<body>
    
    <!-- navbar -->
    <nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0" href = "<?php echo base_url('index.php/bibliografi/index')?>#header">
                <span class = "text-uppercase fw-lighter ms-2">Booksy</span>
            </a>

            <div class = "order-lg-2 nav-btns">
                <a href="<?php echo base_url('index.php/admin_bibliografi/index')?>"><button type = "button" class = "btn position-relative">
                  <i class="fas fa-user"></i>
                </button>Admin</a>
            </div>
            
            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "<?php echo base_url('index.php/bibliografi/index')?>#header">home</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "<?php echo base_url('index.php/bibliografi/index')?>#collection">collection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->


    <!-- banner -->
    <section  class = "pt-5 mt-5">
        <div class = "container mt-5">
            <h4>Detail Buku</h4>
        </div>
    </section>
    <!-- end of banner -->

   

    <!-- about us -->
    <section id = "about" class = "py-5">
        <div class = "container">
  
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <p>Judul Buku: <?php echo $biblioDetail->judul; ?></p>
                    <p>Tahun: <?php echo $biblioDetail->tahun; ?></p>
                    <p>Edisi: <?php echo $biblioDetail->edisi; ?></p>
                    <p>Kategori: <?php echo $biblioDetail->kategori; ?></p>
                    <p>ISBN: <?php echo $biblioDetail->isbn; ?></p>
                    <p>Penulis: <?php echo $biblioDetail->penulis; ?></p>
                    <p>Penerbit: <?php echo $biblioDetail->penerbit; ?></p>
                    <p>Harga: Rp. <?php echo $biblioDetail->harga; ?></p><br>

                    <p><span style="font-weight:900">Jumlah Stok: <?php echo $countBiblioinKoleksi; ?></span></p>

                </div>
                <div class = "col-lg-5 order-lg-0">
                    <img src = "<?php echo base_url('assets/images/'.$biblioDetail->foto)?>" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->

</body>
</html>