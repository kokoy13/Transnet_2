<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: ../login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://103.143.71.205/"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- FONT LINK Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../src/output.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>Transnet • Mikrotik</title>
</head>
<body class="w-dvw h-dvh overflow-hidden bg-slate-100 flex" style="font-family: Nunito">
    <?php
        include('../navbar/navbar.php');
    ?>
    <main class="overflow-auto w-dvw">
        <header class="bg-cyan-400 px-4 py-[20px]">
            <div class="flex flex-col gap-1">
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
            </div>
        </header>
        <div id="content">

        </div>
    </main>
    <script src="js/html5shiv.min.js"></script>
</body>
</html>