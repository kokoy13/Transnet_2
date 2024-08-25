<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: ../login.php');
        exit;
    }

    include('../connection/function.php');

    $getID = $_GET["id"];
    $getSN = $_GET["snont"];

    if(delete($getID, $getSN) > 0){
        echo "<script>
            alert('Berhasil Menghapus Data')
            window.location.href = 'customers.php';
        </script>";
    }else{
        echo "<script>
            alert('Gagal Menghapus Data')
            window.location.href = 'addCustomer.php';
        </script>";
    }
?>