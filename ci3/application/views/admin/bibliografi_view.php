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
                margin-left: 180px;
            }
        </style>

        
</head>
<body> 

        <?php 
            if($this->session->userdata('status') != "login"){
                redirect(base_url('index.php/login/index'));
            }
        ?>

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
                        <li class = "nav-item px-2 py-2 ">
                            <a class = "nav-link text-uppercase text-dark" href="<?php echo base_url('index.php/anggota/index')?>">anggota</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end of navbar -->

        <!-- tabel bibliografi -->
        <div class="main-content">
            <div class="container mx-5 my-4">
                <h3><strong><center>DAFTAR BIBLIOGRAFI</center></strong></h3>
                <a class='btn btn-success' href="<?php echo base_url('index.php/admin_bibliografi/form/');?>" role='button'>Tambah</a>
                <table class="table table-striped mt-1">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col"></th>
                        <th scope="col">Judul</th>
                        <th scope="col">Jumlah Koleksi</th>
                        <th scope="col">Jumlah Stok</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <?php
                    $count = 0;
                    foreach ($bibliografi as $row) :
                        $jumlahStok = $this->koleksi_model->Count_BiblioinKoleksi($row->call_number);
                        // $CI =& get_instance();
                        // $jumlahStok = $CI->countStok($row->call_number);

                        $count++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $count;?></th>
                        <td width="25%"><img src = "<?php echo base_url('assets/images/'.$row->foto)?>" class="w-25"></td>
                        <td><?php echo $row->judul;?></td>
                        <td><?php echo $row->jumlah_stok;?></td>
                        <td><?php echo $jumlahStok;?></td>

                        <td width="25%" align='center'>
                            <a class='btn btn-secondary' href="<?php echo base_url('index.php/koleksi/index/'.$row->call_number)?>" role='button'>Detail</a>
                            <a class='btn btn-primary' href="<?php echo base_url('index.php/admin_bibliografi/formUpdate/'.$row->id_bibliografi)?>" role='button'>Update</a>
                            <a class='btn btn-danger' href="<?php echo base_url('index.php/admin_bibliografi/delete/'.$row->id_bibliografi)?>" role='button'>Delete</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- tabel bibliografi end -->

</body>
  
</html>


