<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: ../login.php');
        exit;
    }
    
    include('../connection/function.php');

    $show = show("SELECT customers.customerid, customers.customername, customers.address, customers.contact, services.packetservice, services.bandwith, ont.olt, ont.snont FROM customers join ont using(customerid) join services using(SNONT) order by customers.customerid");

    $getFamily = show(getCountPacket("Family"));
    $getOffice = show(getCountPacket("Internet Kerja"));
    $getDedicated = show(getCountPacket("Dedicated"));    

    //BUTTON CLICK CONDITION
    if(isset($_POST["input"])){
        $show = searchCustomers($_POST['input']);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS LINK -->
    <link rel="stylesheet" href="../src/output.css">
    <!-- ICON LINK -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- FONT LINK Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <title>Transnet • Customers</title>
</head>
<body class="w-dvw h-dvh bg-slate-100 flex" style="font-family: Nunito;">
    <!-- NAVIGATION BAR-->
    <?php
        include('../navbar/navbar.php');
    ?>
    <main class="w-full overflow-hidden">
        <header class="bg-cyan-400 px-4 py-[20px]">
            <div class="flex flex-col gap-1">
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
                <div class="bg-gray-800 rounded-full px-4 py-[2px] w-max"></div>
            </div>
        </header>


        <section class="flex gap-5 m-3 w-full items-center justify-evenly">
            <div class="flex flex-col gap-3 ">
                <!-- SEARCH CUSTOMERS BAR -->
                <form action="" method="post" class="flex items-center bg-white rounded-full shadow-[0.5px_1px_4px_rgba(0,0,0,0.5)]">
                    <label for="search" class="px-3 py-1">
                        <img class="w-5 h-5" src="../assets/img/search.png" alt="">
                    </label>
                    <input class="px-3 py-1 text-lg rounded-r-full outline-none" autocomplete="off" type="search" name="input" id="search" autofocus placeholder="Search Customers ...">
                </form>
                <!-- ADD CUSTOMERS BUTTON -->
                <a href="addCustomer.php" class="bg-gray-800 flex gap-3 rounded-full w-max px-3 py-2 hover:scale-105 transition-all duration-300">
                    <img class="w-6 h-6" src="../assets/img/addcustomers.png" alt="">
                    <h1 class="font-medium text-white">Add Customer</h1>
                </a>
            </div>

            <!-- PACKET SERVICE SECTION -->
            <div class="flex justify-around gap-3">
                <a href="#" class="px-8 py-4 bg-green-500 text-white hover:scale-110 transition-all duration-300 flex items-center gap-3">
                    <div>
                        <img class="w-10 h-10" src="../assets/img/family.png" alt="">
                    </div>
                    <div>
                        <h1 class="text-3xl font-semibold"><?= $getFamily[0]["jumlah"]; ?></h1>
                        <h3 class="text-lg">Family user</h3>
                    </div>
                </a>
                <a href="#" class="px-8 py-4 bg-amber-400 text-white hover:scale-110 transition-all duration-300 flex items-center gap-3">
                    <div>
                        <img class="w-10 h-10" src="../assets/img/office.png" alt="">
                    </div>
                    <div>
                        <h1 class="text-3xl font-semibold"><?= $getOffice[0]["jumlah"]; ?></h1>
                        <h3 class="text-lg">Internet Kerja user</h3>
                    </div>
                </a>
                <a href="#" class="px-8 py-4 bg-red-400 text-white hover:scale-110 transition-all duration-300 flex items-center gap-3">
                    <div>
                        <img class="w-10 h-10" src="../assets/img/dedicated.png" alt="">
                    </div>
                    <div>
                        <h1 class="text-3xl font-semibold"><?= $getDedicated[0]["jumlah"]; ?></h1>
                        <h3 class="text-lg">Dedicated user</h3>
                    </div>
                </a>
            </div>

        </section>

        <!-- CUSTOMERS TABLE  -->
        <div class="m-3">
            <div class=" max-h-[400px] w-full flex overflow-y-scroll bg-white">
                <?php
                    include('customersTable.php');
                ?>
            </div>
        </div>
    </main>

    <script src="../js/confirm.js"></script>
</body>
</html>