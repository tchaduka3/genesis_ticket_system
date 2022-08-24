<?php 
session_start(); 
 //select.php  
 include('database_connection.php');
 $output = array();  

 
 
 

 $query = "
 SELECT * FROM tickets WHERE id=".$_SESSION['ticket_id']." LIMIT 1";
 $statement = $connect->prepare($query);
 if($statement->execute())
 {
  $result = $statement->fetchAll();
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
   
    $output[] = $row;  
   
   }
  }
}
echo json_encode($output);

 ?> 