<?php include('../crud3/includes/header.php'); ?>

<?php 
$id = isset($_GET['id']) ? $_GET['id'] : '';
extract($_REQUEST);

$sql= "DELETE FROM student WHERE id=$id";
$exe= $conn->query($sql);

if($exe==true) {
    header('Location:index.php?msg=data deleted');
} else{
    $conn->error;
}
?>

<?php include('../crud3/includes/footer.php'); ?>