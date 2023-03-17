<?php
$pageName = 'loginHome.php';
if (isset($_GET) && isset($_GET['page'])){
		switch($_GET['page']){
                case 'home':
                    $pageName = 'home.php';
                    break;    
		}
}
include $pageName;
?>
