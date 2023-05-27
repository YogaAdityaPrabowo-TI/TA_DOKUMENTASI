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

					<center><font size="6">Tambah Data Dokumentasi</font></center>
					<hr>
					<?php
					if(isset($_POST['submit'])){
						$id							= $_POST['id_dokumentasi'];
						$nama_dokumentasi_name		= $_FILES['nama_dokumentasi']['name'];
						$nama_dokumentasi_tmp		= $_FILES['nama_dokumentasi']['tmp_name'];
						$id_kegiatan				= $_POST['id'];

						$cek = mysqli_query($koneksi, "SELECT * FROM dokumentasi WHERE id_dokumentasi='$id'") or die(mysqli_error($koneksi));

						if(mysqli_num_rows($cek) == 0){
							$namafile = uniqid()."_".$nama_dokumentasi_name;
							$pindah = move_uploaded_file($nama_dokumentasi_tmp,"../upload_dokumentasi/".$namafile);
							if ($pindah){
							$sql = mysqli_query($koneksi, "INSERT INTO dokumentasi(id_dokumentasi, nama_dokumentasi, id) VALUES('$id', '$namafile', '$id_kegiatan')") or die(mysqli_error($koneksi));

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

					<form action="tambahdokumentasi.php" method="post" enctype="multipart/form-data">

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">Dokumentasi</label>
							<div class="col-md-6 col-sm-6">
								<input type="file" name="nama_dokumentasi" class="form-control" required>
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align">ID Kategori</label>
							<div class="col-md-6 col-sm-6">
							<select type="text" name="id" class="form-control" placeholder="id" required>
								<?php
								$qry = $koneksi->query("SELECT * FROM kegiatan");
								while($kategori = $qry->fetch_assoc()){?>
									<option value="<?= $kategori['id'];?>"><?= $kategori['id'];?></option>
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

        </div>
        <!-- End of Content Wrapper -->
		<?php include 'layouts/footer.php';?>

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'layouts/logoutmodal.php';?>

<?php include 'layouts/script.php' ?>

</body>

</html>