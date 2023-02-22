<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin</title>
    
        <link rel="stylesheet" href="<?php echo base_url('assets/assets_admin/css/bootstrap.min.css')?>">

        <link rel="stylesheet" href="<?php echo base_url('assets/assets_admin/css/custom.css')?>">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body{
                margin-top:200px;
                background-color: #E6E6E6;
                margin-left: 200px;
            }

            form{
                margin-left:180px;
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
                <a href="<?php echo base_url('index.php/login/logout')?>"><button type = "button" class = "btn position-relative">
                  <i class="fas fa-user"></i>
                </button>Logout</a>
                </div>
                
                <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                    <ul class = "navbar-nav mx-auto text-center">
                        <li class = "nav-item px-2 py-2 active">
                            <a class = "nav-link text-uppercase text-dark" href="<?php echo base_url('index.php/admin_bibliografi/index')?>">bibliografi</a>
                        </li>
                        <li class = "nav-item px-2 py-2">
                            <a class = "nav-link text-uppercase text-dark"  href="<?php echo base_url('index.php/sirkulasi/index')?>">sirkulasi</a>
                        </li>
                        <li class = "nav-item px-2 py-2">
                            <a class = "nav-link text-uppercase text-dark" href="<?php echo base_url('index.php/anggota/index')?>">anggota</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end of navbar -->

        <!-- form  -->
        <div class="main-content">
            <div class="container mx-5 my-4">
            <section>
                <h2 class="mb-3"><center>Tambah Koleksi</center></h2>
                <form action="<?php echo base_url('index.php/koleksi/add');?>" method="post" class="form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="call_number" class="form-label">Call Number</label>
                        <input type="text" name="call_number" id="call_number" class="form-control col-md-10"
                            placeholder="Masukkan call number" value="<?php echo $call_number; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kode_koleksi" class="form-label">Kode Koleksi</label>
                        <input type="text" name="kode_koleksi" id="kode_koleksi" class="form-control col-md-10"
                            placeholder="Masukkan kode koleksi">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_register" class="form-label">Nomor Register</label>
                        <input type="text" name="nomor_register" id="nomor_register" class="form-control col-md-10" placeholder="Masukkan nomor register">
                    </div>
                    <div class="mb-3">
                        <label for="id_rak" class="form-label">No Rak</label>
                        <input type="text" name="id_rak" id="id_rak" class="form-control col-md-10"
                                placeholder="Masukkan no rak ">
                    </div>
                    <br>
                    <div class="mb-3">
                    <input type="submit" name="add" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </section>
            </div>
        </div>
        <!-- form  end -->


  
</body>
  
</html>


