<?php
$currentfile = basename($_SERVER['PHP_SELF']);

if($currentfile == 'index.php'){
    $navItems = [
        'index.php' => ['Dashboard', 'dashboard.png', 'index.php'],
        'customers.php' => ['Customers', 'customers.png', 'customers/customers.php'],
        'map.php' => ['Map', 'map.png', 'map/map.php'],
        'mikrotik.php' => ['Mikrotik', 'router.png', 'mikrotik/mikrotik.php'],
        'notebook.php' => ['Notebook', 'notebook.png', 'notebook/notebook.php'],
        'comingsoon.php' => ['Coming Soon...', 'question.png', 'comingsoon/comingsoon.php'],
    ];
}else if($currentfile == 'customers.php'){
    $navItems = [
        'index.php' => ['Dashboard', 'dashboard.png', '../index.php'],
        'customers.php' => ['Customers', 'customers.png', 'customers.php'],
        'map.php' => ['Map', 'map.png', '../map/map.php'],
        'mikrotik.php' => ['Mikrotik', 'router.png', '../mikrotik/mikrotik.php'],
        'notebook.php' => ['Notebook', 'notebook.png', '../notebook/notebook.php'],
        'comingsoon.php' => ['Coming Soon...', 'question.png', '../comingsoon/comingsoon.php'],
    ];
}else if($currentfile == 'map.php'){
    $navItems = [
        'index.php' => ['Dashboard', 'dashboard.png', '../index.php'],
        'customers.php' => ['Customers', 'customers.png', '../customers/customers.php'],
        'map.php' => ['Map', 'map.png', 'map.php'],
        'mikrotik.php' => ['Mikrotik', 'router.png', '../mikrotik/mikrotik.php'],
        'notebook.php' => ['Notebook', 'notebook.png', '../notebook/notebook.php'],
        'comingsoon.php' => ['Coming Soon...', 'question.png', '../comingsoon/comingsoon.php'],
    ];
}else if($currentfile == 'mikrotik.php'){
    $navItems = [
        'index.php' => ['Dashboard', 'dashboard.png', '../index.php'],
        'customers.php' => ['Customers', 'customers.png', '../customers/customers.php'],
        'map.php' => ['Map', 'map.png', '../map/map.php'],
        'mikrotik.php' => ['Mikrotik', 'router.png', 'mikrotik.php'],
        'notebook.php' => ['Notebook', 'notebook.png', '../notebook/notebook.php'],
        'comingsoon.php' => ['Coming Soon...', 'question.png', '../comingsoon/comingsoon.php'],
    ];
}else if($currentfile == 'notebook.php'){
    $navItems = [
        'index.php' => ['Dashboard', 'dashboard.png', '../index.php'],
        'customers.php' => ['Customers', 'customers.png', '../customers/customers.php'],
        'map.php' => ['Map', 'map.png', '../map/map.php'],
        'mikrotik.php' => ['Mikrotik', 'router.png', '../mikrotik/mikrotik.php'],
        'notebook.php' => ['Notebook', 'notebook.png', 'notebook.php'],
        'comingsoon.php' => ['Coming Soon...', 'question.png', '../comingsoon/comingsoon.php'],
    ];
}else if($currentfile == 'comingsoon.php'){
    $navItems = [
        'index.php' => ['Dashboard', 'dashboard.png', '../index.php'],
        'customers.php' => ['Customers', 'customers.png', '../customers/customers.php'],
        'map.php' => ['Map', 'map.png', '../map/map.php'],
        'mikrotik.php' => ['Mikrotik', 'router.png', '../mikrotik/mikrotik.php'],
        'notebook.php' => ['Notebook', 'notebook.png', '../notebook/notebook.php'],
        'comingsoon.php' => ['Coming Soon...', 'question.png', 'comingsoon.php'],
    ];
}

function renderNavItem($file, $label, $icon, $url, $currentfile) {
    $activeClass = ($file == $currentfile) ? 'bg-gray-900' : 'hover:bg-gray-900';
    $href = ($file == $currentfile) ? '#' : $url;
    $redirect = NULL;
    if($currentfile == 'index.php'){
        $redirect = 'assets/img/'.$icon;
    }else{
        $redirect = '../assets/img/'.$icon;
    }
    echo "<li class='$activeClass transition-colors duration-200'>
            <a class='flex items-center gap-2 px-3 py-[10px]' href='$href'>
                <img class='w-5 h-5' src='$redirect' alt=''>
                <span>$label</span>
            </a>
        </li>";
}
?>

<header class="bg-gray-800 py-y flex flex-col text-gray-200 gap-3">
    <div class="flex justify-center items-center bg-cyan-600 px-12 py-4">
        <h1 class="text-xl uppercase font-bold tracking-widest">Transnet</h1>
    </div>
    <div class="flex gap-1 px-3">
        <?php
            if($currentfile == 'index.php') { ?>
                <img class="w-12 h-12" src="assets/img/favicon.png" alt="">
            <?php } else { ?>
                <img class="w-12 h-12" src="../assets/img/favicon.png" alt="">
        <?php } ?>
        <div class="flex flex-col gap-1 flex-wrap">
            <h2 class="text-wrap font-semibold">Transnet Sumbar</h2>
            <div class="flex flex-wrap gap-1">
                <?php
                    if($currentfile == 'index.php') { ?>
                        <img class="w-4 h-4" src="assets/img/green-circle.png" alt="">
                    <?php } else { ?>
                        <img class="w-4 h-4" src="../assets/img/green-circle.png" alt="">
                    <?php } ?>
                <span class="text-xs">Online</span>
            </div>
        </div>
    </div>
    <div>
        <ul>
            <?php
            foreach ($navItems as $file => $navItem) {
                renderNavItem($file, $navItem[0], $navItem[1], $navItem[2], $currentfile);
            }
            ?>
            <li class="hover:bg-gray-900 transition-colors duration-200">
                <?php if($currentfile == 'index.php') { ?>
                <a class="flex items-center gap-2 px-3 py-[10px]" href='logout.php'>
                    <img class="w-5 h-5" src="assets/img/out.png" alt="">
                <?php } else { ?>
                <a class="flex items-center gap-2 px-3 py-[10px]" href='../logout.php'>
                    <img class="w-5 h-5" src="../assets/img/out.png" alt="">
                <?php } ?>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
</header>

