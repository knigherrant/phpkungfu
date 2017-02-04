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

  <style>
       .ng-invalid {
                color:white;
                background: red;
            }
  </style>
  
<script>
     var jSon = angular.module ('jSon',[]);
     jSon.controller('jController',function($scope, $http){
         $scope.loadAjax = function(){
            $http.get('ajax.php').success(function(data){
                $scope.hasAjaxResult = true;
                $scope.items = data;
            }) 
        };
     });
     jSon.controller('list',function($scope){
     });
  </script>
</head>
<body>
    <div id="angularTest" ng-app="jSon">
        <div ng-controller="jController">
            <p><a ng-click="loadAjax()" href="#ajax">Ajax</a></p>
            <div ng-if="hasAjaxResult"> 
                <div ng-controller="list">
                <div ng-repeat="(key,value) in items">
                    <h5>{{key}}</h5>
                    <div ng-repeat="(x,y) in value">
                        <p>{{x}} : {{y}}</p>
                    </div>
                </div>
                </div>
            </div>
         </div>
        
        
        
        <?php /*
        <div ng-controller="xx">
            <!-- ng-model-options="{updateOn:'blur'}" khi nao bur ra ngoaithi moi cap nhat du lieu-->
            <!-- ng-model-options="{debounce:1000}" Ngung go 1s -->
            <input type="text" class="my-input" ng-model-options="{updateOn:'blur'}" value="" ng-model="jinput" ng-pattern="/^\d+$/" />
            <p>MORE: {{jinput}}</p>
            <button ng-click="jvClick()" >Alert</button>
            {{show}}
            <div my-directive></div>
        </div>
        */ ?>
 
      
        
        
    </div>
    
</body>

</html>