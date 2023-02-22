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
        
</head>
<body> 
    <div class="container my-5 pt-4 pb-5 px-5 rounded bg-white" style="max-width:500px">
        <h1 class="text-center mb-4">Login Page</h1>
        <form action="<?php echo base_url('index.php/login/prosesLogin');?>" method="post">
            <div class="mb-3"">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3"">
                <label for="password" class="form-label">Password : </label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" name="submit" value="Login" class="w-100 btn btn-primary">
        </form>
    </div>

</body>
</html>