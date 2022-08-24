<?php  
 //select.php  
 include('database_connection.php');
    $id=$_GET['id'];
    $status=$_GET['status'];
 $query = "UPDATE tickets SET status='".$status."' WHERE id='".$id."'";
 $statement = $connect->prepare($query);
 $statement->execute();