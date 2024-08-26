<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: ../login.php');
        exit;
    }

    include('../connection/function.php');

    if(isset($_POST["submit"])){

        if(create() > 0){
            echo "<script>
                alert('Berhasil Menambahkan Data')
                window.location.href = 'customers.php';
            </script>";
        }else{
            echo "<script>
                alert('Gagal Menambahkan Data')
                window.location.href = 'addCustomer.php';
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../src/output.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>Add Customer</title>
</head>
<body class="m-5 flex justify-center items-center bg-cyan-100" style="font-family: Nunito;">
    <div class="flex shadow-[1px_1px_3px_rgba(0,0,0,0.5)] rounded-xl h-max w-max">
        <form action="" method="post" class="p-8 bg-white w-max flex flex-col gap-5 rounded-xl">
            <div class="flex gap-3 items-center">
                <img class="w-8 h-8" src="../assets/img/addcustomers-black.png" alt="">
                <div class="flex flex-col gap-1">
                    <h1 class="font-bold uppercase text-xl">Form Add Customer</h1>
                    <span class="">Form add new customer</span>
                </div>
            </div>
                <!-- From Customer -->
            <div class="flex flex-col gap-3">
                <h1 class="font-bold text-lg">Customers</h1>
                <div class="flex gap-3">
                    <div class="flex flex-col gap-1 ">
                        <h2 class="text-sm">Nama*</h2>
                        <input autofocus autocomplete="off" class="bg-slate-200 w-max px-3 py-1 rounded-sm" type="text" name="nama" required placeholder="Customer Name">
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex gap-2 items-end">
                            <h2 class="text-sm">ID*</h2>
                            <span class="text-xs text-gray-500">//ID harus sesuai dengan ID Interface PPP</span>
                        </div>
                        <input autocomplete="off" class="bg-slate-200 w-max px-3 py-1 rounded-sm" type="text" name="id" required placeholder="Customer ID">
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-sm">Alamat*</h2>
                    <textarea name="address" cols="40" class="bg-slate-200 w-max px-3 py-1 rounded-sm"></textarea>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-sm">Kontak*</h2>
                    <input autocomplete="off" class="bg-slate-200 w-max px-3 py-1 rounded-sm" type="text" name="kontak" placeholder="08xx-xxxx-xxxx">
                </div>
                <div class="flex justify-between">
                    
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm">Latitude*</h2>
                        <input autocomplete="off" class="bg-slate-200 w-max px-3 py-1 rounded-sm" type="text" name="latitude" placeholder="-0,xxx">
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm">Longitude*</h2>
                        <input autocomplete="off" class="bg-slate-200 w-max px-3 py-1 rounded-sm" type="text" name="longitude" placeholder="0,xxx">
                    </div>
                </div>
            </div>
                <!-- FORM ONT -->
            <div class="flex flex-col gap-3">
                <h1 class="font-bold text-lg">ONT</h1>
                <div class="flex justify-between">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm">Serial Number*</h2>
                        <input autocomplete="off" class="bg-slate-200 w-max px-3 py-1 rounded-sm" type="text" name="snont" required placeholder="SN ONT">
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm">Optical Line Terminal*</h2>
                        <input autocomplete="off" class="bg-slate-200 w-max px-3 py-1 rounded-sm" type="text" name="olt" required placeholder="OLT">
                    </div>
                </div>
            </div>
                <!-- FORM SERVICE -->
            <div class="flex flex-col gap-3">
                <h1 class="font-bold text-lg">Services</h1>
                <div class="flex gap-5">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm">Paket Langganan*</h2>
                        <select name="packet" id="" class="bg-slate-200 px-3 py-1 rounded-sm">
                            <option selected disabled></option>

                            <option value="Family">Family</option>
                            <option value="Dedicated">Dedicated</option>
                            <option value="Internet Kerja">Internet Kerja</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm">Bandwith*</h2>
                        <div class="flex gap-2 items-center">
                            <select name="bw" id="" class="bg-slate-200 px-3 py-1 rounded-sm">
                                <option selected disabled></option>
    
                                <option value=10>10</option>
                                <option value=20>20</option>
                                <option value=30>30</option>
                                <option value=50>50</option>
                                <option value=60>60</option>
                                <option value=100>100</option>
                            </select>
                            <span> / MBps</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-5 justify-center">
                    <!-- SUBMIT BUTTON -->
                <button class="bg-cyan-500 shadow-[1px_1px_3px_rgba(0,0,0,0.5)] px-5 py-1 rounded-full text-white w-max self-center text-xl hover:shadow-none transition duration-300" onclick="window.location.href='customers.php'">
                    Kembali
                </button>
                <!-- SUBMIT BUTTON -->
                <button class="bg-cyan-500 shadow-[1px_1px_3px_rgba(0,0,0,0.5)] px-5 py-1 rounded-full text-white w-max self-center text-xl hover:shadow-none transition duration-300" type="submit" name="submit">
                    Tambahkan
                </button>
            </div>
        </form>
        <img src="../assets/img/aside.jpg" class="w-[500px] h-full rounded-r-xl" alt="">
    </div>
</body>
</html>