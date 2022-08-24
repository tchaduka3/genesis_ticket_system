<?php  
 //select.php  
 include('database_connection.php');
 $output = array();  

 
 

 $query = "
 SELECT * FROM tickets
 ";
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