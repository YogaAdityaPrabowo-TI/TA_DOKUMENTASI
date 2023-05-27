<!DOCTYPE html>
<html>
<head>
	<title>DOKUMENTASI KEGIATAN PRODI</title>
    <link rel="icon" href="img/TI.jpg" type="image/ico" />
	<link rel="stylesheet" type="text/css" href="css/csslogin.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">
			<div class="signup">
				<form>
                    <center>
					<label for="chk" aria-hidden="true">DOKUMENTASI KEGIATAN PRODI</label>
                    <img style="width: 120px;" src="img/TI.jpg" alt="..." class="img-circle profile_img">
                    </center>
				</form>
                <form action="newlogin.php" method="post">  	
                <div class= "eror">
                <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>

                <?php } ?>
					<input type="text" name="username" placeholder="User Name" required autofocus>
					<input type="password" name="password" placeholder="Password" required>
					<button type="submit">Login</button>
                </div>
                </from>
			</div>
	</div>
</body>
</html>