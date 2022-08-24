<?php

//index.php

session_start();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Ticket System</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
  <style>
  .form_style
  {
   width: 600px;
   margin: 0 auto;
  }
  </style>
 </head>
 <body>
  <br />
   <h3 align="center">Genesis Ticket System</h3>
  <br />

  <div ng-app="login_register_app" ng-controller="login_register_controller" class="container form_style">
   <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
      <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
      {{alertMessage}}
     </div>
   <?php
   if(!isset($_SESSION["name"]))
   {
   ?>
   

   <div class="panel panel-default" ng-show="login_form">
    <div class="panel-heading">
     <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitLogin()">
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="loginData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="loginData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="login" class="btn btn-primary" value="Login" />
       <br />
       <input type="button" name="register_link" class="btn btn-primary btn-link" ng-click="showRegister()" value="Register" />
      </div>
     </form>
    </div>
   </div>

   <div class="panel panel-default" ng-show="register_form">
    <div class="panel-heading">
     <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Enter Your Name</label>
       <input type="text" name="name" ng-model="registerData.name" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="registerData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="register" class="btn btn-primary" value="Register" />
       <br />
       <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <?php
   }
   else
   {
   ?>
  
{{showTicket()}}
   <div class="panel panel-default" ng-show="ticket_form">
    <div class="panel-heading">
    
     <a href="index.php" class="btn" style="border: 1px solid green;">Add Ticket</a>&nbsp;
     <a href="tickets.php" class="btn" style="border: 1px solid green;">Tickets</a>&nbsp;
     &nbsp;<a href="logout.php" class="btn" style="border: 1px solid red;">Logout</a></h3>
     
   
    </div>
    <div class="panel-body">
     <p>Welcome - <b><?php echo $_SESSION["name"];?></b></p>
     <a href="logout.php">Logout</a>
     <br><br>
     <form method="post" ng-submit="submitTicket()">
        <div class="form-group">
         <label>Enter Ticket Title</label>
         <input type="text" name="name" id="ticketTitle" ng-model="ticketData.name" class="form-control" />
        </div>
        
        <div class="form-group">
         <label>Enter Description</label>
         <textarea name="desc" id="ticketDesc" ng-model="ticketData.desc" class="form-control" >

         </textarea>
        </div>
        <div class="form-group" align="center">
         <input type="submit" name="ticket" class="btn btn-primary" value="submit" />
         <br />
         
        </div>
       </form>
    </div>
   </div>


   <?php
   }
   ?>

  </div>
 </body>
</html>

<script>
var app = angular.module('login_register_app', []);
app.controller('login_register_controller', function($scope, $http){
 $scope.closeMsg = function(){
  $scope.alertMsg = false;
 };

 $scope.login_form = true;

 $scope.showRegister = function(){
  $scope.login_form = false;
  $scope.register_form = true;
  $scope.alertMsg = false;
  $scope.ticket_form =false;
 };

 $scope.showLogin = function(){
  $scope.register_form = false;
  $scope.login_form = true;
  $scope.alertMsg = false;
  $scope.ticket_form =false;
 };

 $scope.showTicket = function(){
  $scope.register_form = false;
  $scope.login_form = false;
  $scope.alertMsg = false;
  $scope.ticket_form =true;
 };

 $scope.submitRegister = function(){
   
     $http({
   method:"POST",
   url:"register.php",
   data:$scope.registerData
  }).success(function(data){
   $scope.alertMsg = true;
   if(data.error != '')
   {
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    $scope.alertClass = 'alert-success';
    $scope.alertMessage = data.message;
    $scope.registerData = {};
   }
  });
 };

 $scope.submitTicket = function(){
   if(document.getElementById("ticketTitle").value==="")
   {
      alert("Please enter ticket title");
   }
   else if(document.getElementById("ticketDesc").value==="")
   {
      alert("Please enter ticket description");
   }
   else{
  $http({
   method:"POST",
   url:"ticket.php",
   data:$scope.ticketData
  }).success(function(data){
   $scope.alertMsg = true;
   if(data.error != '' || data.error===undefined)
   {
      console.log('Zvaramba'+data.message);
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
      console.log('Zvaita');
    $scope.alertClass = 'alert-success';
    $scope.alertMessage = data.message;
    $scope.ticketData = {};
   }
  });
  alert("Ticket Successfully Submited");
  document.getElementById("ticketDesc").value="";
  document.getElementById("ticketTitle").value="";
}
 };

 $scope.submitLogin = function(){
  $http({
   method:"POST",
   url:"login.php",
   data:$scope.loginData
  }).success(function(data){
   if(data.error != '')
   {
    $scope.alertMsg = true;
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    location.reload();
   }
  });
 };

});
</script>
