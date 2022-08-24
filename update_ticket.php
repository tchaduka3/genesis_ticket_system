<?php
session_start();
if(!isset($_SESSION["name"])){
     header("location: index.php");
     exit;
 }
$_SESSION['ticket_id']=$_GET['id'];

 
// Check if the user is logged in, if not then redirect him to login page

?>
<!DOCTYPE html>  
 <!-- index.php !-->  
 <html>  
      <head>  
           <title>Webslesson Tutorial | AngularJS Tutorial with PHP - Fetch / Select Data from Mysql Database</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
      </head>  
      <body>  
          <br />
          <h3 align="center">Genesis Ticket System</h3>
         <br />
           <div class="container" style="width:500px;">  
               <div class="panel panel-default">
                    <div class="panel-heading">
                     <h3 class="panel-title">
                     <a href="index.php" class="btn" style="border: 1px solid green;">Add Ticket</a>&nbsp;
                     <a href="tickets.php" class="btn" style="border: 1px solid green;">Tickets</a>&nbsp;
                     &nbsp;<a href="logout.php" class="btn" style="border: 1px solid red;">Logout</a></h3>
                </div> 
                <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">  
                      
                     <br /><br />  
                     <div class="row">
                        <div class="col-lg-12" ng-repeat="x in names">
                          <center>  <b>User: {{x.user_id}}</b>
                            <br><b>Ticket Number: {{x.id}}</b>
                                <br><b>Ticket Title: {{x.title}}</b>
                                <br><b>Ticket Status: {{x.status}}</b>
                                <br>
                                <br>
                                <b>
                                    Description:
                                </b>
                                <br>
                                <p>{{x.description}}</p>
                                
                                <button ng-if="x.status=='open'" ng-click="updateStatus(x.id, 'closed')" class="btn btn-info btn-xs">Set Closed</button>
                                <button ng-if="x.status=='closed'" ng-click="updateStatus(x.id, 'open')" class="btn btn-info btn-xs">Set Open</button>
                                <br><br><br><br><br><br><br>

</center>

                            
                        </div>
                     </div>
                           
                        
                      
                </div>  
           </div>  </div>
      </body>  
 </html>  
 <script>  
 var app = angular.module("myapp",[]);  
 app.controller("usercontroller", function($scope, $http){  
      $scope.insertData = function(){  
           $http.post(  
                "insert.php",  
                {'firstname':$scope.firstname, 'lastname':$scope.lastname}  
           ).success(function(data){  
                alert(data);  
                $scope.firstname = null;  
                $scope.lastname = null;  
                $scope.displayData();  
           });  
      }  
      $scope.displayData = function(){  
           $http.get("view_ticket.php")  
           .success(function(data){  
                $scope.names = data;  
           });  
      }
      $scope.updateStatus = function(id, status){  
             
          var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        location.reload();
      }
    };
    xmlhttp.open("GET", "change_status.php?id="+id+"&&status="+status, true);
    xmlhttp.send();
      }   
 });
 
 
 </script>  