<?php 

$vista=isset($_GET['vista'])?$_GET['vista']:'principal';

require_once 'header.php';
require_once $vista.'.php';
require_once 'footer.php';


?>