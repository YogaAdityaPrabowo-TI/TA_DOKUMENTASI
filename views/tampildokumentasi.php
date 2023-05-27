<?php
//memasukkan file config.php
include('../config.php');
$idk= $_GET['id'];
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

					<center><font size="6">DOKUMENTASI KEGIATAN</font></center>
					<center><font size="6">PRODI TEKNOLOGI INFORMASI</font></center>
					<hr>
					<a href="tambahdokumentasi.php?id=<?=$idk?>"><button type="button" class="btn btn-primary mb-2" style="float:left;">Tambah Data Dokumentasi</button></a>
					<input type="button" style="float: right;" value="    Kembali    " onclick="history.back(-1)" class="btn btn-primary mb-2" />
					<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped ">
						<thead style="background-color: #4e73df;">
							<tr class="text-light">
								<th scope="col">NO</th>
								<th scope="col">DOKUMENTASI</th>
								<th scope="col">ID KATEGORI</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM dokumentasi INNER JOIN kegiatan ON kegiatan.id = dokumentasi.id WHERE dokumentasi.id = '$idk' ORDER BY id_dokumentasi ASC";
								$data = mysqli_query($koneksi, $query);
								$nomor = 1;
								while ($d = mysqli_fetch_array($data)) {
							?>
								<tr>
									<td><?php echo $nomor++; ?></td>
									<td><?php echo $d['nama_dokumentasi']; ?></td>
									<td><?php echo $d['id']; ?></td>
									<td>
										<a href="editdokumentasi.php?id=<?=$d['id_dokumentasi']?>" class="btn btn-secondary btn-sm">Edit</a>
										<a href="deletedokumentasi.php?id=<?=$d['id_dokumentasi']?>&nama_dokumentasi=<?=$d['nama_dokumentasi']?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')">Delete</a>
										<a href="pdf.php?id=<?=$d['id_dokumentasi']?>" class="btn btn-secondary btn-sm">Lihat Dokumen PDF</a>
									</td>
								</tr>
									
							<?php
								}
							?>
						<tbody>
					</table>
					</div>   

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
