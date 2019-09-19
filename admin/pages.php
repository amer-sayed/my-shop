<?php 

include 'init.php';
$do ='';
if (isset($_GET['do'])){
    
    $do = $_GET['do'];
} else {
    $do = 'manage';
}

if ($do == 'manage'){
    echo '<h1 class=\'text-center\'>welcom to manage page</h1>';
} elseif ($do == 'add'){
    echo '<h1 class=\'text-center\'>welcom to add page</h1>';
    
    
}else {
    echo '<h1 class=\'text-center\'>Erorr not found</h1>';
}


include $tel . 'footer.php';


