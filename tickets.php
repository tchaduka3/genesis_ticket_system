<?php
session_start();
if(!isset($_SESSION["name"])){
     header("location: index.php");
     exit;
 }
 ?>

<!DOCTYPE html>  
 <!-- index.php !-->  
 <html>  
      <head>  
           <title>Tickets</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
      </head>  
      <body>  
      <br />
   <h3 align="center">Genesis Ticket System</h3>
  <br />
           <div class="container" style="width:800px;">  
           <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">
     <a href="index.php" class="btn" style="border: 1px solid green;">Add Ticket</a>&nbsp;
     <a href="tickets.php" class="btn" style="border: 1px solid green;">Tickets</a>&nbsp;
     &nbsp;<a href="logout.php" class="btn" style="border: 1px solid red;">Logout</a></h3>
</div>
                <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">  
                 
                     <br /><br />  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Ticket ID</th>
                               <th>Ticket Title</th>  
                               <th>User</th>  
                               <th>Status</th>
                               <th>Date Submitted</th>
                               <th></th>
                          </tr>  
                          <tr ng-repeat="x in names">  
                               <td>{{x.id}}</td>  
                               <td>{{x.user_id}}</td>  
                               <td>{{x.title}}</td> 
                               <td>{{x.status}}</td> 
                               <td>{{x.date_submited}}</td> 
                               <td><button ng-click="updateData(x.id, x.user_id, x.description, x.status)" class="btn btn-info btn-xs">View Full Ticket</button></td>
                          </tr>  
                     </table>  
                </div>  
</div>
           </div>  
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
           $http.get("get_all_tickets.php")  
           .success(function(data){  
                $scope.names = data;  
           });  
      }
      $scope.updateData = function(id, user_id, description,status){  
             
           location.href="update_ticket.php?id="+id+"&&user_id="+user_id;
      }   
 });  
 </script>  