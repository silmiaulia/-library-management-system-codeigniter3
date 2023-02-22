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

    <style>
      .collection{
        margin-left:160px;
      }
    </style>

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



    <!-- collection -->
    <section id = "collection" class = "py-5 mt-5">
        <div class = "container">
            <div class = "title text-center py-5">
                <h2 class = "position-relative d-inline-block">Book Collection</h2>
            </div>

            <div class = "row g-3 collection">
                <div class = "collection-list mt-4 row gx-0 gy-3">

                <?php

                  foreach ($bibliografi as $row) :
                ?>    
                      <div class = "col-md-6 col-lg-4 col-xl-3 mx-2 p-2">
                      <a href="<?php echo site_url('bibliografi/details/'.$row->id_bibliografi); ?>">

                          <div class = "collection-img position-relative">
                              <img src = "<?php echo base_url('assets/images/'.$row->foto)?>" class = "w-100">
                          </div>
                          <div class = "text-center mx-5 my-4">
                              <p class = "text-capitalize my-1"><?php echo $row->judul;?></p>
                              <span class = "fw-bold"><?php echo $row->kategori;?></span>
                          </div></a>
                      </div>
                  <?php endforeach;?>
                  </div>
            </div>
        </div>
    </section>
    
    <!-- end of collection -->

</body>
</html>