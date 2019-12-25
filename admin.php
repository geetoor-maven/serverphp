<?php
$username = filter_input(INPUT_POST,"email");
$password = filter_input(INPUT_POST,"password");


$mysqli = new mysqli("localhost","root","","projek_PLN");
$result = mysqli_query($mysqli,"SELECT * FROM laporan_login WHERE email = '".$username."' AND password = '".$password."'");

if($data = mysqli_fetch_array($result)){
    echo '1';
}

?>