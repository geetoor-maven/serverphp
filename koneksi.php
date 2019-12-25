<?php
// define ('HOST','test.remajapeduli.net');
// define('USERNAME', 'remajap1_toor');
// define('PASSWORD', 'toor 10 10 ');
// define('DB_SELECT', 'remajap1_projek_PLN');
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB_SELECT', 'projek_PLN');


$koneksi = mysqli_connect(HOST, USERNAME, PASSWORD, DB_SELECT)or die(mysql_errno());
?>