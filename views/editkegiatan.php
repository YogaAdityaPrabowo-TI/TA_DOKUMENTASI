<?php include('../config.php'); 
$id=$_GET['id'];
?>

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
						<center><font size="6">Edit Data Kegiatan</font></center>
						<hr>

						<?php
						//jika sudah mendapatkan parameter GET id dari URL
						if(isset($_GET['id'])){
							//membuat variabel $id untuk menyimpan id dari GET id di URL
							$id = $_GET['id'];

							//query ke database SELECT tabel mahasiswa berdasarkan id = $id
							$select = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id='$id'") or die(mysqli_error($koneksi));
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

							$no_spmu		= $_POST['no_spmu'];
							$tanggal		= $_POST['tanggal'];
							$tahun_ajaran	= $_POST['tahun_ajaran'];
							$nama_kegiatan	= $_POST['nama_kegiatan'];
							$uraian			= $_POST['uraian'];
							$unit_kerja		= $_POST['unit_kerja'];
							
							$sql = mysqli_query($koneksi, "UPDATE kegiatan SET no_spmu='$no_spmu', tanggal='$tanggal', tahun_ajaran='$tahun_ajaran', nama_kegiatan='$nama_kegiatan', uraian='$uraian', unit_kerja='$unit_kerja' WHERE id='$id'") or die(mysqli_error($koneksi));

							if($sql){
								echo '<script>alert("Berhasil menyimpan data."); document.location="tampilkegiatan.php";</script>';
							}else{
								echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
							}
						}
						?>

						<form action="editkegiatan.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
										<div class="col-md-6 col-sm-6">
											<input type="text" name="id" class="form-control" size="7" value="<?php echo $data['id']; ?>" readonly required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">NO.SPMU</label>
										<div class="col-md-6 col-sm-6">
											<input type="text" name="no_spmu" class="form-control" value="<?php echo $data['no_spmu']; ?>" autofocus required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
										<div class="col-md-6 col-sm-6">
											<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>" required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Ajaran</label>
										<div class="col-md-6 col-sm-6">
											<select type="text" name="tahun_ajaran" class="form-control" required>
												<?php
												$qry = $koneksi->query("SELECT * FROM tahun_ajaran");
												while($tahun_ajaran = $qry->fetch_assoc()){?>
													<option value="<?= $tahun_ajaran['tahun_ajaran'];?>"><?= $tahun_ajaran['tahun_ajaran'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kegiatan</label>
										<div class="col-md-6 col-sm-6">
											<input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $data['nama_kegiatan']; ?>" required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Uraian</label>
										<div class="col-md-6 col-sm-6">
											<input type="text" name="uraian" class="form-control" value="<?php echo $data['uraian']; ?>" required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Unit Kerja</label>
										<div class="col-md-6 col-sm-6">
											<input type="text" name="unit_kerja" class="form-control" value="<?php echo $data['unit_kerja']; ?>" required>
										</div>
									</div>
									
									<div class="item form-group">
										<div class="col-md-3 col-sm-3 offset-md-0">
											<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
											<a href="tampilkegiatan.php" class="btn btn-warning">Kembali</a>
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