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
						<center><font size="6">DATA UNIT KERJA</font></center>
						<center><font size="6">PRODI TEKNOLOGI INFORMASI</font></center>
						<hr>
					</div>

					<div class="container-fluid p-1">
						<a href="tambahunitkerja.php"><button type="button" class="btn btn-primary mb-2" style="float:right;">Tambah Data Unit Kerja</button></a>
					</div>
                    <!-- Page Heading -->
					<div class="table-responsive border px-2 py-4">
							<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped " id="data-table">
								<thead style="background-color: #4e73df;">
									<tr class="text-light">
										<th scope="col">NO</th>
										<th scope="col">UNIT KERJA</th>
										<th scope="col">AKSI</th>
									</tr>
								</thead>
								<tbody>
										<?php
											$query = "SELECT * FROM unit_kerja ORDER BY id_unit_kerja ASC";
											$data = mysqli_query($koneksi, $query);
											$nomor = 1;
											while ($d = mysqli_fetch_array($data)) {
										?>
											<tr>
												<td><?php echo $nomor++; ?></td>
												<td><?php echo $d['unit_kerja']; ?></td>
													<td>
													<a href="editunitkerja.php?id=<?=$d['id_unit_kerja']?>" class="btn btn-secondary btn-sm">Edit</a>
													<a href="deleteunitkerja.php?id=<?=$d['id_unit_kerja']?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')">Delete</a>
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