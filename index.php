<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: login.php');
        exit;
    }

    include('connection/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONT LINK Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./src/output.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Transnet Sumbar</title>
</head>
<body class="w-dvw h-dvh overflow-hidden bg-slate-100 flex" style="font-family: Nunito">
    <?php
        include('navbar/navbar.php');
    ?>
    <main class="overflow-auto w-dvw">
        <header class="bg-cyan-400 px-4 py-[20px]">
            <div class="flex flex-col gap-1">
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
            </div>
        </header>
        <section class="m-5 bg-white p-5">
            <div class="flex justify-between items-center font-bold ">
                <h1 class="text-3xl">Welcome Admin</h1>
                <div class="text-xl flex gap-2">
                    <p><?=datenow();?>,</p>
                    <div class="flex gap-1">
                        <p id="hours">00</p>
                        <p>:</p>
                        <p id="min">00</p>
                        <p>:</p>
                        <p id="sec">00</p>
                    </div>
                </div>
            </div>
            <!-- recent/terbaru
            count customer -->
        </section>
    </main>

    <script src="js/real-time.js"></script>
</body>
</html>