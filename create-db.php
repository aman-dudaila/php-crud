<?php 
include('../crud3/includes/connection.php');

$sql= "CREATE DATABASE project1";
$exe= $conn->query($sql);

if($exe==true){
    echo "database created";
} else {
    echo $conn->errno;
}

?>