<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id-ID">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>UD. MEBEL ANUGERAH JAYA</title>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url("assets/images/Satu.png");?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/login.css"); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/sweetalert2.min.css"); ?>" />
		<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a81368914c.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	<img class="wave" src="<?php echo base_url("assets/login/wave.png"); ?>">
	<div class="container">
		<div class="img">
			<img src="<?php echo base_url("assets/login/bg.svg"); ?>">
		</div>
		<div class="login-content">
			<form id="test-form" class="limiter" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
				<img src="<?php echo base_url("assets/login/avatar.svg"); ?>">
				<h3 class="title">Welcome To ANJAYA MEBEL</h3>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" id="username" name="username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input"  id="password" name="password" required>
            	   </div>
            	</div>
            	<input type="submit" class="btn" id="tombol" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url("assets/login/login.js"); ?>"></script>
	</body>
    <script type="text/javascript" src="<?php echo base_url("assets/login/core/jquery-3.2.1.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/login/core/bootstrap.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/login/core/popper.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/login/sweetalert2.min.js"); ?>"></script>
    <script type="text/javascript">
		$(function(){
			$("#login").on("submit",function(e){
				e.preventDefault();
				var btn = $(".btn-success").html();
				$(".btn-success").html("<i class='la la-spin la-spinner'></i> Tunggu Sebentar...");
				$.post("<?php echo site_url("admin/auth"); ?>",$(this).serialize(),function(msg){
					var dt = eval("("+msg+")");
					$(".btn-success").html(btn);
					if(dt.success == true){
						swal.fire("Berhasil!","selamat datang kembali "+dt.name,"success").then(function(){
							window.location.href = "<?=site_url("admin");?>";
						});
					}else{
						swal.fire("Gagal!","gagal masuk, cek kembali username & password anda","warning");
					}
				});
			});
		});
	</script>
</html>