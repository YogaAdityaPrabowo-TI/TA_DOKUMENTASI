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
					<center><font size="6">Edit Data Unit Kerja</font></center>
					<hr>

					<?php
					//jika sudah mendapatkan parameter GET id dari URL
					if(isset($_GET['id'])){
						//membuat variabel $id untuk menyimpan id dari GET id di URL
						$id = $_GET['id'];

						//query ke database SELECT tabel mahasiswa berdasarkan id = $id
						$select = mysqli_query($koneksi, "SELECT * FROM unit_kerja WHERE id_unit_kerja='$id'") or die(mysqli_error($koneksi));
						// $select = mysqli_query($koneksi, "SELECT * FROM banner WHERE id='$id'") or die(mysqli_error($koneksi));

						//jika hasil query = 0 maka muncul pesan error
						if(mysqli_num_rows($select) == 0){
							echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
							exit();
						//jika hasil query > 0
						}else{
							//membuat variabel $data dan menyimpan data row dari query
							$data = mysqli_fetch_assoc($select);
						}
					}
					?>

					<?php
					//jika tombol simpan di tekan/klik
					if(isset($_POST['submit'])){

						$unit_kerja		= $_POST['unit_kerja'];
						
						$sql = mysqli_query($koneksi, "UPDATE unit_kerja SET unit_kerja='$unit_kerja' WHERE id_unit_kerja='$id'") or die(mysqli_error($koneksi));

						if($sql){
							echo '<script>alert("Berhasil menyimpan data."); document.location="tampilunitkerja.php";</script>';
						}else{
							echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
						}
					}
					?>

					<form action="editunitkerja.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
							<div class="col-md-6 col-sm-6">
								<input type="text" name="id_unit_kerja" class="form-control" size="7" value="<?php echo $data['id_unit_kerja']; ?>" readonly required>
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">Unit Kerja</label>
							<div class="col-md-6 col-sm-6">
								<input type="text" name="unit_kerja" class="form-control" value="<?php echo $data['unit_kerja']; ?>" autofocus required>
							</div>
						</div>
						
						<div class="item form-group">
							<div class="col-md-3 col-sm-3 offset-md-0">
								<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
								<a href="tampilunitkerja.php" class="btn btn-warning">Kembali</a>
							</div>
						</div>
					</form>
                </div>

            </div>
            <!-- End of Main Content -->

            <?php include 'layouts/footer.php';?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'layouts/logoutmodal.php';?>

<?php include 'layouts/script.php' ?>

</body>

</html>
