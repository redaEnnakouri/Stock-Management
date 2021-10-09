<?php

$host="localhost";
$user="root";
$pass="";
$db="gestoin stock";


$conn = mysqli_connect($host,$user,$pass,$db);


if(mysqli_connect_errno()){
    die("il ya un error dans la connectoin de  base de donne".mysqli_connect_error());
}
