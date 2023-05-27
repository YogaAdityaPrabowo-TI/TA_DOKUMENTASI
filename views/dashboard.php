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
                    <center><br><br><br>
                    <img src="../img/TI.jpg" width="200px" height="180px" /> <br>
                    <br><br>
                    <h1 id="current-time"></h1>
                    <br><br>
                    <font Size="6">PENGEMBANGAN APLIKASI DOKUMENTASI KEGIATAN PRODI BERBASIS WEB</font>
                    </center>
                </div>

            </div>
            <!-- End of Main Content -->

            <?php include 'layouts/footer.php';?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'layouts/logoutmodal.php';?>

    <script>
        let time =document.getElementById("current-time");

        setInterval(() =>{
            let d = new Date();
            time.innerHTML = d.toLocaleTimeString();
        },1000)
    </script>

<?php include 'layouts/script.php' ?>

</body>

</html>