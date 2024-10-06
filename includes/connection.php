<?php 

$hostname= "localhost";
$username= "root";
$password= "";

$conn= new mysqli($hostname,$username,$password);

if($conn->connect_error){
    echo "connection failed";
} else {
    //echo "connection build";
}

$conn->select_db('project1');

?>