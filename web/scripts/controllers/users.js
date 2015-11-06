'use strict';

angular.module('Users')
    .controller('IndexUsersCtrl', function ($scope, UsersResource, $location, $timeout) {
        $scope.Users = UsersResource.query();

        $scope.removeUser = function (id) {
            UsersResource.delete({
               id: id
            });
            UsersResource.update($scope.User);
            Materialize.toast('Usuario Eliminado.',5000,'red accent-4');
            $timeout(function () {
                $location.path('/users');
            }, 1000);
        }
    })
    .controller('CreateUsersCtrl', function($scope, UsersResource, $location, $timeout){
        $scope.title = "Crear nuevo usuario";
        $scope.button = "Guardar";
        $scope.User = {};
        $scope.saveUser = function () {
            //console.log($scope.User);
            UsersResource.save($scope.User);
            Materialize.toast('Usuario Agregado.',5000,'blue accent-4');
            $timeout(function () {
                $location.path('/users');
            }, 1000);
        }

    })
    .controller('EditUsersCtrl', function($scope, UsersResource, $location, $timeout, $routeParams) {
        $scope.title = "Editar usuario";
        $scope.button = "Actualizar";
        $scope.User = UsersResource.get({id:$routeParams.id});
        $scope.saveUser = function () {
            //console.log($scope.User);
            UsersResource.update($scope.User);
            Materialize.toast('Usuario Actualizado.',5000,'green accent-4');
            $timeout(function () {
                $location.path('/users');
            }, 1000);
        }
    });
