<?php 

session_start(); 

include "config.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    if (empty($username)) {

        header("Location: index.php?error=Mohon Isi Username & Password Anda");

        exit();

    }else if(empty($password)){

        header("Location: index.php?error=Password Anda Salah");

        exit();

    }else{

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: views/dashboard.php");

                exit();

            }else{

                echo '<script>alert("Username & Password Anda Salah"); location="index.php";</script>';

                exit();

            }

        }else{

            echo '<script>alert("Username & Password Anda Salah"); location="index.php";</script>';

            exit();

        }

    }

}else{

    header("Location: views/dashboard.php");

    exit();

}
?>