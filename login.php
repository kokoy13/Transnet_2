<?php
session_start();
include('connection/function.php');

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn,"SELECT username FROM users WHERE id = '$id'");

    $row = mysqli_fetch_assoc($result);

    if($key === hash('sha256',$row['username'])){
        $_SESSION['login'] = true;
    }

}

if(isset($_SESSION['login'])){
    header('Location: index.php');
    exit;    
}

//ONCLICK LOGIN CONDITION
if (isset($_POST["login"])) { 

    //DECLARATION USERNAME AND PASSWORD
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row["password"])){
            $_SESSION["login"] = true;

            if(isset($_POST['remember'])){
                setcookie('id',$row['id'],time()+86400);
                setcookie('key',hash('sha256',$row['username']),time()+86400);
            }

            header("Location: index.php");
            exit;
        }
    }
    echo "<script>
        alert('username or password wrong!');
    </script>";
    $error = true;
    
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
    <link rel="stylesheet" href="src/output.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Login Transnet</title>
</head>
<body class="w-dvw h-dvh overflow-hidden bg-cyan-100" style="font-family: Nunito;">
    <!-- Container -->
    <div class="flex justify-center">
            <!-- Left Content -->
            <div class="flex flex-col px-8 justify-center py-5 gap-5 bg-blue-950 w-2/6">
                <div class="flex justify-center">
                    <img class="w-20 h-20" src="assets/img/favicon.png" alt="">
                </div>
                <div class="flex flex-col items-center gap-3 text-white">
                    <h1 class="font-bold uppercase text-2xl">Transnet Sumbar</h1>
                    <span class="text-wrap">Connectivity for better future</span>
                </div>
                <div>
                    <form class="flex flex-col gap-5" action="" method="post">
                        <div class="flex flex-col gap-3">
                            <?php
                                if(isset($error)){ ?>
                                    <label class="text-red-500" for="username">Username *</label>
                                <?php } else { ?>
                                    <label class="text-white" for="username">Username *</label>
                                <?php } ?>
                            <input class="px-3 py-1 rounded-md" type="text" name="username" id="username" placeholder="admin" required>
                        </div>
                        <div class="flex flex-col gap-3">
                        <?php
                                if(isset($error)){ ?>
                                    <label class="text-red-500" for="password">Password *</label>
                                <?php } else { ?>
                                    <label class="text-white" for="password">Password *</label>
                                <?php } ?>
                            <input class="px-3 py-1 rounded-md" type="password" name="password" id="password" placeholder="admin" required>
                        </div>
                        <button class="w-full rounded-md text-white bg-cyan-400 text-center text-lg uppercase font-bold py-1 hover:bg-cyan-600 transition-colors duration-300" type="submit" name="login">
                            Sign In
                        </button>
                        <div class="flex gap-3">
                            <input type="checkbox" name="remember" id="remember">
                            <label class="text-white" for="remember">Remember Me</label>
                        </div>
                    </form> 
                </div>
                <div class="p-2 border-2 border-gray-400 flex gap-3 rounded-md w-max items-center">
                    <img class="w-5 h-5" src="assets/img/indonesia.png" alt="">
                    <span class="text-white">Indonesia</span>
                    <img class="w-5 h-5" src="assets/img/down-arrow.png" alt="">
                </div>
            </div>
            <!-- Right Content -->
            <div class="bg-blue-900">
                <img class=" h-dvh" src="assets/img/aside.jpg" alt="">
            </div>
    </div>
</body>
</html>