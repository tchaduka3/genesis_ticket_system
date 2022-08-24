<?php

//register.php
session_start();
include('database_connection.php');
echo "ndapinda";
$form_data = json_decode(file_get_contents("php://input"));

$message = '';
$validation_error = '';

if(empty($form_data->name))
{
 $error[] = 'Title is Required';
}
else
{
 $data[':name'] = $form_data->name;
}



if(empty($form_data->desc))
{
 $error[] = 'Description is Required';
}
else
{
 $data[':desc'] = $form_data->desc;
 $data[':user_id']=$_SESSION['name'];
}

if(empty($error))
{
 $query = "
 INSERT INTO tickets (user_id,title, description) VALUES (:user_id, :name, :desc)
 ";
 $statement = $connect->prepare($query);
 if($statement->execute($data))
 {
  $message = 'Registration Completed';
 }
}
else
{
 $validation_error = implode(", ", $error);
}

$output = array(
 'error'  => $validation_error,
 'message' => $message
);

echo json_encode($output);


?>
