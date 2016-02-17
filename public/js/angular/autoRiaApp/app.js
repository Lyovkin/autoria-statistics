var app = angular.module('autoRiaApp', ["chart.js"]);

app.config(function($interpolateProvider) {
   $interpolateProvider.startSymbol('[[');
   $interpolateProvider.endSymbol(']]');
});

app.controller('autoRiaCtrl', function($scope, $http) {

    $scope.IdType = null;
    $scope.IdBody = null;
    $scope.IdMarks = null;
    $scope.IdModels = null;

    $scope.ObjType = [];
    $scope.ObjBody = [];
    $scope.ObjMarks = [];
    $scope.ObjModels = [];

    $scope.result = null;

    /**
     * Get categories
     */
    $http.get('http://api.auto.ria.com/categories')
        .then(function(response) {
           $scope.types = response.data;
        });

    $scope.getValueIdType = function(valueId) {
        $scope.IdType = valueId;

       angular.forEach($scope.types, function(key) {
           if(key.value == $scope.IdType) {
               if($scope.ObjType.length > 0) {
                   $scope.ObjType = [];
               }
               $scope.ObjType.push({id: key.value, name: key.name});
           }
       });

        /**
         * Get body styles if categories is set
         */
        $http.get('http://api.auto.ria.com/categories/'+ $scope.IdType +'/bodystyles')
            .then(function(response) {
                $scope.bodies = response.data;
            });

        /**
         * Get marks if categories is set
         */
        $http.get('http://api.auto.ria.com/categories/'+ $scope.IdType +'/marks')
            .then(function(response) {
                $scope.marks = response.data;
            });
    };

    $scope.$watch('IdMarks', function(){
        if($scope.IdMarks != null) {
            $http.get('http://api.auto.ria.com/categories/'+ $scope.IdType +'/marks/'+ $scope.IdMarks +'/models')
                .then(function(response) {
                    $scope.models = response.data;
                })
        }
    });

    $scope.getValueIdBody = function(valueId) {
        $scope.IdBody = valueId;
    };


    $scope.getValueIdMarks = function(valueId) {
      $scope.IdMarks = valueId;
    };

    $scope.getValueIdModels = function(valueId) {
        $scope.IdModels = valueId;
    };


    $scope.$watch('IdBody', function() {
        if($scope.IdBody != null) {
            angular.forEach($scope.bodies, function(key) {
                if(key.value == $scope.IdBody) {
                    if($scope.ObjBody.length > 0) {
                        $scope.ObjBody = [];
                    }
                    $scope.ObjBody.push({id: key.value, name: key.name});
                }
            });
        }
    });

    $scope.$watch('IdMarks', function() {
        if($scope.IdMarks != null) {
            angular.forEach($scope.marks, function(key) {
                if(key.value == $scope.IdMarks) {
                    if($scope.ObjMarks.length > 0) {
                        $scope.ObjMarks = [];
                    }
                    $scope.ObjMarks.push({id: key.value, name: key.name});
                }
            });
        }
    });

    $scope.$watch('IdModels', function() {
        if($scope.IdModels != null) {
            angular.forEach($scope.models, function(key) {
                if(key.value == $scope.IdModels) {
                    if($scope.ObjModels.length > 0) {
                        $scope.ObjModels = [];
                    }
                    $scope.ObjModels.push({id: key.value, name: key.name});
                }
            });
        }
    });

    $scope.$watch('ObjModels', function() {
       if($scope.ObjModels != null) {
           $http.get('http://api.auto.ria.com/average?main_category='+ $scope.IdType +'&'+
           +'body_id='+ $scope.IdBody +'&marka_id='+ $scope.IdMarks +'&model_id='+ $scope.IdModels +'')
               .then(function(response) {
                   $scope.result = response.data;
               });
       }
    }, true);



});