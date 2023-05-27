<?php
//memasukkan file config.php
include('../config.php');
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

					<div>
						<center><font size="6">DATA KEGIATAN</font></center>
						<center><font size="6">PRODI TEKNOLOGI INFORMASI</font></center>
						<hr>
					</div>

					<div class="container-fluid p-1">
						<a href="tambahkegiatan.php"><button type="button" class="btn btn-primary mb-2" style="float:right;">Tambah Data Kegiatan</button></a>
					</div>

                    <!-- Page Heading -->
					<div class="table-responsive border px-2 py-4">
							<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped " id="data-table">
								<thead style="background-color: #4e73df;">
									<tr class="text-light">
										<th scope="col">NO</th>
										<th scope="col">NO.SPMU</th>
										<th scope="col">Tanggal</th>
										<th scope="col">Tahun Ajaran</th>
										<th scope="col">Nama Kegiatan</th>
										<th scope="col">Uraian</th>
										<th scope="col">Unit Kerja</th>
										<th scope="col">Aksi</th>
										<th scope="col">Dokumentasi</th>
									</tr>
								</thead>
								<tbody>
										<?php
											$query = "SELECT * FROM kegiatan ORDER BY id ASC";
											$data = mysqli_query($koneksi, $query);
											$nomor = 1;
											while ($d = mysqli_fetch_array($data)) {		
										?>
										
											<tr>
												<td><?php echo $nomor++; ?></td>
												<td><?php echo $d['no_spmu']; ?></td>
												<td><?php echo $d['tanggal']; ?></td>
												<td><?php echo $d['tahun_ajaran']; ?></td>
												<td><?php echo $d['nama_kegiatan']; ?></td>
												<td><?php echo $d['uraian']; ?></td>
												<td><?php echo $d['unit_kerja']; ?></td>
													<td>
													<a href="editkegiatan.php?id=<?=$d['id']?>" class="btn btn-secondary" style="width:80px;">Edit</a>
													<a href="deletekegiatan.php?id=<?=$d['id']?>" class="btn btn-danger" style="width:80px;" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')">Delete</a>
													</td>
													<td>
													<a href="tampildokumentasi.php?id=<?=$d['id']?>" class="btn btn-secondary" style="width:150px; height:60px;">Data Dokumentasi</a>
													</td>
											</tr>

										<?php
											}
										?>
								</tbody>
							</table>
							</div>
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