<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin</title>
        
	    <!-- Bootstrap CSS -->
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

        <!-- form bibliografi -->
        <div class="main-content">
            <div class="container mx-5 my-4">
            <section>
                <h2 class="mb-3"><center>Tambah Bibliografi<center></h2>
                <form action="<?php echo base_url('index.php/admin_bibliografi/add');?>" method="post" class="form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="call_number" class="form-label">Call Number</label>
                        <input type="text" name="call_number" id="call_number" class="form-control col-md-10"
                            placeholder="Masukkan call number" required>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" id="isbn" class="form-control col-md-10" 
                            placeholder="Masukkan ISBN">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control col-md-10" placeholder="Masukkan judul buku">
                    </div>
                    <div class="mb-3">
                        <label for="edisi" class="form-label">Edisi</label>
                        <input type="text" name="edisi" id="edisi" class="form-control col-md-10" 
                                placeholder="Masukkan edisi buku">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control col-md-10" 
                            placeholder="Masukkan penerbit">
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control col-md-10" 
                            placeholder="Masukkan penulis">
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="text" name="tahun" id="tahun" class="form-control col-md-10" 
                            placeholder="Masukkan tahun terbit">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control col-md-10" 
                            placeholder="Masukkan kategori">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control col-md-10" 
                            placeholder="Masukkan harga">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload Foto Buku</label><br>
                        <input type="file" name="foto" id="foto" class="form-control col-md-10">
                    </div>
                    <?php if(isset($error)): echo $error; endif;?>
                    <br>
                    <div class="mb-3">
                    <input type="submit" name="add" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </section>
            </div>
        </div>
        <!-- form bibliografi end -->


  
</body>
  
</html>


