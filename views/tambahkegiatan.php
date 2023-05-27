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
                	<center><font size="6">Tambah Data Kegiatan</font></center>
					<hr>
					<?php
					if(isset($_POST['submit'])){
						$id				= $_POST['id'];
						$no_spmu		= $_POST['no_spmu'];
						$tanggal		= $_POST['tanggal'];
						$tahun_ajaran	= $_POST['tahun_ajaran'];
						$nama_kegiatan	= $_POST['nama_kegiatan'];
						$uraian			= $_POST['uraian'];
						$unit_kerja		= $_POST['unit_kerja'];

						$cek = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id='$id'") or die(mysqli_error($koneksi));

						if(mysqli_num_rows($cek) == 0){
							
							if ($_POST){
								$sql = mysqli_query($koneksi, "INSERT INTO kegiatan(id, no_spmu, tanggal, tahun_ajaran, nama_kegiatan, uraian, unit_kerja) VALUES('$id', '$no_spmu', '$tanggal', '$tahun_ajaran', '$nama_kegiatan', '$uraian', '$unit_kerja')") or die(mysqli_error($koneksi));

							if($sql){
								echo '<script>alert("Berhasil menambahkan data."); document.location="tampilkegiatan.php";</script>';
							}else{
								echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
							}
						}
						}else{
							echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
						}
					}
					?>

						<form action="tambahkegiatan.php" method="post" enctype="multipart/form-data">

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">NO.SPMU</label>
										<div class="col-md-6 col-sm-6">
											<input type="text" name="no_spmu" class="form-control" required autofocus>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
										<div class="col-md-6 col-sm-6">
											<input type="date" name="tanggal" class="form-control" required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Ajaran</label>
										<div class="col-md-6 col-sm-6">
											<select type="text" name="tahun_ajaran" class="form-control" placeholder="Tahun Ajaran" required>
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
											<input type="text" name="nama_kegiatan" class="form-control" pattern="[A-Za-z ]+" required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Uraian</label>
										<div class="col-md-6 col-sm-6">
											<input type="text" name="uraian" class="form-control" pattern="[A-Za-z ]+" required>
										</div>
									</div>

									<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align">Unit Kerja</label>
										<div class="col-md-6 col-sm-6">
											<select type="text" name="unit_kerja" class="form-control" placeholder="Unit Kerja" required>
												<?php
												$qry = $koneksi->query("SELECT * FROM unit_kerja");
												while($unit_kerja = $qry->fetch_assoc()){?>
													<option value="<?= $unit_kerja['unit_kerja'];?>"><?= $unit_kerja['unit_kerja'];?></option>
												<?php } ?>
											</select>
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

            <?php include 'layouts/footer.php';?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'layouts/logoutmodal.php';?>

<?php include 'layouts/script.php' ?>

</body>

</html>