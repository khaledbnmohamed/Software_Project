<?php
if(isset($_POST['logout'])){
session_start();
session_unset();
session_destroy();
header('REFRESH:2;URL=mainpage.php');
exit();}

