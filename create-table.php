<?php 
include('../crud3/includes/connection.php');

$sql= "CREATE TABLE student(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
fname VARCHAR(200) NOT NULL,
lname VARCHAR(200) NOT NULL,
gender VARCHAR(6) NOT NULL,
state VARCHAR(50) NOT NULL,
city VARCHAR(50) NOT NULL,
pincode INT NOT NULL,
course VARCHAR(100) NOT NULL,
email VARCHAR(200) NOT NULL
)";

$exe= $conn->query($sql);

if($exe==true) {
    echo "table created";
} else {
    echo $conn->error;
}

?>