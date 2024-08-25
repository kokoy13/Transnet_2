<?php
    include('connection/function.php');
    $test = show("SELECT count(packetservice) as jumlah from services WHERE packetservice = 'Family'")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?= $test['jumlah']; ?></p>
</body>
</html>