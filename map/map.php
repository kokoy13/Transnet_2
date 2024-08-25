<?php
    session_start();

    include('../connection/function.php');

    if(!isset($_SESSION['login'])){
        header('Location: ../login.php');
        exit;
    }
    $getFamilyCoordinat = show(showCoordinat('Family'));
    $getOfficeCoordinat = show(showCoordinat('Internet Kerja'));
    $getDedicatedCoordinat = show(showCoordinat('Dedicated'));

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

    <link rel="stylesheet" href="../src/output.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- leaflet link css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <!-- leaflet link js -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <title>Transnet • Map</title>
</head>
<body class="w-dvw h-dvh overflow-hidden bg-slate-100 flex" style="font-family: Nunito;">
    <?php
        include('../navbar/navbar.php');
    ?>
    <main class="overflow-hidden w-dvw">
        <section id="map" class="h-full w-full max-w-full max-h-full">

        </section>
    </main>
    <script>
        //Mendapatkan koordinat dari query database
        let coordinatF = <?= json_encode($getFamilyCoordinat) ?>;
        let coordinatO = <?= json_encode($getOfficeCoordinat) ?>;
        let coordinatD = <?= json_encode($getDedicatedCoordinat) ?>;
    </script>
    <script src="../js/mapp.js"></script>
</body>
</html>