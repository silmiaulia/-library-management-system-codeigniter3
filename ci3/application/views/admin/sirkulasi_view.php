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
                margin-top:100px;
                background-color: #E6E6E6;
                margin-left: 230px;
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
                        <li class = "nav-item px-2 py-2">
                            <a class = "nav-link text-uppercase text-dark" href="<?php echo base_url('index.php/admin_bibliografi/index')?>">bibliografi</a>
                        </li>
                        <li class = "nav-item px-2 py-2 active">
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

        <div class="main-content">
            <!-- buat form search  -->
            <div class="container mx-3 my-5">
            <form name="userinput" action="cariAnggota" method="post">
                    <div class="mb-3 w-25">
                        <input type="text" name="id_anggota" class="form-control" id="exampleFormControlInput1" placeholder="Cari id anggota...">
                        <button type="submit" class="btn btn-primary my-4">Cari</button>
                    </div> 
                </form>
            </div>
            <!-- buat form search -->

            <!-- tabel hasil search -->
            <?php

                if(count($_POST) > 0){

                    if($ada == 1){
            ?>
            <div class="container mx-3 my-4">
                <h1><center>Anggota</center></h1>

                    <table class="table table-striped mt-4">
                        <thead>
                        <tr>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $anggota->nama_anggota;?></td>
                            <td><?php echo $anggota->id_anggota;?></td>
                            <td align='center'>
                                <a class='btn btn-primary' href="<?php echo base_url('index.php/sirkulasi/peminjaman/'.$anggota->id_anggota);?>" role='button'>Lakukan Transaksi</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php 
                    }else{
                        echo "<h3 class='mx-3 px-4'>Anggota yang dicari tidak ada</h3>";
                    }
                }?>
            </div>
        </div>
  
</body>
  
</html>


