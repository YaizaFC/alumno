<?php
session_start();
$_SESSION['logueado']=sha1('juan');
//echo $_SESSION['logueado'];
header("Location:Vista/index.php");
