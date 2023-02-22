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


        <!-- content -->
        <div class="main-content">
            <br><h2 class="mx-4">Peminjaman</h2><br>

            <!-- informasi anggota -->
            <table class="table table-borderless mx-4">
                <tbody>
                    <tr>
                        <td>
                            <a class='btn btn-success' href="<?php echo base_url('index.php/sirkulasi/index')?>" role='button'>Transaksi Selesai</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="8%"><strong>Nama Member:</strong></td>
                        <td width="20%"><?php echo $anggota->nama_anggota; ?></td>
                        <td width="8%"><strong>Alamat:</strong></td>
                        <td width="40%"><?php echo $anggota->alamat; ?></td>

                    </tr>
                    <tr>
                        <td width="8%"><strong>ID Member:</strong></td>
                        <td width="20%"><?php echo $anggota->id_anggota; ?></td>
                        <td width="8%"><strong>Email:</strong></td>
                        <td width="40%"><?php echo $anggota->email; ?></td>
                    </tr>

                </tbody>
            </table>
            <!-- end informasi anggota -->

            <!-- menu transaksi -->
            <div class="btn-group mx-4 my-5">
                <a class='btn btn-dark' href="<?php echo base_url('index.php/sirkulasi/peminjaman/'.$anggota->id_anggota);?>" role='button'>Pinjam Baru</a>
                <a class='btn btn-secondary' href="<?php echo base_url('index.php/sirkulasi/peminjamanSekarang/'.$anggota->id_anggota);?>" role='button'>Peminjaman Sekarang</a>
                <a class='btn btn-dark' href="<?php echo base_url('index.php/sirkulasi/peminjamanHistory/'.$anggota->id_anggota);?>" role='button'>History Peminajaman</a>
            </div>
            <!-- end menu transaksi -->


            <!-- hasil pencarian koleksi -->
            <?php
            // if(count($_POST) > 0){

                if($ada == 1){
            ?>
            <div class="container mx-3 my-4">

                <table class="table table-striped mt-4">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Koleksi</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Jatuh Tempo</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = 0;
                    foreach ($transaksi as $row) :

                        $count++;
                    ?>
                    <tr>
                        <td><br><?php echo $count;?></td>
                        <td><br><?php echo $row->kode_koleksi;?></td>
                        <td><br><?php echo $row->tanggal_pinjam;?></td>
                        <td><br><?php echo $row->tanggal_jatuh_tempo;?></td>
                        <td align='center'>
                            <form name="userinput" action="<?php echo base_url('index.php/sirkulasi/kembalikanTransaksi')?>" method="post">
                                <button type="submit" class="btn btn-danger my-4">Kembalikan</button>
                                <input type="hidden" id="custId" name="id_anggota" value="<?php echo $anggota->id_anggota;?>">
                                <input type="hidden" id="custId" name="id_transaksi" value="<?php echo $row->id_transaksi;?>">
                                <input type="hidden" id="custId" name="kode_koleksi" value="<?php echo $row->kode_koleksi;?>">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            <?php 
                }else{
                    echo "<h3 class='mx-3 px-4'>Tidak ada buku yang sedang dipinjam</h3>";
                }
            ?>
            </div><br>
            <!-- end hasil pencarian koleksi -->

        </div>
        <!-- end content -->
                    
  
</body>
  
</html>


