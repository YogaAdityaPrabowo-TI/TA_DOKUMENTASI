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

					<center><font size="6">Tambah Data Unit Kerja</font></center>
					<hr>
					<?php
					if(isset($_POST['submit'])){
						$id					= $_POST['id_unit_kerja'];
						$unit_kerja			= $_POST['unit_kerja'];

						$cek = mysqli_query($koneksi, "SELECT * FROM unit_kerja WHERE id_unit_kerja='$id'") or die(mysqli_error($koneksi));

						if(mysqli_num_rows($cek) == 0){
							
							if ($_POST){
								$sql = mysqli_query($koneksi, "INSERT INTO unit_kerja(id_unit_kerja, unit_kerja) VALUES('$id', '$unit_kerja')") or die(mysqli_error($koneksi));

							if($sql){
								echo '<script>alert("Berhasil menambahkan data."); document.location="tampilunitkerja.php";</script>';
							}else{
								echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
							}
						}
						}else{
							echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
						}
					}
					?>

					<form action="tambahunitkerja.php" method="post" enctype="multipart/form-data">

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">Unit Kerja</label>
							<div class="col-md-6 col-sm-6">
								<input type="text" name="unit_kerja" class="form-control" pattern="[A-Za-z ]+" required autofocus>
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