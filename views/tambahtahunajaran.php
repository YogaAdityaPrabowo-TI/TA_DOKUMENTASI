<?php include('../config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'layouts/head.php';
    ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'layouts/side.php';?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'layouts/nav.php';?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

					<center><font size="6">Tambah Data Tahun Ajaran</font></center>
					<hr>
					<?php
					if(isset($_POST['submit'])){
						$id					= $_POST['id_tahun_ajaran'];
						$tahun_ajaran		= $_POST['tahun_ajaran'];

						$cek = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id'") or die(mysqli_error($koneksi));

						if(mysqli_num_rows($cek) == 0){
							
							if ($_POST){
								$sql = mysqli_query($koneksi, "INSERT INTO tahun_ajaran(id_tahun_ajaran, tahun_ajaran) VALUES('$id', '$tahun_ajaran')") or die(mysqli_error($koneksi));

							if($sql){
								echo '<script>alert("Berhasil menambahkan data."); document.location="tampiltahunajaran.php";</script>';
							}else{
								echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
							}
						}
						}else{
							echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
						}
					}
					?>

					<form action="tambahtahunajaran.php" method="post" enctype="multipart/form-data">

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Ajaran</label>
								<div class="col-md-6 col-sm-6">
									<input type="text" name="tahun_ajaran" class="form-control" required autofocus>
								</div>
						</div>
								
						<div class="item form-group">
								<div  class="col-md-3 col-sm-3 offset-md-0">
									<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
									<input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-danger" />
								</div>
					</form>

                </div>

				</div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
		<?php include 'layouts/footer.php';?>

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'layouts/logoutmodal.php';?>

<?php include 'layouts/script.php' ?>

</body>

</html>
