<?php 
function x($str){
    if($str){
        echo "<pre>";
        print_R($str);
        echo "</pre>";
    }else{
        echo "<pre>";
        var_dump($str);
        echo "</pre>";
    }
    
}
?>

<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <script src="jquery.js"></script>
  <script src="jquery.js"></script>
  <script id="angularScript" src="angular.min.js"></script>


  
<script>
     var jSon = angular.module ('jSon',[]);
     jSon.controller('jController',function($scope, $http){
         $scope.friends = [{name:'John', phone:'555-1276'},
                         {name:'Mary', phone:'800-BIG-MARY'},
                         {name:'Mike', phone:'555-4321'},
                         {name:'Adam', phone:'555-5678'},
                         {name:'Julie', phone:'555-8765'},
                         {name:'Juliette', phone:'555-5678'}]
     });
     
     
     jSon.controller('jFilter',function($scope, $http){
        $scope.list = [
            {'name' : 'AAA'}, {'name' : 'BBB'}, {'name' : 'CCC'}
        ];
        $scope.cc = [{'x': 'aa'},{'x': 'bb'},{'x': 'cc'}];
        
        $scope.selectName = function () {
            $scope.cc = [{'x': '11'},{'x': '22'},{'x': '333'}];
        };
   
    })
     
     'use strict';
   var App = angular.module('clientApp', ['ngResource', 'App.filters']);  
     App.controller('ClientCtrl', ['$scope', function ($scope) {
    $scope.selectedCompany = [];
    $scope.companyList = [{
        id: 1,
        name: 'Apple'
    }, {
        id: 2,
        name: 'Facebook'
    }, {
        id: 3,
        name: 'Google'
    }];

    $scope.clients = [{
        name: 'Brett',
        designation: 'Software Engineer',
        company: {
            id: 1,
            name: 'Apple'
        }
    }, {
        name: 'Steven',
        designation: 'Database Administrator',
        company: {
            id: 3,
            name: 'Google'
        }
    }, {
        name: 'Jim',
        designation: 'Designer',
        company: {
            id: 2,
            name: 'Facebook'
        }
    }, {
        name: 'Michael',
        designation: 'Front-End Developer',
        company: {
            id: 1,
            name: 'Apple'
        }
    }, {
        name: 'Josh',
        designation: 'Network Engineer',
        company: {
            id: 3,
            name: 'Google'
        }
    }, {
        name: 'Ellie',
        designation: 'Internet Marketing Engineer',
        company: {
            id: 1,
            name: 'Apple'
        }
    }];

    $scope.setSelectedClient = function () {
        var id = this.company.id;
        if (_.contains($scope.selectedCompany, id)) {
            $scope.selectedCompany = _.without($scope.selectedCompany, id);
        } else {
            $scope.selectedCompany.push(id);
        }
        return false;
    };

    $scope.isChecked = function (id) {
        if (_.contains($scope.selectedCompany, id)) {
            return 'icon-ok pull-right';
        }
        return false;
    };

    $scope.checkAll = function () {
        $scope.selectedCompany = _.pluck($scope.companyList, 'id');
    };
}]);

angular.module('App.filters', []).filter('companyFilter', [function () {
    return function (clients, selectedCompany) {
        if (!angular.isUndefined(clients) && !angular.isUndefined(selectedCompany) && selectedCompany.length > 0) {
            var tempClients = [];
            angular.forEach(selectedCompany, function (id) {
                angular.forEach(clients, function (client) {
                    if (angular.equals(client.company.id, id)) {
                        tempClients.push(client);
                    }
                });
            });
            return tempClients;
        } else {
            return clients;
        }
    };
}]);
     
     
     
     
     
     
     
  </script>
</head>
<body>
    
    
    
    <div id="angularTest" ng-app="jSon">
        
       
        <div ng-controller="jController">
          
            <label>Search: <input ng-model="searchText"></label>
            <table id="searchTextResults">
              <tr><th>Name</th><th>Phone</th></tr>
              <tr ng-repeat="friend in friends | filter:searchText">
                <td>{{friend.name}}</td>
                <td>{{friend.phone}}</td>
              </tr>
            </table>
           
         </div>
        
        
        
        <div ng-controller="jFilter">
            <ul ng-repeat="l in list">
                <li>
                    <a ng-click="selectName()" class="{{l.name}}" href="#">{{l.name}}</a> 
                </li>
            </ul>
            <div ng-repeat="c in cc">
                
                    <p>{{c.x}} -> {{c.y}}</p>
                
            </div>
        </div>
       
        
        
    </div>
    <!--
     <div data-ng-controller="ClientCtrl">
            <ul class="inline">
                <li>
                    <div class="alert alert-info">
                         <h4>Total Filtered Client: {{filtered.length}}</h4>

                    </div>
                </li>
                <li>
                    <div class="btn-group" data-ng-class="{open: open}">
                        <button class="btn">Filter by Company</button>
                        <button class="btn dropdown-toggle" data-ng-click="open=!open"><span class="caret"></span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><a data-ng-click="checkAll()"><i class="icon-ok-sign"></i>  Check All</a>

                            </li>
                            <li><a data-ng-click="selectedCompany=[];"><i class="icon-remove-sign"></i>  Uncheck All</a>

                            </li>
                            <li class="divider"></li>
                            <li data-ng-repeat="company in companyList"> <a data-ng-click="setSelectedClient()">{{company.name}}<span data-ng-class="isChecked(company.id)"></span></a>

                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <hr/>
             <h3>Clients Table:</h3>

            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width:10%">#</th>
                        <th style="width:20%">Name</th>
                        <th style="width:40%">Designation</th>
                        <th style="width:30%">Company</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-ng-repeat="client in filtered = (clients | companyFilter:selectedCompany)">
                        <td>{{$index + 1}}</td>
                        <td><em>{{client.name}}</em>

                        </td>
                        <td>{{client.designation}}</td>
                        <td>{{client.company.name}}</td>
                    </tr>
                </tbody>
            </table>
            <!-- <pre>{{selectedCompany|json}}</pre>
        <pre>{{companyList|json}}</pre>
        <pre>{{clients|json}}</pre>
       
        </div>
     -->
</body>

</html>